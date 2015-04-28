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
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="Bakkerij\Bundle\Repository\CategorieRepository")
 */
class Categorie {

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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="categorie")
     */
    private $producten;
    
    /**
     * @ORM\OneToMany(targetEntity="Subcategorie", mappedBy="categorie")
     */
    private $subcategorien;
    
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
     * Add producten
     *
     * @param \Bakkerij\Bundle\Entity\Product $producten
     * @return Categorie
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
     * Add subcategorien
     *
     * @param \Bakkerij\Bundle\Entity\Subcategorie $subcategorien
     * @return Categorie
     */
    public function addSubcategorien(\Bakkerij\Bundle\Entity\Subcategorie $subcategorien)
    {
        $this->subcategorien[] = $subcategorien;

        return $this;
    }

    /**
     * Remove subcategorien
     *
     * @param \Bakkerij\Bundle\Entity\Subcategorie $subcategorien
     */
    public function removeSubcategorien(\Bakkerij\Bundle\Entity\Subcategorie $subcategorien)
    {
        $this->subcategorien->removeElement($subcategorien);
    }

    /**
     * Get subcategorien
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubcategorien()
    {
        return $this->subcategorien;
    }

    /**
     * Set image
     *
     * @param \Bakkerij\Bundle\Entity\Media $image
     * @return Categorie
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
