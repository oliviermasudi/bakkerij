<?php

namespace Bakkerij\Bundle\Controller;

use Bakkerij\Bundle\Entity\Address;
use Bakkerij\Bundle\Entity\Bestelling;
use Bakkerij\Bundle\Form\AddressType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class WinkelmandjeController extends Controller {

    public function menuAction() {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier'))
            $articles = 0;
        else
            $articles = count($session->get('panier'));

        return $this->render('BakkerijBundle:Default:Winkelmandje/modulesUsed/panier.html.twig', array('articles' => $articles ));
    }

    public function ajouterAction($id) {


        $session = $this->getRequest()->getSession();
        if (!$session->has('panier'))
            $session->set('panier', array());
        $panier = $session->get('panier');
        //panier[ID DU PRODUIT] =>QUANTITE]

        if (array_key_exists($id, $panier)) {
            if ($this->getRequest()->query->get('qte') != null)
                $panier[$id] = $this->getRequest()->query->get('qte');
            $this->get('session')->getFlashBag()->add('success', 'Article mise à jour avec succes');
        } else {
            if ($this->getRequest()->query->get('qte') != null) {
                $panier[$id] = $this->getRequest()->query->get('qte');
                $this->get('session')->getFlashBag()->add('success', 'Article mise à jour avec succes');
            } else {
                $panier[$id] = 1;
                $this->get('session')->getFlashBag()->add('success', 'Article ajouté avec succes');
            }
        }

        $session->set('panier', $panier);


        return $this->redirect($this->generateUrl('winkelmandje'));
    }

    public function supprimerAction($id) {

        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        if (array_key_exists($id, $panier)) {
            unset($panier[$id]);
            $session->set('panier', $panier);
            $this->get('session')->getFlashBag()->add('success', 'Article supprimé avec succes');
        }

        return $this->redirect($this->generateUrl('winkelmandje'));
    }

    public function winkelmandjeAction() {

        $session = $this->getRequest()->getSession();


        if (!$session->has('panier'))
            $session->set('panier', array());

        //$session->remove('panier'); suppression d'une var de la session         
        //var_dump($session->get('panier')); affichage des vars.


        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('BakkerijBundle:Product');
        $products = $repository->findArray(array_keys($session->get('panier')));


        return $this->render('BakkerijBundle:Default:Winkelmandje/layout/winkelmandje.html.twig', array('products' => $products,
                    'panier' => $session->get('panier')));
    }

    public function deliveryAction() {
        
        $utilisateur = $this->container->get('security.context')->getToken()->getUser();
        $entity = new Address();
        $form = $this->createForm(new AddressType(),$entity);
        
        if($this->get('request')->getMethod() == "POST")
        {
            $form->handleRequest($this->getRequest());
            if($form->isValid()) {
                       $em = $this->getDoctrine()->getManager();
                       $entity->setUsers($utilisateur);
                       $em->persist($entity);                       
                       $em->flush();
                       return $this->redirect($this->generateUrl('delivery'));
            }
        }
            
            
        $form = $this->createForm(new AddressType(), $entity);        
        
        return $this->render('BakkerijBundle:Default:Winkelmandje/layout/delivery.html.twig', array('utilisateur' => $utilisateur, 'form' => $form->createView()));
    }

    
   public function addresssupprimerAction($id) {
   
            $entity = new Address();
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BakkerijBundle:Address')->find($id);
            if($this->container->get('security.context')->getToken()->getUser() != $entity->getUsers() || !$entity)
                return $this->redirect($this->generateUrl('delivery')); 
            
            $em->remove($entity);                       
            $em->flush();
            return $this->redirect($this->generateUrl('delivery'));   
       
   }
    
 
   public function setLivraisonOnSession()
   {
       $session = $this->getRequest()->getSession();
       if(!$session->has('address')) $session->set('address',array());
       $address = $session->get('address');
       
       if($this->getRequest()->request->get('livraison') != null && $this->getRequest()->request->get('facturation') != null)
       {
         $address['livraison']= $this->getRequest()->request->get('livraison');
         $address['facturation']= $this->getRequest()->request->get('facturation');
       } else {
           return $this->redirect($this->generateUrl('validation'));
       }
       $session->set('address',$address);
               return $this->redirect($this->generateUrl('delivery'));
   }
   
   
    public function validationAction() {
        
        if($this->get('request')->getMethod() == 'POST')
        $this->setLivraisonOnSession();
        
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $prepareCommande= $this->forward('BakkerijBundle:Bestelling:prepareCommande');
        $commande = $em->getRepository('BakkerijBundle:Bestelling')->find($prepareCommande->getContent());      
        return $this->render('BakkerijBundle:Default:Winkelmandje/layout/validation.html.twig', array('commande' => $commande));
    }

}
