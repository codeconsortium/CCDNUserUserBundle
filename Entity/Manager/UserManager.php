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

namespace CCDNUser\UserBundle\Entity\Manager;

use CCDNComponent\CommonBundle\Entity\Manager\EntityManagerInterface;
use CCDNComponent\CommonBundle\Entity\Manager\BaseManager;

/**
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class UserManager extends BaseManager implements EntityManagerInterface
{
	
	
	/**
	 *
	 * @access public
	 * @param $account
	 * @return $this
	 */	
	public function insert($account)
	{
		// insert a new row
		$this->persist($account);
		$this->flushNow();
		
		return $this;
	}
	
	
	/**
	 *
	 * @access public
	 * @param $account
	 * @return $this
	 */
	public function update($account)
	{
		// update the record
		$this->persist($account);
		$this->flushNow();
		
		return $this;
	}
	
	
	/**
	 *
	 * @access public
	 * @param $user
	 * @return $this
	 */
	public function activate($user)
	{
		$user->setEnabled(1);
		$this->persist($user);
		
		return $this;
	}
	
	
	/**
	 *
	 * @access public
	 * @param $user
	 * @return $this
	 */
	public function forceReActivate($user)
	{
		$user->setEnabled(0);
		$this->persist($user);
		
		return $this;
	}
	
	
	/**
	 *
	 * @access public
	 * @param $user
	 * @return $this
	 */
	public function ban($user)
	{
		$user->setLocked(1);
		$this->persist($user);

		return $this;
	}
	
	
	/**
	 *
	 * @access public
	 * @param $user
	 * @return $this
	 */
	public function unban($user)
	{
		$user->setLocked(0);
		$this->persist($user);
		
		return $this;
	}

}