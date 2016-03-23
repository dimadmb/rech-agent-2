<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * CruiseShipCabin
 *
 * @ORM\Table(name="cruise_ship_cabin", indexes={@ORM\Index(name="ship_id", columns={"ship_id"})})
 * @ORM\Entity
 */
class CruiseShipCabin
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
     * @var \CruiseShip
     *
     * @ORM\ManyToOne(targetEntity="CruiseShip", inversedBy="cabins")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ship_id", onDelete="CASCADE", referencedColumnName="id")
     * })
     */
    private $ship;

	/**
	 * @ORM\OneToMany(targetEntity="CruiseShipCabinCruisePrice", mappedBy="cabin")
	 */
	private $prices;
	
	
	public function __construct() {
		$this->prices = new ArrayCollection();
	}

	public function init(CruiseShip $ship) {
		$this->ship = $ship;
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
     * @return CruiseShipCabin
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
     * @return CruiseShipCabin
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
     * Set ship
     *
     * @param \BaseBundle\Entity\CruiseShip $ship
     * @return CruiseShipCabin
     */
    public function setShip(\BaseBundle\Entity\CruiseShip $ship = null)
    {
        $this->ship = $ship;

        return $this;
    }

    /**
     * Get ship
     *
     * @return \BaseBundle\Entity\CruiseShip 
     */
    public function getShip()
    {
        return $this->ship;
    }

    /**
     * Add prices
     *
     * @param \BaseBundle\Entity\CruiseShipCabinCruisePrice $prices
     * @return CruiseShipCabin
     */
    public function addPrice(\BaseBundle\Entity\CruiseShipCabinCruisePrice $prices)
    {
        $this->prices[] = $prices;

        return $this;
    }

    /**
     * Remove prices
     *
     * @param \BaseBundle\Entity\CruiseShipCabinCruisePrice $prices
     */
    public function removePrice(\BaseBundle\Entity\CruiseShipCabinCruisePrice $prices)
    {
        $this->prices->removeElement($prices);
    }

	/**
	 * @return the $prices
	 */
	public function getPrice(CruiseCruise $cruise) {
		return $this->getPriceInternal($cruise);
	}
	
	/**
	 * @return the $prices
	 */
	private function getPriceInternal(CruiseCruise $cruise) {
		foreach ($this->prices as $price) {
			if ($price->getCruise() == $cruise) {
				return $price;
			}
		}
		$price = new CruiseShipCabinCruisePrice();
		$price->init($this, $cruise);
		$this->prices->add($price);
		return $price;
	}	
	
	
	/**
	 * @param $prices the $prices to set
	 */
	public function setPrice(CruiseCruise $cruise, $price) {
		$cruisePrice = $this->getPrice($cruise);
		$cruisePrice->setPrice($price);
		return $cruisePrice;
	}	

    /**
     * Get prices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrices()
    {
        return $this->prices;
    }
}
