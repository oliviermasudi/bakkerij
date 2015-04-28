<?php
// src/Acme/UserBundle/Entity/User.php

namespace Users\UsersBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="klanten")
 * @ORM\Entity(repositoryClass="Users\UsersBundle\Repository\UsersRepository")
 */
class Users extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @ORM\OneToMany(targetEntity="Bakkerij\Bundle\Entity\Bestelling", mappedBy="users", cascade={"persist","remove"})
    * @ORM\JoinColumn(nullable=true)     
    */

    private $bestelling;
    
    /**
    * @ORM\OneToMany(targetEntity="Bakkerij\Bundle\Entity\Address", mappedBy="users", cascade={"remove"})
    * @ORM\JoinColumn(nullable=true)     
    */

    private $address;    

    public function __construct()
    {
        parent::__construct();
        
        $this->bestelling= new \Doctrine\Common\Collections\ArrayCollection();
        $this->address= new \Doctrine\Common\Collections\ArrayCollection();
        
        // your own logic
    }

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
     * Add bestelling
     *
     * @param \Bakkerij\Bundle\Entity\Bestelling $bestelling
     * @return Users
     */
    public function addBestelling(\Bakkerij\Bundle\Entity\Bestelling $bestelling)
    {
        $this->bestelling[] = $bestelling;

        return $this;
    }

    /**
     * Remove bestelling
     *
     * @param \Bakkerij\Bundle\Entity\Bestelling $bestelling
     */
    public function removeBestelling(\Bakkerij\Bundle\Entity\Bestelling $bestelling)
    {
        $this->bestelling->removeElement($bestelling);
    }

    /**
     * Get bestelling
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBestelling()
    {
        return $this->bestelling;
    }

    /**
     * Add address
     *
     * @param \Bakkerij\Bundle\Entity\Address $address
     * @return Users
     */
    public function addAddress(\Bakkerij\Bundle\Entity\Address $address)
    {
        $this->address[] = $address;

        return $this;
    }

    /**
     * Remove address
     *
     * @param \Bakkerij\Bundle\Entity\Address $address
     */
    public function removeAddress(\Bakkerij\Bundle\Entity\Address $address)
    {
        $this->address->removeElement($address);
    }

    /**
     * Get address
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAddress()
    {
        return $this->address;
    }
}
