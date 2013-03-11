<?php

/*
 * This file is part of the CCDNUser UserBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNUser\UserBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

use CCDNUser\ProfileBundle\Entity\Profile;
use FOS\UserBundle\Entity\User as BaseUser;

abstract class User extends BaseUser
{
	/** @var CCDNUser\ProfileBundle\Entity\Profile */
	protected $profile;
	
	/**
	 *
	 * @access public
	 */
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

	/**
	 * Setup Profile before being persisted.
	 *
	 */
	public function prePersistAddProfile()
	{
		if (null == $this->profile) {
			$this->profile = new Profile();
		
			$this->profile->setUser($this);			
		}
	}
	
    /**
     * Get profile
     *
     * @return CCDNUser\ProfileBundle\Entity\Profile
     */
    public function getProfile()
    {
        if (null == $this->profile) {
            $this->profile = new Profile();
            $this->profile->setUser($this);
        }
		
        return $this->profile;
    }
	
    /**
     * Set profile
     *
     * @param CCDNUser\ProfileBundle\Entity\Profile $profile
	 * @return User
     */
    public function setProfile(Profile $profile = null)
    {
        $this->profile = $profile;

        if (null == $this->profile) {
            $this->profile = new Profile();
            $this->profile->setUser($this);
        }
				
		return $this;
    }
}
