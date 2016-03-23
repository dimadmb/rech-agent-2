<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseCruiseProgramItem
 *
 * @ORM\Table(name="cruise_cruise_program_item", indexes={@ORM\Index(name="cruise_id", columns={"cruise_id"}), @ORM\Index(name="place_id", columns={"place_id"})})
 * @ORM\Entity
 */
class CruiseCruiseProgramItem
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
     * @var integer
     *
     * @ORM\Column(name="ord", type="integer", nullable=false)
     */
    private $ord;

    /**
     * @var integer
     *
     * @ORM\Column(name="date", type="integer", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="placeTitle", type="string", length=255, nullable=false)
     */
    private $placetitle;

    /**
     * @var \CruiseCruise
     *
     * @ORM\ManyToOne(targetEntity="CruiseCruise", inversedBy="programItems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cruise_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $cruise;

    /**
     * @var \CruisePlace
     *
     * @ORM\ManyToOne(targetEntity="CruisePlace", inversedBy="programItems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="place_id", referencedColumnName="id")
     * })
     */
    private $place;

	
	public function init(CruiseCruise $cruise, CruisePlace $place = null) {
		$this->cruise = $cruise;
		$this->place = $place;
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
     * Set ord
     *
     * @param integer $ord
     * @return CruiseCruiseProgramItem
     */
    public function setOrd($ord)
    {
        $this->ord = $ord;

        return $this;
    }

    /**
     * Get ord
     *
     * @return integer 
     */
    public function getOrd()
    {
        return $this->ord;
    }

    /**
     * Set date
     *
     * @param integer $date
     * @return CruiseCruiseProgramItem
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
     * Set description
     *
     * @param string $description
     * @return CruiseCruiseProgramItem
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
     * Set placetitle
     *
     * @param string $placetitle
     * @return CruiseCruiseProgramItem
     */
    public function setPlacetitle($placetitle)
    {
        $this->placetitle = $placetitle;

        return $this;
    }

    /**
     * Get placetitle
     *
     * @return string 
     */
    public function getPlacetitle()
    {
        return $this->placetitle;
    }

    /**
     * Set cruise
     *
     * @param \BaseBundle\Entity\CruiseCruise $cruise
     * @return CruiseCruiseProgramItem
     */
    public function setCruise(\BaseBundle\Entity\CruiseCruise $cruise = null)
    {
        $this->cruise = $cruise;

        return $this;
    }

    /**
     * Get cruise
     *
     * @return \BaseBundle\Entity\CruiseCruise 
     */
    public function getCruise()
    {
        return $this->cruise;
    }

    /**
     * Set place
     *
     * @param \BaseBundle\Entity\CruisePlace $place
     * @return CruiseCruiseProgramItem
     */
    public function setPlace(\BaseBundle\Entity\CruisePlace $place = null)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return \BaseBundle\Entity\CruisePlace 
     */
    public function getPlace()
    {
        return $this->place;
    }
}
