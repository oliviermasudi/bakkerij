<?php

namespace Bakkerij\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Bakkerij\Bundle\Entity\Product;
use Bakkerij\Bundle\Entity\Address;
use Bakkerij\Bundle\Entity\Bestelling;
use Bakkerij\Bundle\Form\AddressType;

class BestellingController extends Controller {

    public function facture() {

        $em = $this->getDoctrine()->getManager();
        $generator = $this->container->get('security.secure_random');
        $session = $this->getRequest()->getSession();
        $address = $session->get('address');
        $panier = $session->get('panier');
        $commande = array();
        $totalHT = 0;
        $totalTTC = 0;

        $facturation = $em->getRepository('BakkerijBundle:Address')->find($address['facturation']);
        $livraison = $em->getRepository('BakkerijBundle:Address')->find($address['livraison']);
        $products = $em->getRepository('BakkerijBundle:Product')->findArray(array_keys($session->get('panier')));

        foreach ($products as $product) {
            $prixHT = ($product->getPrijs() * $panier[$product->getId()]);
            $prixTTC = $prixHT + ($product->getPrijs() * $panier[$product->getId()] * 0.21);
            $totalHT += $prixHT;
            $totalTTC += $prixTTC;

            $tvaapayer = round($prixTTC - $prixHT, 2);
            $commande['produit'][$product->getId()] = array('reference' => $product->getNaam(),
                'quantite' => $panier[$product->getId()],
                'prixHT' => round($product->getPrijs(), 2),
                'prixTTC' => round($product->getPrijs() / 0.21, 2));
        }
        $commande['livraison'] = array('prenom' => $livraison->getVoornaam(),
            'nom' => $livraison->getNaam(),
            'telephone' => $livraison->getPhone(),
            'address' => $livraison->getAddress(),
            'pc' => $livraison->getPc(),
            'ville' => $livraison->getStad(),
            'pays' => $livraison->getLand(),
            'complement' => $livraison->getComplement());

        $commande['facturation'] = array('prenom' => $facturation->getVoornaam(),
            'nom' => $facturation->getNaam(),
            'telephone' => $facturation->getPhone(),
            'address' => $facturation->getAddress(),
            'pc' => $facturation->getPc(),
            'ville' => $facturation->getStad(),
            'pays' => $facturation->getLand(),
            'complement' => $facturation->getComplement());


        $commande['prixHT'] = round($totalHT, 2);
        $commande['prixTTC'] = round($totalTTC, 2);
        $commande['token'] = bin2hex($generator->nextBytes(20));
        return $commande;
    }

    public function prepareCommandeAction() {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();



        if (!$session->has('commande'))
            $commande = new Bestelling();
        else
            $commande = $em->getRepository('BakkerijBundle:Bestelling')->find($session->get('commande'));


        $commande->setDatum(new \DateTime());
        $commande->setUsers($this->container->get('security.context')->getToken()->getUser());
        $commande->setValider(0);
        $commande->setReference(0);
        $commande->setBestelproducten($this->facture());


        //echo $prepareCommande->getContent();

        if (!$session->has('commande')) {
            $em->persist($commande);
            $session->set('commande', $commande);
        }

        $em->flush();
        return new Response($commande->getId());
    }

    
    // API paimenet
    public function validationCommandeAction($id) {
        $em = $this->getDoctrine()->getManager();
        $commande = $em->getRepository('BakkerijBundle:Bestelling')->find($id);

        if (!$commande || $commande->getValider() == 1)
           throw $this->createNotFoundException('La commande n\'existe pas');
        
        $commande->setValider(1);
        $commande->setReference($this->container->get('setNewReference')->reference()); // Service
        $em->flush();
        
        $session = $this->getRequest()->getSession();
        $session->remove('address');
        $session->remove('livraison');
        $session->remove('facturation');
        $session->remove('panier');
        $session->remove('commande');
        
        $this->get('session')->getFlashBag()->add('Success', 'Commande OK');
        return $this->redirect($this->generateUrl('factures'));
    }

}
