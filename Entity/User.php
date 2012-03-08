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

namespace CCDNUser\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use FOS\UserBundle\Entity\User as BaseUser;
use CCDNUser\ProfileBundle\Entity\Profile;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;

/**
 * @ORM\Entity(repositoryClass="CCDNUser\UserBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\generatedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $registered_date;

	/**
	 * @ORM\OneToOne(targetEntity="CCDNUser\ProfileBundle\Entity\Profile", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
	 */
	protected $profile;
	
	/**
	 * @Recaptcha\True(groups={"Registration"})
	 */
	public $recaptcha;
	
    public function __construct()
    {
        parent::__construct();
        // your own logic
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
     * Set profile
     *
     * @param CCDNUser\ProfileBundle\Entity\Profile $profile
     */
    public function setProfile(\CCDNUser\ProfileBundle\Entity\Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Get profile
     *
     * @return CCDNUser\ProfileBundle\Entity\Profile 
     */
    public function getProfile()
    {
		if (empty($this->profile))
		{
			$this->profile = new Profile();
			$this->profile->setUser($this);
		}
		
        return $this->profile;
    }

    /**
     * Set registered_date
     *
     * @param datetime $registeredDate
     */
    public function setRegisteredDate($registeredDate)
    {
        $this->registered_date = $registeredDate;
    }

    /**
     * Get registered_date
     *
     * @return datetime 
     */
    public function getRegisteredDate()
    {
        return $this->registered_date;
    }

}