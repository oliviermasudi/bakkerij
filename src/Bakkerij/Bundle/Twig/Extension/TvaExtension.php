<?php

namespace Bakkerij\Bundle\Twig\Extension;



class TvaExtension extends \Twig_Extension
{
    public function getFilter()
    {
        return array( new \Twig_SimpleFilter('tva', array(this,'calculTva')));
    }
    
    function calculTva($prixHT,$tva)
    {
        return round($prixHT / $tva, 2);
    }
    
    function getName()
    {
      return 'tva_extension'  ;
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

