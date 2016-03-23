<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Document
 *
 * @ORM\Table(name="document", uniqueConstraints={@ORM\UniqueConstraint(name="document_url_uniq", columns={"url"})}, indexes={@ORM\Index(name="document_category_id_idx", columns={"category_id"})})
 * @ORM\Entity
 */
class Document
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
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", nullable=true)
     */
    private $body;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean", nullable=false)
     */
    private $isactive;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deletable", type="boolean", nullable=false)
     */
    private $deletable;

    /**
     * @var boolean
     *
     * @ORM\Column(name="archieved", type="boolean", nullable=false)
     */
    private $archieved;

    /**
     * @var string
     *
     * @ORM\Column(name="contentTitle", type="string", length=255, nullable=false)
     */
    private $contenttitle;

    /**
     * @var \DocumentCategory
     *
     * @ORM\ManyToOne(targetEntity="DocumentCategory", inversedBy="documents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category_id;

    /**
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="document") 
     */	
	private $photos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new ArrayCollection();
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
     * @return Document
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
     * Set keywords
     *
     * @param string $keywords
     * @return Document
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Document
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
     * Set url
     *
     * @param string $url
     * @return Document
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
     * Set body
     *
     * @param string $body
     * @return Document
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set isactive
     *
     * @param boolean $isactive
     * @return Document
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return boolean 
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Set deletable
     *
     * @param boolean $deletable
     * @return Document
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
     * Set archieved
     *
     * @param boolean $archieved
     * @return Document
     */
    public function setArchieved($archieved)
    {
        $this->archieved = $archieved;

        return $this;
    }

    /**
     * Get archieved
     *
     * @return boolean 
     */
    public function getArchieved()
    {
        return $this->archieved;
    }

    /**
     * Set contenttitle
     *
     * @param string $contenttitle
     * @return Document
     */
    public function setContenttitle($contenttitle)
    {
        $this->contenttitle = $contenttitle;

        return $this;
    }

    /**
     * Get contenttitle
     *
     * @return string 
     */
    public function getContenttitle()
    {
        return $this->contenttitle;
    }



    /**
     * Set category_id
     *
     * @param \BaseBundle\Entity\DocumentCategory $categoryId
     * @return Document
     */
    public function setCategoryId(\BaseBundle\Entity\DocumentCategory $categoryId = null)
    {
        $this->category_id = $categoryId;

        return $this;
    }

    /**
     * Get category_id
     *
     * @return \BaseBundle\Entity\DocumentCategory 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Add photos
     *
     * @param \BaseBundle\Entity\Photo $photos
     * @return Document
     */
    public function addPhoto(\BaseBundle\Entity\Photo $photos)
    {
        $this->photos[] = $photos;

        return $this;
    }

    /**
     * Remove photos
     *
     * @param \BaseBundle\Entity\Photo $photos
     */
    public function removePhoto(\BaseBundle\Entity\Photo $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhotos()
    {
        return $this->photos;
    }
}
