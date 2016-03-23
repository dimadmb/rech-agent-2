<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentCategory
 *
 * @ORM\Table(name="document_category", uniqueConstraints={@ORM\UniqueConstraint(name="ment_category_parent_id_level_title_uniq", columns={"parent_id", "level", "title"})}, indexes={@ORM\Index(name="IDX_898DE898727ACA70", columns={"parent_id"})})
 * @ORM\Entity
 */
class DocumentCategory
{

    /**
     * @ORM\OneToMany(targetEntity="Document", mappedBy="category_id") 
	 * @ORM\OrderBy({"title" = "asc"})
     */
	protected $documents;
	
	public function __construct()
	{
		$this->documents = new ArrayCollection();
	}


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
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    private $level;

    /**
     * @var integer
     *
     * @ORM\Column(name="ord", type="integer", nullable=false)
     */
    private $ord;

    /**
     * @var string
     *
     * @ORM\Column(name="baseUrl", type="string", length=255, nullable=false)
     */
    private $baseurl;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deletable", type="boolean", nullable=false)
     */
    private $deletable;

    /**
     * @var \DocumentCategory
     *
     * @ORM\ManyToOne(targetEntity="DocumentCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;



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
     * @return DocumentCategory
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
     * @return DocumentCategory
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
     * Set level
     *
     * @param integer $level
     * @return DocumentCategory
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     * @return DocumentCategory
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
     * Set baseurl
     *
     * @param string $baseurl
     * @return DocumentCategory
     */
    public function setBaseurl($baseurl)
    {
        $this->baseurl = $baseurl;

        return $this;
    }

    /**
     * Get baseurl
     *
     * @return string 
     */
    public function getBaseurl()
    {
        return $this->baseurl;
    }

    /**
     * Set deletable
     *
     * @param boolean $deletable
     * @return DocumentCategory
     */
    public function setDeletable($deletable)
    {
        $this->deletable = $deletable;

        return $this;
    }

    /**
     * Get deletable
     *
     * @return boolean 
     */
    public function getDeletable()
    {
        return $this->deletable;
    }

    /**
     * Set parent
     *
     * @param \BaseBundle\Entity\DocumentCategory $parent
     * @return DocumentCategory
     */
    public function setParent(\BaseBundle\Entity\DocumentCategory $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \BaseBundle\Entity\DocumentCategory 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add documents
     *
     * @param \BaseBundle\Entity\Document $documents
     * @return DocumentCategory
     */
    public function addDocument(\BaseBundle\Entity\Document $documents)
    {
        $this->documents[] = $documents;

        return $this;
    }

    /**
     * Remove documents
     *
     * @param \BaseBundle\Entity\Document $documents
     */
    public function removeDocument(\BaseBundle\Entity\Document $documents)
    {
        $this->documents->removeElement($documents);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocuments()
    {
        return $this->documents;
    }
}
