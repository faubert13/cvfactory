<?php
namespace CoreBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="experience")
 */
class Experience 
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
     * @var \DateTime $dateDebut
     * @ORM\Column(name="date_debut", type="datetime")
     */
    protected $dateDebut;

    /**
     * @var \DateTime $dateFin
     * @ORM\Column(name="date_fin", type="datetime")
     */
    protected $dateFin;

    /**
     * @var string $nomEntreprise
     * @ORM\Column(name="nom_entreprise", type="string")
     */
    protected $nomEntreprise;

    /**
     * @var string $poste
     * @ORM\Column(name="poste", type="string")
     */
    protected $poste;

    /**
     * @var array $taches
     * @ORM\Column(name="taches", type="array")
     */
    protected $taches;

    /**
     * @ORM\ManyToOne(targetEntity="Cv", inversedBy="experience")
     */
    protected $cv;


    /**
     * Experience constructor.
     */
    public function __construct()
    {
        $this->taches = new ArrayCollection();
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
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param \DateTime $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param \DateTime $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return string
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * @param string $nomEntreprise
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;
    }

    /**
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * @param string $poste
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;
    }

    /**
     * @return array
     */
    public function getTaches()
    {
        return $this->taches;
    }

    /**
     * @param array $taches
     */
    public function setTaches($taches)
    {
        $this->taches = $taches;
    }

    public function addTaches($taches)
    {

    }
}