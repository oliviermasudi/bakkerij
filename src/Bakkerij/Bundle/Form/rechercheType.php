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

class rechercheType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        //parent::buildForm($builder, $options);
        $builder->add('recherche','text', array('label' => false, 'attr' => array('class' => 'input-medium search-query') ));
                
    }
    
    public function getName()
    {
        return 'bakkerij_bundle_recherche';
    }
    
}
