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

use CCDNUser\ProfileBundle\Entity\Profile;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 *
 * @category CCDNUser
 * @package  UserBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNUserUserBundle
 *
 * @abstract
 */
abstract class User extends BaseUser
{
    /**
     *
     * @access protected
     * @var CCDNUser\ProfileBundle\Entity\Profile
     */
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
     * @param  CCDNUser\ProfileBundle\Entity\Profile $profile
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
