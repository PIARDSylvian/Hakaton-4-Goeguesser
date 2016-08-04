<?php

namespace GeoGuesserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * inventory
 *
 * @ORM\Table(name="inventory")
 * @ORM\Entity(repositoryClass="GeoGuesserBundle\Repository\inventoryRepository")
 */
class inventory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cash", type="integer")
     */
    private $cash;


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
     * Set cash
     *
     * @param integer $cash
     * @return inventory
     */
    public function setCash($cash)
    {
        $this->cash = $cash;

        return $this;
    }

    /**
     * Get cash
     *
     * @return integer 
     */
    public function getCash()
    {
        return $this->cash;
    }
}
