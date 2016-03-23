<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * CruiseShip
 *
 * @ORM\Table(name="cruise_ship", uniqueConstraints={@ORM\UniqueConstraint(name="cruise_ship_code_uniq", columns={"code"})}, indexes={@ORM\Index(name="cruise_ship_class_idx", columns={"class"})})
 * @ORM\Entity
 */
class CruiseShip
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
     * @ORM\Column(name="code", type="string", length=255, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="properties", type="text", nullable=false)
     */
    private $properties;

    /**
     * @var string
     *
     * @ORM\Column(name="imgUrl", type="string", length=255, nullable=false)
     */
    private $imgurl;

    /**
     * @var \CruiseShipClass
     *
     * @ORM\ManyToOne(targetEntity="CruiseShipClass" , inversedBy="ships")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="class", referencedColumnName="id")
     * })
     */
    private $class;

	/**
	 * @ORM\OneToMany(targetEntity="CruiseCruise", mappedBy="ship")
	 * @ORM\OrderBy({"startdate" = "ASC"})
	 */
	private $cruises;
	
	/**
	 * @ORM\OneToMany(targetEntity="CruiseShipCabin", mappedBy="ship")
	 */
	private $cabins;	
	
	public function __construct() {
		$this->cruises = new ArrayCollection();
		$this->cabins = new ArrayCollection();
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
     * @return CruiseShip
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
     * Set code
     *
     * @param string $code
     * @return CruiseShip
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set properties
     *
     * @param string $properties
     * @return CruiseShip
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
		
        return $this;
    }

    /**
     * Get properties
     *
     * @return string 
     */
    public function getProperties()
    {
        //return $this->properties;
		return json_decode($this->properties);
    }
	
	/**
	 * @param $properties the $properties to set
	 */
	public function addProperty($name, $value) {
		$properties = $this->getProperties();
		$property["n"] = $name;
		$property["v"] = $value;
		$properties[] = $property;
		$this->properties = json_encode($properties); 
	}

	/**
	 * @return CruiseCruise
	 */
	public function addCruise($code, ArrayCollection $categories) {
		$cruise = new CruiseCruise();
		$cruise->init($this, $categories);
		$cruise->setCode($code);
		$this->cruises->add($cruise);
		return $cruise;
	}	

	
	/**
	 * @return CruiseShipCabin
	 */
	public function addCabin($title) {
		$cabin = new CruiseShipCabin();
		$cabin->init($this);
		$cabin->setTitle($title);
		$this->cabins->add($cabin);
		return $cabin;
	}		
	
	
    /**
     * Set imgurl
     *
     * @param string $imgurl
     * @return CruiseShip
     */
    public function setImgurl($imgurl)
    {
        $this->imgurl = $imgurl;

        return $this;
    }

    /**
     * Get imgurl
     *
     * @return string 
     */
    public function getImgurl()
    {
        return $this->imgurl;
    }

    /**
     * Set class
     *
     * @param \BaseBundle\Entity\CruiseShipClass $class
     * @return CruiseShip
     */
    public function setClass(\BaseBundle\Entity\CruiseShipClass $class = null)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return \BaseBundle\Entity\CruiseShipClass 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Remove cruises
     *
     * @param \BaseBundle\Entity\CruiseCruise $cruises
     */
    public function removeCruise(\BaseBundle\Entity\CruiseCruise $cruises)
    {
        $this->cruises->removeElement($cruises);
    }

    /**
     * Get cruises
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCruises()
    {
        return $this->cruises;
    }

    /**
     * Remove cabins
     *
     * @param \BaseBundle\Entity\CruiseShipCabin $cabins
     */
    public function removeCabin(\BaseBundle\Entity\CruiseShipCabin $cabins)
    {
        $this->cabins->removeElement($cabins);
    }

    /**
     * Get cabins
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCabins()
    {
        return $this->cabins;
    }
}
