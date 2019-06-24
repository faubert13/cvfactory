<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="situation_civile")
 */
class SituationCivile 
{
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $civilite
     * @ORM\Column(name="civilite", type="string")
     */
    protected $civilite;

    /**
     * @var string $nom
     * @ORM\Column(name="nom", type="string")
     */
    protected $nom;

    /**
     * @var string $prenom
     * @ORM\Column(name="prenom", type="string")
     */
    protected $prenom;

    /**
     * @var string $telephone
     * @ORM\Column(name="telephone", type="string")
     */
    protected $telephone;

    /**
     * @var string $mail
     * @ORM\Column(name="mail", type="string")
     */
    protected $mail;

    /**
     * @var string $adresse
     * @ORM\Column(name="adresse", type="string")
     */
    protected $adresse;

    /**
     * @var string $adresseComp
     * @ORM\Column(name="adresse_comp", type="string")
     */
    protected $adresseComp;

    /**
     * @var string $codePostale
     * @ORM\Column(name="code_postale", type="string")
     */
    protected $codePostale;

    /**
     * @var string $ville
     * @ORM\Column(name="ville", type="string")
     */
    protected $ville;

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
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * @param string $civilite
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getAdresseComp()
    {
        return $this->adresseComp;
    }

    /**
     * @param string $adresseComp
     */
    public function setAdresseComp($adresseComp)
    {
        $this->adresseComp = $adresseComp;
    }

    /**
     * @return string
     */
    public function getCodePostale()
    {
        return $this->codePostale;
    }

    /**
     * @param string $codePostale
     */
    public function setCodePostale($codePostale)
    {
        $this->codePostale = $codePostale;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }
}