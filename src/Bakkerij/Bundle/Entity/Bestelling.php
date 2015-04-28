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

    
namespace Bakkerij\Bundle\Entity;
use Doctrine\ORM\Mapping as ORM;
  

/**
 * @ORM\Entity
 * @ORM\Table(name="bestelling")
 * @ORM\Entity(repositoryClass="Bakkerij\Bundle\Repository\BestellingRepository")
 */
class Bestelling {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    
    /**
     * @ORM\Column(type="date")
     */
    private $datum;
    
     /**
     * @ORM\Column(type="integer")
     */      
    private $valider;
    
     /**
     * @ORM\Column(type="integer")
     */      
    private $reference;
    
    
    
    /**     
     * 
     * @var array
     * 
     * @ORM\Column(name="bestelproducten", type="array")
     * 
     */       
    private $bestelproducten;
    
    
    
    /**
    * @ORM\ManyToOne(targetEntity="Users\UsersBundle\Entity\Users", inversedBy="bestelling" )
    * @ORM\JoinColumn(nullable=true)     
    */

    private $users;
    



    public function getId() {
        return $this->id;
    }

    public function getIdKlant() {
        return $this->idklant;
    }

    public function getDatum() {
        return $this->datum;
    }    

     public function setId($id) {
        $this->id=$id;
    }

    public function setIdKlant($idklant) {
        $this->idklant=$idklant;
    }

    public function setDatum($datum) {
        $this->datum=$datum;
    }


    /**
     * Set status
     *
     * @param integer $status
     * @return Bestelling
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
    
    
     /**
     * Set valider
     *
     * @param integer $status
     * @return Bestelling
     */
    public function setValider($valider)
    {
        $this->valider = $valider;

        return $this;
    }
    
    
    /**
     * Set reference
     *
     * @param integer $status
     * @return Bestelling
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }
    
    
    

    /**
     * Get valider
     *
     * @return integer 
     */
    public function getValider()
    {
        return $this->valider;
    }
    
    
    
    /**
     * Get reference
     *
     * @return integer 
     */
    public function getReference()
    {
        return $this->reference;
    }
    
    
     /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set Klant
     *
     * @param \Bakkerij\Bundle\Entity\Klant $klant
     * @return Bestelling
     */
    public function setKlant(\Bakkerij\Bundle\Entity\Klant $klant = null)
    {
        $this->Klant = $klant;

        return $this;
    }

    /**
     * Get Klant
     *
     * @return \Bakkerij\Bundle\Entity\Klant 
     */
    public function getKlant()
    {
        return $this->Klant;
    }

    /**
     * Add bestelproducten
     *
     * @param \Bakkerij\Bundle\Entity\Bestelproduct $bestelproducten
     * @return Bestelling
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
     * Set bestelproducten
     *
     * @param array Bestelproducten
     * @return Bestelproducten
     */
    public function setBestelproducten($product)
    {
         $this->bestelproducten = $product ;
         return $this;
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
     * Set users
     *
     * @param \Users\UsersBundle\Entity\Users $users
     * @return Bestelling
     */
    public function setUsers(\Users\UsersBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \Users\UsersBundle\Entity\Users 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
