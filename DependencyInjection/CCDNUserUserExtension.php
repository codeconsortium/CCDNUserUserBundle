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

namespace CCDNUser\UserBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class CCDNUserUserExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

		$container->setParameter('ccdn_user_user.user.profile_route', $config['user']['profile_route']);
		$container->setParameter('ccdn_user_user.template.engine', $config['template']['engine']);
		$container->setParameter('ccdn_user_user.template.theme', $config['template']['theme']);
		
		$this->getAccountSection($container, $config);
		$this->getChangePasswordSection($container, $config);
		$this->getRegistrationSection($container, $config);
		$this->getResettingSection($container, $config);
		$this->getSecuritySection($container, $config);
    }
	
	
	
	/**
	 *
	 * @access private
	 * @param $container, $config
	 */
	private function getAccountSection($container, $config)
	{
		$container->setParameter('ccdn_user_user.account.layout_templates.edit', $config['account']['layout_templates']['edit']);
		$container->setParameter('ccdn_user_user.account.layout_templates.show', $config['account']['layout_templates']['show']);
	}
	
	
	
	/**
	 *
	 * @access private
	 * @param $container, $config
	 */
	private function getChangePasswordSection($container, $config)
	{
		$container->setParameter('ccdn_user_user.password.layout_templates.change_password', $config['password']['layout_templates']['change_password']);		
	}
	
	
	
	
	/**
	 *
	 * @access private
	 * @param $container, $config
	 */
	private function getRegistrationSection($container, $config)
	{
		$container->setParameter('ccdn_user_user.registration.layout_templates.check_email', $config['registration']['layout_templates']['check_email']);
		$container->setParameter('ccdn_user_user.registration.layout_templates.confirmed', $config['registration']['layout_templates']['confirmed']);
		$container->setParameter('ccdn_user_user.registration.layout_templates.register', $config['registration']['layout_templates']['register']);
	}
	
	
	
	/**
	 *
	 * @access private
	 * @param $container, $config
	 */
	private function getResettingSection($container, $config)
	{
		$container->setParameter('ccdn_user_user.resetting.layout_templates.check_email', $config['resetting']['layout_templates']['check_email']);
		$container->setParameter('ccdn_user_user.resetting.layout_templates.password_already_requested', $config['resetting']['layout_templates']['password_already_requested']);
		$container->setParameter('ccdn_user_user.resetting.layout_templates.request', $config['resetting']['layout_templates']['request']);
		$container->setParameter('ccdn_user_user.resetting.layout_templates.reset', $config['resetting']['layout_templates']['reset']);
	}
	
	
	
	/**
	 *
	 * @access private
	 * @param $container, $config
	 */
	private function getSecuritySection($container, $config)
	{
		$container->setParameter('ccdn_user_user.security.layout_templates.login', $config['security']['layout_templates']['login']);
	}
	
}
