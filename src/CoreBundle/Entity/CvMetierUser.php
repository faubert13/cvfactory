<?php


namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class CvMetierUser
 * @package CoreBundle\Entity
 * @ORM\Table(name="cv_metier_user")
 * @ORM\Entity()
 */
class CvMetierUser
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
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Cv", inversedBy="cv")
     */
    protected $cv;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Metier", inversedBy="metier")
     */
    protected $metier;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\User", inversedBy="user")
     */
    protected $user;


}