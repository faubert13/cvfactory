<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="competences")
 */
class Competence 
{
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $libelle
     * @ORM\Column(name="libelle", type="string")
     */
    protected $libelle;

    /**
     * @ORM\OneToOne(targetEntity="CoreBundle\Entity\CompetenceNiveau")
     */
    protected $competenceNiveau;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Cv", inversedBy="competence")
     */
    protected $cv;

    public function __construct()
    {

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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getCompetenceNiveau()
    {
        return $this->competenceNiveau;
    }

    /**
     * @param mixed $competenceNiveau
     */
    public function setCompetenceNiveau($competenceNiveau)
    {
        $this->competenceNiveau = $competenceNiveau;
    }

    /**
     * @return mixed
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * @param mixed $cv
     */
    public function setCv($cv)
    {
        $this->cv = $cv;
    }
}