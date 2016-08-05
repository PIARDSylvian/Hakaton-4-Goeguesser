<?php

namespace GeoGuesserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Party
 *
 * @ORM\Table(name="party")
 * @ORM\Entity(repositoryClass="GeoGuesserBundle\Repository\PartyRepository")
 */
class Party
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
     * @ORM\Column(name="idUser", type="integer")
     */
    private $idUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="pts", type="integer")
     */
    private $pts;

    /**
     * @var int
     *
     * @ORM\Column(name="ptstt", type="integer")
     */
    private $ptstt;

    /**
     * @var int
     *
     * @ORM\Column(name="disadvantage", type="integer")
     */
    private $disadvantage;

    /**
     * @var int
     *
     * @ORM\Column(name="advantage", type="integer")
     */
    private $advantage;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Party
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set pts
     *
     * @param integer $pts
     * @return Party
     */
    public function setPts($pts)
    {
        $this->pts = $pts;

        return $this;
    }

    /**
     * Get pts
     *
     * @return integer 
     */
    public function getPts()
    {
        return $this->pts;
    }

    /**
     * Set ptstt
     *
     * @param integer $ptstt
     * @return Party
     */
    public function setPtstt($ptstt)
    {
        $this->ptstt = $ptstt;

        return $this;
    }

    /**
     * Get ptstt
     *
     * @return integer 
     */
    public function getPtstt()
    {
        return $this->ptstt;
    }

    /**
     * Set disadvantage
     *
     * @param integer $disadvantage
     * @return Party
     */
    public function setDisadvantage($disadvantage)
    {
        $this->disadvantage = $disadvantage;

        return $this;
    }

    /**
     * Get disadvantage
     *
     * @return integer 
     */
    public function getDisadvantage()
    {
        return $this->disadvantage;
    }

    /**
     * Set advantage
     *
     * @param integer $advantage
     * @return Party
     */
    public function setAdvantage($advantage)
    {
        $this->advantage = $advantage;

        return $this;
    }

    /**
     * Get advantage
     *
     * @return integer 
     */
    public function getAdvantage()
    {
        return $this->advantage;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return Party
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
