<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="categorie_metier")
 */
class CategorieMetier 
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
     * @var string $description
     * @ORM\Column(name="description", type="string")
     */
    protected $description;

    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Metier", mappedBy="categorieMetier")
     */
    protected $metier;

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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getMetier()
    {
        return $this->metier;
    }

    /**
     * @param mixed $metier
     */
    public function setMetier($metier)
    {
        $this->metier = $metier;
    }
}