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
        $em = $this->getDoctrine()->getManager();

        $formSearch = $this->createForm(ProductSearchType::class);
        $formSearch->handleRequest($request);

        $formData = $request->query->get($formSearch->getName());

        $products = $em->getRepository(Product::class)->filterByAllCriteria($formData);

        return $this->render('search/index.html.twig', [
            'products'    => $products,
            'form_search' => $formSearch->createView()
        ]);
    }
}
