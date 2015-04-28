<?php

namespace Bakkerij\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table("address")
 * @ORM\Entity(repositoryClass="Bakkerij\Bundle\Repository\AddressRepository")
 */
class Address
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=255)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="voornaam", type="string", length=255)
     */
    private $voornaam;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="pc", type="string", length=255)
     */
    private $pc;

    /**
     * @var string
     *
     * @ORM\Column(name="land", type="string", length=255)
     */
    private $land;

    /**
     * @var string
     *
     * @ORM\Column(name="stad", type="string", length=255)
     */
    private $stad;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=255, nullable = true)
     */
    private $complement;

   
    
    /**
    * @ORM\ManyToOne(targetEntity="Users\UsersBundle\Entity\Users", inversedBy="address" )
    * @ORM\JoinColumn(nullable=true)     
    */

    private $users;
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set naam
     *
     * @param string $naam
     * @return address
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * Get naam
     *
     * @return string 
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set voornaam
     *
     * @param string $voornaam
     * @return address
     */
    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    /**
     * Get voornaam
     *
     * @return string 
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return address
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set pc
     *
     * @param string $pc
     * @return address
     */
    public function setPc($pc)
    {
        $this->pc = $pc;

        return $this;
    }

    /**
     * Get pc
     *
     * @return string 
     */
    public function getPc()
    {
        return $this->pc;
    }

    /**
     * Set land
     *
     * @param string $land
     * @return address
     */
    public function setLand($land)
    {
        $this->land = $land;

        return $this;
    }

    /**
     * Get land
     *
     * @return string 
     */
    public function getLand()
    {
        return $this->land;
    }

    /**
     * Set stad
     *
     * @param string $stad
     * @return address
     */
    public function setStad($stad)
    {
        $this->stad = $stad;

        return $this;
    }

    /**
     * Get stad
     *
     * @return string 
     */
    public function getStad()
    {
        return $this->stad;
    }

    /**
     * Set complement
     *
     * @param string $complement
     * @return address
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get complement
     *
     * @return string 
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return address
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set users
     *
     * @param \Users\UsersBundle\Entity\Users $users
     * @return Address
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
