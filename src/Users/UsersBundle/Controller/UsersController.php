<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function factureAction()
    {
                
        $em = $this->getDoctrine()->getManager();
        $factures = $em->getRepository('BakkerijBundle:Bestelling')->byFacturefind($this->getUser());
        
        return $this->render('UsersBundle:Default:layout/facture.html.twig', array('factures' => $factures));
    }
    

    
public function facturePDFAction($id)
    {
                
        $em = $this->getDoctrine()->getManager();
        $factures = $em->getRepository('BakkerijBundle:Bestelling')->findOneBy(array('users' => $this->getUser(),
                                                                                     'valider' => 1,
                                                                                     'id'=> $id));
        
        if(!$factures)
        {
        $this->get('session')->getFlashBag()->add('error', 'une erreur est survenu');        
        return $this->redirect($this->generateUrl('factures'));
        }

        $html = $this->renderView('UsersBundle:Default:layout/facturePDF.html.twig', array('facture' => $factures));
        $html2pdf = new \Html2Pdf_Html2Pdf('P','A4','fr');
        
        $html2pdf->pdf->SetAuthor('Olivier Masudi');
        $html2pdf->pdf->SetTitle('Facture');
        $html2pdf->pdf->SetSubject('Facture VDAB');
        $html2pdf->pdf->SetKeywords('Facture VDAB');
        
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html);
        $html2pdf->Output('Facture.pdf');
              
        $response= new Response();
        $response->headers->set('Content-type', 'application/pdf');
        return $response;
    }
        
    
}
