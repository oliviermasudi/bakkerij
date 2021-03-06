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
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="subcategorie")
 * @ORM\Entity(repositoryClass="Bakkerij\Bundle\Repository\SubcategorieRepository")
 */
class Subcategorie {

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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="subcategorie")
     */
    private $producten;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="subcategorien")
     * @ORM\JoinColumn(name="idcat", referencedColumnName="id")
     */
    private $categorie;
    
    
        /**
     * @ORM\OneToOne(targetEntity="Media",  cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    private function __construct() {

    }

    /**
     * Get id
     *
     * @return nteger
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
     * Set id
     *
     * @param intiger $id
     * @return integer
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
    public function setNaam($naam) {
        $this->naam = $naam;
        return $this->naam;
    }

    /**
     * Set categorien
     *
     * @param \Bakkerij\Bundle\Entity\Categorie $categorie
     * @return Categorie
     */
    public function setCategorie(\Bakkerij\Bundle\Entity\Categorie $categorie) {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Bakkerij\Bundle\Entity\Categorie 
     */
    public function getCategorie() {
        return $this->categorie;
    }


    /**
     * Add producten
     *
     * @param \Bakkerij\Bundle\Entity\Product $producten
     * @return Subcategorie
     */
    public function addProducten(\Bakkerij\Bundle\Entity\Product $producten)
    {
        $this->producten[] = $producten;

        return $this;
    }

    /**
     * Remove producten
     *
     * @param \Bakkerij\Bundle\Entity\Product $producten
     */
    public function removeProducten(\Bakkerij\Bundle\Entity\Product $producten)
    {
        $this->producten->removeElement($producten);
    }

    /**
     * Get producten
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducten()
    {
        return $this->producten;
    }

    /**
     * Set image
     *
     * @param \Bakkerij\Bundle\Entity\Media $image
     * @return Subcategorie
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
