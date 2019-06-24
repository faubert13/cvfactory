<?php
namespace CoreBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cv")
 */
class Cv
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @ORM\OneToOne(targetEntity="CoreBundle\Entity\Langue")
     * @ORM\JoinColumn(name="langue_id", referencedColumnName="id")
     */
    protected $langue;

    /**
     * @ORM\OneToOne(targetEntity="CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Experience", mappedBy="cv")
     */
    protected $experience;

    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Competence", mappedBy="cv")
     */
    protected $competence;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Langue")
     * @ORM\JoinColumn(name="langue_id", referencedColumnName="id")
     */
    protected $langueCv;

    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Loisirs", mappedBy="cv")
     */
    protected $loisir;

    public function __construct()
    {
        $this->competence = new ArrayCollection();
        $this->experience = new ArrayCollection();
        $this->loisir = new ArrayCollection();
        $this->langue = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * @param mixed $langue
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    /**
     * @return mixed
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * @param mixed $competence
     */
    public function setCompetence($competence)
    {
        $this->competence = $competence;
    }

    /**
     * @return mixed
     */
    public function getLangueCv()
    {
        return $this->langueCv;
    }

    /**
     * @param mixed $langueCv
     */
    public function setLangueCv($langueCv)
    {
        $this->langueCv = $langueCv;
    }

    /**
     * @return mixed
     */
    public function getLoisir()
    {
        return $this->loisir;
    }

    /**
     * @param mixed $loisir
     */
    public function setLoisir($loisir)
    {
        $this->loisir = $loisir;
    }
}