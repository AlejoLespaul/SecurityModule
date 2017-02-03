<?php

namespace SecurityModule\Entity;
//use Zend\Form\Annotation;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="SecurityModule\Repository\UserRepository")
 */
class User
{
    /**
     * @var integer
     * @ORM\Column(type="integer") 
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=50, unique=false, nullable=false, name="name")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=20, unique=true, nullable=false)
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(type="string", length=128, unique=false, nullable=false)
     */
    private $password;

    /**
     * @var string
     * @ORM\Column(type="string", length=50, unique=true, nullable=false)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=128, unique=true, nullable=false)
     */
    private $img;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", length=128, unique=false, nullable=false)
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", length=128, unique=false, nullable=false)
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\ManyToMany(targetEntity="SecurityModule\Entity\Rol")
     */
    private $rol;
    
    
    public function __construct() {
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getImg() {
        return $this->img;
    }

    function getCreateAt(): \DateTime {
        return $this->createAt;
    }

    function getRoles(): \Doctrine\Common\Collections\ArrayCollection {
        return $this->roles;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setCreateAt(\DateTime $createAt) {
        $this->createAt = $createAt;
    }

    function setRoles(\Doctrine\Common\Collections\ArrayCollection $roles) {
        $this->roles = $roles;
    }

 }
