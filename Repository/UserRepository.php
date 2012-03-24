<?php

/*
 * This file is part of the CCDN UserBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/> 
 * 
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNUser\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * UserRepository
 *
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class UserRepository extends EntityRepository
{


	/**
	 *
	 * @access public
	 */
	public function findAllPaginated()
	{
		
		$query = $this->getEntityManager()
			->createQuery('
				SELECT u, p FROM CCDNUserUserBundle:User u
				LEFT JOIN u.profile p
				WHERE u.locked = 0 AND u.enabled = 1
				GROUP BY u.id
				ORDER BY u.username ASC');
									
		try {
			return new Pagerfanta(new DoctrineORMAdapter($query));
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        return null;
	    }
	}
	
	
	/**
	 *
	 * @access public
	 * @param char $filter
	 */
	public function findAllFilteredPaginated($filter)
	{
		
		$query = $this->getEntityManager()
			->createQuery('
				SELECT u, p FROM CCDNUserUserBundle:User u
				INNER JOIN u.profile p
				WHERE u.username LIKE :filter AND u.locked = 0 AND u.enabled = 1
				GROUP BY u.id
				ORDER BY u.username ASC')
			->setParameter('filter', $filter . '%');
									
		try {
			return new Pagerfanta(new DoctrineORMAdapter($query));
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        return null;
	    }
	}
	
	
	/**
	 *
	 * @access public
	 */
	public function findAllUnactivatedPaginated()
	{
		
		$query = $this->getEntityManager()
			->createQuery('
				SELECT u, p FROM CCDNUserUserBundle:User u
				LEFT JOIN u.profile p
				WHERE u.enabled = 0
				GROUP BY u.id
				ORDER BY u.username ASC');
									
		try {
			return new Pagerfanta(new DoctrineORMAdapter($query));
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        return null;
	    }
	}
	
	
	/**
	 *
	 * @access public
	 */
	public function findAllBannedPaginated()
	{
		
		$query = $this->getEntityManager()
			->createQuery('
				SELECT u, p FROM CCDNUserUserBundle:User u
				LEFT JOIN u.profile p
				WHERE u.locked = 1
				GROUP BY u.id
				ORDER BY u.username ASC');
									
		try {
			return new Pagerfanta(new DoctrineORMAdapter($query));
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        return null;
	    }
	}
	
	
	/**
	 *
	 * @access public
	 */
	public function findAllNewPaginated()
	{
		
		$query = $this->getEntityManager()
			->createQuery('
				SELECT u, p FROM CCDNUserUserBundle:User u
				INNER JOIN u.profile p
				WHERE u.registered_date > :date
				GROUP BY u.id
				ORDER BY u.username ASC')
			->setParameter('date', new \DateTime('-7 days'));
		try {
			return new Pagerfanta(new DoctrineORMAdapter($query));
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        return null;
	    }
	}
	
	
	/**
	 *
	 * @access public
	 * @param Array() $usernames
	 */
	public function findTheseUsersByUsername($usernames)
	{
 		$qb = $this->getEntityManager()->createQueryBuilder();
		$query = $qb->add('select', 'u')
			->from('CCDNUserUserBundle:User', 'u')
			->where($qb->expr()->in('u.username', array_values($usernames)))
			->getQuery();
			
		try {
			return $query->getResult();
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        return null;
	    }
	}
	
}