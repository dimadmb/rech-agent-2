<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruisePlace
 *
 * @ORM\Table(name="cruise_place", uniqueConstraints={@ORM\UniqueConstraint(name="cruise_place_url_type_uniq", columns={"url", "type"})})
 * @ORM\Entity
 */
class CruisePlace
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
     * @ORM\Column(name="type", type="string", length=3, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var boolean
     *
     * @ORM\Column(name="searcheable", type="boolean", nullable=false)
     */
    private $searcheable;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pageable", type="boolean", nullable=false)
     */
    private $pageable;
	
	/**
     * @ORM\OneToMany(targetEntity="CruiseCruiseProgramItem", mappedBy="place")
     */
	private $programItems;	

    /**
     * Constructor
     */
    public function __construct()
    {
		$this->programItems = new ArrayCollection();
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
     * @return CruisePlace
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
     * Set type
     *
     * @param string $type
     * @return CruisePlace
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return CruisePlace
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set searcheable
     *
     * @param boolean $searcheable
     * @return CruisePlace
     */
    public function setSearcheable($searcheable)
    {
        $this->searcheable = $searcheable;

        return $this;
    }

    /**
     * Get searcheable
     *
     * @return boolean 
     */
    public function getSearcheable()
    {
        return $this->searcheable;
    }

    /**
     * Set pageable
     *
     * @param boolean $pageable
     * @return CruisePlace
     */
    public function setPageable($pageable)
    {
        $this->pageable = $pageable;

        return $this;
    }

    /**
     * Get pageable
     *
     * @return boolean 
     */
    public function getPageable()
    {
        return $this->pageable;
    }

    /**
     * Add programItems
     *
     * @param \BaseBundle\Entity\CruiseCruiseProgramItem $programItems
     * @return CruisePlace
     */
    public function addProgramItem(\BaseBundle\Entity\CruiseCruiseProgramItem $programItems)
    {
        $this->programItems[] = $programItems;

        return $this;
    }

    /**
     * Remove programItems
     *
     * @param \BaseBundle\Entity\CruiseCruiseProgramItem $programItems
     */
    public function removeProgramItem(\BaseBundle\Entity\CruiseCruiseProgramItem $programItems)
    {
        $this->programItems->removeElement($programItems);
    }

    /**
     * Get programItems
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProgramItems()
    {
        return $this->programItems;
    }
}
