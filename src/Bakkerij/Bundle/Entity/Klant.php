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
 * @ORM\Table(name="klant")
 */    
class Klant {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     */    
    private $voornaam;
    /**
     * @ORM\Column(type="string", length=255)
     */    
    private $familienaam;
    /**
     * @ORM\Column(type="string", length=255)
     */    
    private $adres;
    /**
     * @ORM\Column(type="string", length=255)
     */    
    private $postcode;
    /**
     * @ORM\Column(type="string", length=255)
     */    
    private $huisnummer;
        /**
     * @ORM\Column(type="string", length=255)
     */
    private $gemeente;
    /**
     * @ORM\Column(type="string", length=255)
     */    
    private $email;
    /**
     * @ORM\Column(type="string", length=255)
     */    
    private $wachtwoord;
    /**
     * @ORM\Column(type="integer")
     */    
    private $status;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Bestelling", mappedBy="Klant")
     */
    private $bestellingen;
    
    

    private function __construct() {

    }


    public function getId() {
        return $this->id;
    }

    public function getVoornaam() {
        return $this->voornaam;
    }

    public function getFamilienaam() {
        return $this->familienaam;
    }
    
    
        public function getAdres() {
        return $this->adres;
    }
    
        public function getHuisnummer() {
        return $this->huisnummer;
    }
    
        public function getPostcode() {
        return $this->postcode;
    }
    
        public function getGemeente() {
        return $this->gemeente;
    }
    
        public function getWachtwoord() {
        return $this->wachtwoord;
    }
    
            public function getStatus() {
        return $this->status;
    }
    
            public function getEmail() {
        return $this->email;
    }
    

     public function setId($id) {
        $this->id=$id;
    }

    public function setVoornaam($voornaam) {
        $this->voornaam=$voornaam;
    }

    public function setFamilienaam($familienaam) {
        $this->familienaam=$familienaam;
    }
        
        public function setAdres($adres) {
        $this->adres=$adres;
    }
    
       public function setHuisnummer($huisnummer) {
        $this->huisnummer=$huisnummer;
    }
    
        public function setPostcode($postcode) {
        $this->postcode=$postcode;
    }
    
        public function setGemeente($gemeente) {
        $this->gemeente=$gemeente;
    }
    
        public function setWachtwoord($wachtwoord) {
        $this->wachtwoord=$wachtwoord;
    }
    
            public function setStatus($status) {
        $this->status=$status;
    }
    
            public function setEmail($email) {
        $this->email=$email;
    }
    


    /**
     * Add bestellingen
     *
     * @param \Bakkerij\Bundle\Entity\Bestelling $bestellingen
     * @return Klant
     */
    public function addBestellingen(\Bakkerij\Bundle\Entity\Bestelling $bestellingen)
    {
        $this->bestellingen[] = $bestellingen;

        return $this;
    }

    /**
     * Remove bestellingen
     *
     * @param \Bakkerij\Bundle\Entity\Bestelling $bestellingen
     */
    public function removeBestellingen(\Bakkerij\Bundle\Entity\Bestelling $bestellingen)
    {
        $this->bestellingen->removeElement($bestellingen);
    }

    /**
     * Get bestellingen
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBestellingen()
    {
        return $this->bestellingen;
    }
}
