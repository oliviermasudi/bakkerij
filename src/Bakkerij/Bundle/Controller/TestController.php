<?php

namespace Bakkerij\Bundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bakkerij\Bundle\Entity\Product;
use Bakkerij\Bundle\Form\testType;

class TestController extends Controller
{
     
  public function testFormulaireAction()
  {
    $form = $this->createForm(new testType());
    
    
    if($this->get('request')->getMethod() == 'POST')
    {
        $form->bind($this->get('request'));
        //var_dump($form->getData());
        echo $form['email']->getData();
        
        $form = $this->createForm(new testType(),array('email' => 'test@test.be',''));
        
        //die('interception');
    }
    
    return $this->render('BakkerijBundle:Default:test.html.twig',array('form' => $form->createView()));              
  }
    
}
