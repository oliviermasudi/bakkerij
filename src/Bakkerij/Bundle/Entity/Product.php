<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product
 *
 * @author olivier.masudi
 */

namespace Bakkerij\Bundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="Bakkerij\Bundle\Repository\ProductRepository")
 */
class Product {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $prijs;

    /**
     * @ORM\Column(type="text")
     */
    private $info;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    
    /**
     * @ORM\Column(type="boolean")
     */
    private $disponible;
    
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="producten")
     * @ORM\JoinColumn(name="idcat", referencedColumnName="id")
     */
    private $categorie;
    
     /**
     * @ORM\ManyToOne(targetEntity="Subcategorie", inversedBy="producten")
     * @ORM\JoinColumn(name="idsubcat", referencedColumnName="id")
     */
    private $subcategorie;
    
        
    /**
     * @ORM\OneToMany(targetEntity="Bestelproduct", mappedBy="product")
     */
    
    private $bestelproducten;
        
    
    /**
     * @ORM\OneToOne(targetEntity="Media",  cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;
    

    public function __construct() {

    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;        
    }
    
    /**
     * Get naam
     *
     * @return string
     */
    public function getNaam() {
        return $this->naam;
    }
    /**
     * Get prijs
     *
     * @return string
     */
    public function getPrijs() {
        return $this->prijs;
    }
    /**
     * Get info
     *
     * @return string
     */
    public function getInfo() {
        return $this->info;
    }
    
    /**
     * Get disponible
     *
     * @return boolean
     */
    public function getDisponible() {
        return $this->disponible;
    }
    
    
    /**
     * Get pcture
     *
     * @return string
     */
    public function getPicture() {
        return $this->picture;
    }
    
    /**
     * Set id
     *
     * @param intiger $id
     * @return string
     */
    public function setId($id) {
        $this->id = $id;
        return $this->id;         
    }
    /**
     * Set naam
     *
     * @param string $naam
     * @return string
     */
    public function setNaam($voornaam) {
        $this->voornaam = $naam;
        return $this->naam;        
    }
    /**
     * Set prijs
     *
     * @param string $prijs
     * @return string
     */
    public function setPrijs($prijs) {
        $this->familienaam = $prijs;
        return $this->prijs;        
    }
    
    /**
     * Set info
     *
     * @param string $info
     * @return string
     */
    public function setInfo($info) {
        $this->info = $info;
        return $this->info;        
    }
    
    
    /**
     * Set info
     *
     * @param boolean $info
     * @return string
     */
    public function setDisponible($dsponible) {
        $this->disponible = $disponible;
        return $this->disponible;        
    }    
    
    
    /**
     * Set picture
     *
     * @param string $picture
     * @return string
     */
    public function setPicture($picture) {
        $this->picture = $picture;
        return $this->picture;
    }
    
    /**
     * Set categorien
     *
     * @param \Bakkerij\Bundle\Entity\Categorie $categorie
     * @return Categorie
     */
    public function setCategorie(\Bakkerij\Bundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Bakkerij\Bundle\\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }    
    
     /**
     * Set subcategorie
     *
     * @param \Bakkerij\Bundle\Entity\Subcategorie $subcategorie
     * @return Subcategorie
     */
    public function setSubcategorie(\Bakkerij\Bundle\Entity\Subcategorie $subcategorie = null)
    {
        $this->subcategorie = $subcategorie;

        return $this;
    }

    /**
     * Get subcategorie
     *
     * @return \Bakkerij\Bundle\Entity\Subcategorie 
     */
    public function getSubcategorie()
    {
        return $this->subcategorie;
    }    
    
    


    /**
     * Add bestelproducten
     *
     * @param \Bakkerij\Bundle\Entity\Bestelproduct $bestelproducten
     * @return Product
     */
    public function addBestelproducten(\Bakkerij\Bundle\Entity\Bestelproduct $bestelproducten)
    {
        $this->bestelproducten[] = $bestelproducten;

        return $this;
    }

    /**
     * Remove bestelproducten
     *
     * @param \Bakkerij\Bundle\Entity\Bestelproduct $bestelproducten
     */
    public function removeBestelproducten(\Bakkerij\Bundle\Entity\Bestelproduct $bestelproducten)
    {
        $this->bestelproducten->removeElement($bestelproducten);
    }

    /**
     * Get bestelproducten
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBestelproducten()
    {
        return $this->bestelproducten;
    }

    /**
     * Set image
     *
     * @param \Bakkerij\Bundle\Entity\Media $image
     * @return Product
     */
    public function setImage(\Bakkerij\Bundle\Entity\Media $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Bakkerij\Bundle\Entity\Media 
     */
    public function getImage()
    {
        return $this->image;
    }
}
