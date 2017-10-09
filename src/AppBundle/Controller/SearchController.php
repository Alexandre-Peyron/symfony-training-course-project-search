<?php

namespace AppBundle\Controller;

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
        $formSearch = $this->createForm(ProductSearchType::class);

        $formSearch->handleRequest($request);

        if ($formSearch->isSubmitted() && $formSearch->isValid()) {
            //TODO
        }

        return $this->render('search/index.html.twig', [
            'form_search' => $formSearch->createView()
        ]);
    }
}
