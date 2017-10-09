<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductSearchType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    /**
     * @Route("/", name="search")
     */
    public function indexAction(Request $request)
    {
        $pRepository = $this->getDoctrine()->getManager()->getRepository(Product::class);

        $formSearch = $this->createForm(ProductSearchType::class);
        $formSearch->handleRequest($request);

        $formData = $request->query->get($formSearch->getName());

        $productNumber = $pRepository->countFilterByAllCriteria($formData);

        $pager = $this->createPager($request, $productNumber);

        $products = $pRepository->filterByAllCriteria($formData, $pager);

        return $this->render('search/index.html.twig', [
            'pager'       => $pager,
            'products'    => $products,
            'form_search' => $formSearch->createView()
        ]);
    }

    /**
     * Paginator
     *
     * @param Request $request
     *
     * @return array
     */
    private function createPager(Request $request, $totalResult)
    {
        $pager = [];

        $pager['nbResultByPage'] = 5;

        $pager['currentPage'] = 1;
        if ($request->query->get('page')) {
            $pager['currentPage'] =  $request->query->get('page');
        }

        $pager['totalResult'] = $totalResult * 1;
        $pager['totalPage'] = ceil($totalResult / $pager['nbResultByPage']);
        $pager['currentPosition'] = $pager['nbResultByPage'] * ($pager['currentPage'] - 1);

        return $pager;
    }
}
