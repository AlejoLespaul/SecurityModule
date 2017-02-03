<?php

namespace SecurityModule\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository {

    public function getAuthenticateByEmailOrUsername($username, $password) {
   
        return $this->getEntityManager()
                ->createQueryBuilder()->select('u')->from('SecurityModule\Entity\User', 'u')
                ->where('u.email = :username or u.username = :username')
                ->setParameter("username", $username)
                ->getQuery()
                ->getOneOrNullResult();
           
    }
}
