<?php

namespace CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Serializable;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity()
 */
class User implements AdvancedUserInterface, \Serializable
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
     * @ORM\Column(name="last_name", type="string", length=255)
     * @Assert\NotBlank(message = "Veuillez renseigner ce champ")
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     * @Assert\NotBlank(message = "Veuillez renseigner ce champ")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=255, nullable=true)
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\Email(message = "'{{ value }}' n'est pas un email valide.")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\NotBlank(message = "Veuillez renseigner ce champ")
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string")
     * @Assert\NotBlank(message = "Veuillez renseigner ce champ")
     */
    private $role;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    private $imgName;

    /**
     * @var string
     *
     * @Assert\Image(
     *    maxSize = "2M"
     * )
     */
    public $file;

    /**
     * @ORM\OneToOne(targetEntity="CoreBundle\Entity\SituationCivile")
     */
    protected $situationCivile;

    /**
     * User constructor.
     * @ORM\ManyToMany(targetEntity="CoreBundle\Entity\Cv")
     * @ORM\JoinTable(name="users_cvs",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $cvs;

    public function __construct() {
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
        $this->role = "ROLE_CUSTOMER";
        $this->cvs = new ArrayCollection();
    }

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
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set job
     *
     * @param string $job
     * @return User
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->role);
    }

    /**
     * Set role
     *
     * @param $role
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setRole($role)
    {
        if(!in_array($role, array("ROLE_SUPER_ADMIN", "ROLE_ADMIN", "ROLE_CUSTOMER"))) {
            throw new \InvalidArgumentException("Bad role");
        }
        $this->role = $role;

        return $this;
    }
    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * Set username
     *
     * @param string $email
     *
     * @return string
     */
    public function setUsername($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Set imgName
     *
     * @param $imgName
     * @return $this
     */
    public function setImgName($imgName)
    {
        $this->imgName = $imgName;

        return $this;
    }

    /**
     * Get imgName
     *
     * @return string
     */
    public function getImgName()
    {
        return $this->imgName;
    }

    /**
     * Retourne le chemin absolu pour une image en question
     *
     * @return null|string
     */
    public function getAbsolutePath()
    {
        return null === $this->imgName ? null : $this->getUploadRootDir().'/'.$this->imgName;
    }

    /**
     * Retourne le chemin entier vers une image en question
     *
     * @return null|string
     */
    public function getWebPath()
    {
        return null === $this->imgName ? null : $this->getUploadDir().'/'.$this->imgName;
    }

    /**
     * Retourne le chemin absolu du répertoire ou les images sont stockées
     *
     * @return string
     */
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    /**
     * Retourne le nom du répertoire ou sont stockées les images
     *
     * @return string
     */
    protected function getUploadDir()
    {
        return 'uploads/img';
    }

    /**
     * Permet d'uploader un fichier sur le serveur
     */
    public function upload()
    {
        // la propriété « file » peut être vide si le champ n'est pas requis
        if (null === $this->file) {
            return;
        } else {
            if(!empty($this->lastName)) {
                $this->imgName = strtolower($this->lastName.'_'.sha1(uniqid(mt_rand(), true)).'.'.$this->file->guessExtension());
            } else {
                $this->imgName = strtolower(sha1(uniqid(mt_rand(), true)).'.'.$this->file->guessExtension());
            }
        }

        // la méthode « move » prend comme arguments le répertoire cible
        // et le nom du fichier cible
        $this->file->move($this->getUploadRootDir(), $this->imgName);

        // « nettoie » la propriété « file »
        $this->file = null;
    }

    /**
     * Permet de supprimer une image
     */
    public function removeFile()
    {
        $filePath = $this->getUploadRootDir().DIRECTORY_SEPARATOR.$this->getImgName();

        if(file_exists($filePath)) {
            unlink($filePath);
        }
    }

    /**
     * @inheritdoc
     *
     * @return bool
     */
    public function isAccountNonExpired()
    {
        return true;
    }

    /**
     * @inheritdoc
     *
     * @return bool
     */
    public function isAccountNonLocked()
    {
        return ($this->isActive) ? true : false;
    }

    /**
     * @inheritdoc
     *
     * @return bool
     */
    public function isCredentialsNonExpired()
    {
        return true ;
    }

    /**
     * @inheritdoc
     *
     * @return bool
     */
    public function isEnabled()
    {
        return true ;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            ) = unserialize($serialized);
    }

}