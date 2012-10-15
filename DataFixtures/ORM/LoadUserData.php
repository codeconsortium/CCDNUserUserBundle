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

namespace CCDNUser\UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use CCDNUser\UserBundle\Entity\User;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{

	/**
	 *
	 * @access private
	 */
    private $container;

	/**
	 *
	 * @access public
	 * @param ContainerInterface $container
	 */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

	/**
	 *
	 * @access public
	 * @param ObjectManager $manager
	 */
    public function load(ObjectManager $manager)
    {
		$userAdmin = new User();
		
		$userAdmin->setUsername('admin');
		$userAdmin->setUsernameCanonical('admin');
		$userAdmin->setPlainPassword('root');
		$userAdmin->setEmail('admin@codeconsortium.com');
		$userAdmin->setEmailCanonical('admin@codeconsortium.com');
		$userAdmin->setEnabled(true);
		$userAdmin->setRoles(array('ROLE_USER', 'ROLE_MODERATOR', 'ROLE_ADMIN'));
		$userAdmin->setSuperAdmin(true);
  	
		$userTest = new User();
		
		$userTest->setUsername('test');
		$userTest->setUsernameCanonical('test');
		$userTest->setPlainPassword('root');
		$userTest->setEmail('test@codeconsortium.com');
		$userTest->setEmailCanonical('test@codeconsortium.com');
		$userTest->setEnabled(true);
		$userTest->setRoles(array('ROLE_USER'));
		
		$userManager = $this->container->get('fos_user.user_manager');
		$userManager->updateUser($userAdmin);
		$userManager->updateUser($userTest);
		
		$manager->refresh($userAdmin, $userTest);
		
		$this->addReference('user-admin', $userAdmin);
		$this->addReference('user-test', $userTest);
    }

	/**
	 *
	 * @access public
	 * @return int
	 */
	public function getOrder()
	{
		return 1;
	}
	
}
