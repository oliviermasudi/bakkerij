<?php

namespace Bakkerij\Bundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('BakkerijBundle:Categorie')->findall();
        
        return $this->render('BakkerijBundle:Default:categorie/menu.html.twig', array('categories' => $categories));
    }
    

}
