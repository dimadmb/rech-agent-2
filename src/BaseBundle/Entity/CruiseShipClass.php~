<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CruiseShipClass
 *
 * @ORM\Table(name="cruise_ship_class")
 * @ORM\Entity
 */
class CruiseShipClass
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

	/**
	 * @ORM\OneToMany(targetEntity="CruiseShip", mappedBy="class")
	 */	
	private $ships;
	
	public function __construct() {
		$this->ships = new Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return CruiseShipClass
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CruiseShipClass
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add ships
     *
     * @param \BaseBundle\Entity\CruiseShip $ships
     * @return CruiseShipClass
     */
    public function addShip(\BaseBundle\Entity\CruiseShip $ships)
    {
        $this->ships[] = $ships;

        return $this;
    }

    /**
     * Remove ships
     *
     * @param \BaseBundle\Entity\CruiseShip $ships
     */
    public function removeShip(\BaseBundle\Entity\CruiseShip $ships)
    {
        $this->ships->removeElement($ships);
    }

    /**
     * Get ships
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getShips()
    {
        return $this->ships;
    }
}
