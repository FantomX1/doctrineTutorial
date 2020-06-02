<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;


    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;


    /**
     * @ORM\OneToMany(targetEntity="Bug", mappedBy="reporter")
     * @var Bug[] An ArrayCollecton of Bug objects
     * @var ArrayCollection
     */
    protected $reportedBugs;

    /**
     * @ORM\OneToMany(targetEntity="Bug", mappedBy="engineer")
     * @var Bug[] An ArrayCollecton of Bug objects
     * @var ArrayCollection
     */
    protected $assignedBugs;


    public function __construct()
    {

        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();

    }

    public function addReportedBug(Bug $bug)
    {
        $this->reportedBugs[] = $bug;
    }


    public function assignedToBug(Bug $bug)
    {
        $this->assignedBugs[] = $bug;

    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }



}
