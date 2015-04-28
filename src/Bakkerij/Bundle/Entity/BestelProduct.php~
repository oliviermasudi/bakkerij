<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Description of klanten
 *
 * @author olivier.masudi
 */

namespace Bakkerij\Bundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bestelproduct")
 * @ORM\Entity(repositoryClass="Bakkerij\Bundle\Repository\BestelproductRepository")
 */
class Bestelproduct {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Bestelling", inversedBy="bestelproducten")
     * @ORM\JoinColumn(name="idbestel", referencedColumnName="id")
     */
    private $bestelling;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="bestelproducten")
     * @ORM\JoinColumn(name="idproduct", referencedColumnName="id")
     */
    private $product;


    /**
     * @ORM\Column(type="integer")
     */
    private $hoeveel;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $prijs;

    private function __construct() {
    }


    public function getId() {
        return $this->id;
    }


    public function getBestelling() {
        return $this->idbestel;
    }

    public function getProduct() {
        return $this->Product;
    }

    public function getAantal() {
        return $this->hoeveel;
    }

    public function getPrijs() {
        return $this->prijs;
    }

    public function setId($id) {
        $this->id = $id;
    }


    public function setBestelling($bestelling) {
        $this->datum = $bestelling;
    }

    public function setProduct($product) {
        $this->status = $product;
    }

    public function setHoeveel($hoeveel) {
        $this->status = $hoeveel;
    }

    public function setIdPrijs($prijs) {
        $this->status = $prijs;
    }


    /**
     * Get hoeveel
     *
     * @return integer 
     */
    public function getHoeveel()
    {
        return $this->hoeveel;
    }

    /**
     * Set prijs
     *
     * @param string $prijs
     * @return BestelProduct
     */
    public function setPrijs($prijs)
    {
        $this->prijs = $prijs;

        return $this;
    }
}
