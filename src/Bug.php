<?php


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="BugRepository")
 * @ORM\Table(name="bugs")
 */
class Bug
{


    /**
     * @ORM\ID
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;


    /**
     * @ORM\Column(type="string")
     * @var string
     *
     */
    protected $description;


    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    protected $created;


    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $status;


    /**
     * @ORM\ManyToMany(targetEntity="Product")
     * @var ArrayCollection
     */
    protected $products;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     * @var
     */
    protected $engineer;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     * @var
     */
    protected $reporter;


    public function close()
    {
        $this->status = "CLOSE";
    }

    /**
     * @return mixed
     */
    public function getEngineer()
    {
        return $this->engineer;
    }

    /**
     * @return mixed
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    public function setEngineer(User $engineer)
    {

        $engineer->assignedToBug($this);
        //@TODO:
        $this->engineer = $engineer;
    }


    public function setReporter(User $reporter)
    {
        $reporter->addReportedBug($this);
        // @TODO:
        $this->reporter = $reporter;
    }


    public function assignToProduct(Product $product)
    {

        $this->products[] = $product;
    }


    public function getProducts()
    {
        return $this->products;
    }

    public function __construct()
    {
        $this->products = new ArrayCollection();

    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

































}
