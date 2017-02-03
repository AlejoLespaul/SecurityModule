<?php

namespace SecurityModule\Adapter;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Crypt\Password\Bcrypt;

class Doctrine implements AdapterInterface {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * 
     * @var string
     */
    private $identity;

    /**
     *
     * @var string
     */
    private $credential;

    function getIdentity() {
        return $this->identity;
    }

    function getCredential() {
        return $this->credential;
    }

    function setIdentity($identity) {
        $this->identity = $identity;
    }

    function setCredential($credential) {
        $this->credential = $credential;
    }

    function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    function getEm() {
        return $this->em;
    }

    /**
     * @param $em \Doctrine\ORM\EntityManager
     */
    function setEm(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function authenticate(): \Zend\Authentication\Result {
        
        $bcrypt = new Bcrypt;
        $bcrypt->setCost(12);
        
        $identity = $this->getEm()->getRepository('SecurityModule\Entity\User')
                ->getAuthenticateByEmailOrUsername($this->identity,$this->credential);
        
        $mensaje = array();
        $code = 0;
        
        if ($identity) {
            if ($bcrypt->verify($this->credential, $identity->getPassword())) {
                $mensaje = ['Usuario logueado exitosamente'];
                $code = 1;
            }else{
                $mensaje = ['Falla al autenticar, clave erronea'];
            }
        }else{
            $mensaje = ['Falla al autenticar, usuario o email erroneos'];
        }
  
        return new \Zend\Authentication\Result($code, $identity, $mensaje);
    }

}
