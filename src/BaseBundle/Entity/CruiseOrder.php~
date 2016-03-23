<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseOrder
 *
 * @ORM\Table(name="cruise_order")
 * @ORM\Entity
 */
class CruiseOrder
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, nullable=false)
     */
    private $comments;

    /**
     * @var integer
     *
     * @ORM\Column(name="date", type="integer", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="shipName", type="string", length=255, nullable=true)
     */
    private $shipname;

    /**
     * @var string
     *
     * @ORM\Column(name="shipCode", type="string", length=255, nullable=true)
     */
    private $shipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="cruiseCode", type="string", length=255, nullable=true)
     */
    private $cruisecode;

    /**
     * @var integer
     *
     * @ORM\Column(name="startDate", type="integer", nullable=true)
     */
    private $startdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="endDate", type="integer", nullable=true)
     */
    private $enddate;

    /**
     * @var string
     *
     * @ORM\Column(name="cruiseDescription", type="string", length=255, nullable=true)
     */
    private $cruisedescription;



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
     * Set phone
     *
     * @param string $phone
     * @return CruiseOrder
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
     * Set name
     *
     * @param string $name
     * @return CruiseOrder
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return CruiseOrder
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return CruiseOrder
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set date
     *
     * @param integer $date
     * @return CruiseOrder
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return integer 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set shipname
     *
     * @param string $shipname
     * @return CruiseOrder
     */
    public function setShipname($shipname)
    {
        $this->shipname = $shipname;

        return $this;
    }

    /**
     * Get shipname
     *
     * @return string 
     */
    public function getShipname()
    {
        return $this->shipname;
    }

    /**
     * Set shipcode
     *
     * @param string $shipcode
     * @return CruiseOrder
     */
    public function setShipcode($shipcode)
    {
        $this->shipcode = $shipcode;

        return $this;
    }

    /**
     * Get shipcode
     *
     * @return string 
     */
    public function getShipcode()
    {
        return $this->shipcode;
    }

    /**
     * Set cruisecode
     *
     * @param string $cruisecode
     * @return CruiseOrder
     */
    public function setCruisecode($cruisecode)
    {
        $this->cruisecode = $cruisecode;

        return $this;
    }

    /**
     * Get cruisecode
     *
     * @return string 
     */
    public function getCruisecode()
    {
        return $this->cruisecode;
    }

    /**
     * Set startdate
     *
     * @param integer $startdate
     * @return CruiseOrder
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return integer 
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param integer $enddate
     * @return CruiseOrder
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return integer 
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set cruisedescription
     *
     * @param string $cruisedescription
     * @return CruiseOrder
     */
    public function setCruisedescription($cruisedescription)
    {
        $this->cruisedescription = $cruisedescription;

        return $this;
    }

    /**
     * Get cruisedescription
     *
     * @return string 
     */
    public function getCruisedescription()
    {
        return $this->cruisedescription;
    }
}
