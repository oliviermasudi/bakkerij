<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of klanten
 *
 * @author olivier.masudi
 */

    
namespace VDAB\Classes\Entities;
    
class WinkelMandje {

    private $id;
    private $Product;
    private $aantal;
    

    private function __construct($idproduct,$productnaam, $aantal) {
        $this->idproduct = $idproduct;
        $this->aantal = $aantal;
        $this->productnaam = $productnaam;
    }

    public static function create($idproduct,$productnaam, $aantal) {
        if (!isset(self::$idMap[$idproduct])) {
            self::$idMap[$idproduct] = new WinkelMandje($idproduct,$productnaam, $aantal);
        }
        return self::$idMap[$idproduct];
    }

    public function getId() {
        return $this->idproduct;
    }

    public function getAantal() {
        return $this->aantal;
    }
    
    public function getProductNaam() {
        return $this->productnaam;
    }
    
    public function getProductPrijs() {
        return $this->productprijs;
    }


     public function setIdProduct($idproduct) {
        $this->idproduct=$idproduct;
    }

    public function setAantal($aantal) {
        $this->aantal=$aantal;
    }
    
    public function setProductNaam($productnaam) {
        $this->productnaam=$productnaam;
    }
    
    public function setProductPrijs($productprijs) {
        $this->productprijs=$productprijs;
    }
   
    
    //put your code here
}
