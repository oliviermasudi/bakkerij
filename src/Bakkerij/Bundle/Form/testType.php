<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bakkerij\Bundle\Form;
use Users\UsersBundle\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class testType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        //parent::buildForm($builder, $options);
        $builder
                ->add('email','email')
                ->add('nom')
                ->add('prenom')
                ->add('sexe','choice', array('choices' => array ( '0' => 'homme',
                                                                  '1' => 'femme',
                                                                  '2' => 'autre' ),'preferred_choices' => array('1','2'), 'expanded' =>false))
                ->add('contenu','textarea')
                ->add('utilisateur','entity',array('class' => 'Users\UsersBundle\Entity\Users'))
                ->add('pays','country')
                ->add('date','datetime')                
                ->add('envoyer','submit');
    }
    
    public function getName()
    {
        return 'bakkerij_bundle_test';
    }
    
}
