<?php

namespace Bakkerij\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Bakkerij\Bundle\Form\rechercheType;
use Bakkerij\Bundle\Entity\Product;
use Bakkerij\Bundle\Entity\Categorie;

class ProductsController extends Controller {
    /*
      public function categorieAction($id) {
      $session = $this->getRequest()->getSession();
      $em = $this->getDoctrine()->getManager();
      $repository = $this->getDoctrine()->getRepository('BakkerijBundle:Product');
      $producten = $repository->findBy(array('categorie' => $id));

      $categorie = $em->getRepository('BakkerijBundle:Categorie')->find($id);
      if (!$categorie)
      throw $this->createNotFoundException('Page not found');

      if ($session->has('panier'))
      $panier=$session->get('panier');
      else
      $panier = false;

      return $this->render('BakkerijBundle:Default:Products/layout/index.html.twig', array("product" => $producten, 'panier' => $panier));
      }
     * */

    public function indexAction(Categorie $categorie = null) {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();


        if ($categorie != null) {
            $findproducten = $em->getRepository('BakkerijBundle:Product')->findBy(array('categorie' => $categorie));
        } else {
            $findproducten = $em->getRepository('BakkerijBundle:Product')->findBy(array('disponible' => 1));
        }
        if ($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;


        $paginator = $this->get('knp_paginator');
        $producten = $paginator->paginate(
        $findproducten,
        $this->get('request')->query->get('page', 1)/* page number */,10/* limit per page */ );



        return $this->render('BakkerijBundle:Default:Products/layout/index.html.twig', array("product" => $producten, 'panier' => $panier));
    }

    public function showAction($slug) {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('BakkerijBundle:Product');
        $product = $repository->findOneById($slug);

        if (!$product)
            throw $this->createNotFoundException('Page not found');

        if ($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;

        return $this->render('BakkerijBundle:Default:Products/layout/product.html.twig', array("product" => $product, 'panier' => $panier));
    }

    public function rechercheTraitementAction() {
        $form = $this->createForm(new rechercheType());
        if ($this->get('request')->getMethod() == 'POST') {
            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $producten = $em->getRepository('BakkerijBundle:Product')->recherche($form['recherche']->getData());
        } else {

            throw $this->createNotFoundException('Page not found');
        }

        return $this->render('BakkerijBundle:Default:Products/layout/index.html.twig', array("product" => $producten));
    }

    public function rechercheAction() {
        $form = $this->createForm(new rechercheType());
        return $this->render('BakkerijBundle:Default:recherche/modulesUsed/recherche.html.twig', array("form" => $form->createView()));
    }

}
