<?php
namespace CoreBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="metier")
 */
class Metier
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
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\CategorieMetier", inversedBy="categorieMetier")
     * @ORM\JoinColumn(name="categorie_metier_id", referencedColumnName="id")
     */
    protected $categorieMetier;

    public function __construct()
    {
        $this->categorieMetier = new ArrayCollection();
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
    public function getCategorieMetier()
    {
        return $this->categorieMetier;
    }

    /**
     * @param mixed $categorieMetier
     */
    public function setCategorieMetier($categorieMetier)
    {
        $this->categorieMetier = $categorieMetier;
    }
}