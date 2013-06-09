<?php

namespace Tutorial\TodoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Todo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tutorial\TodoBundle\Entity\TodoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Todo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="completed", type="boolean", nullable=true)
     */
    private $completed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="completedAt", type="datetime", nullable=true)
     */
    private $completedAt;


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
     * Set name
     *
     * @param string $name
     * @return Todo
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
     * Set completed
     *
     * @param boolean $completed
     * @return Todo
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;
    
        return $this;
    }

    /**
     * Get completed
     *
     * @return boolean 
     */
    public function isCompleted()
    {
        return $this->completed;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Todo
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set completedAt
     *
     * @param \DateTime $completedAt
     * @return Todo
     */
    public function setCompletedAt($completedAt)
    {
        $this->completedAt = $completedAt;
    
        return $this;
    }

    /**
     * Get completedAt
     *
     * @return \DateTime 
     */
    public function getCompletedAt()
    {
        return $this->completedAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePepsist()
    {
        $this->createdAt= new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        if(!$this->isCompleted())
        {
            $this->completedAt = null;
        }
        if($this->isCompleted() && $this->completedAt === null)
        {
            $this->completedAt = new \DateTime();
        }
    }
}
