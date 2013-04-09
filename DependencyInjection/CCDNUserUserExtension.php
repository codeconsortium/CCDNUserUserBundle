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

namespace CCDNUser\UserBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;

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
    public function getAlias()
    {
        return 'ccdn_user_user';
    }

    /**
     *
     * @access private
	 * @param array $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

		// Class file namespaces.
        $this->getEntitySection($config, $container);
        $this->getRepositorySection($config, $container);
		$this->getFormSection($config, $container);
		$this->getComponentSection($config, $container);
		
		// Configuration stuff.
        $container->setParameter('ccdn_user_user.template.engine', $config['template']['engine']);
        $this->getSEOSection($config, $container);
        $this->getAccountSection($config, $container);
        $this->getChangePasswordSection($config, $container);
        $this->getRegistrationSection($config, $container);
        $this->getResettingSection($config, $container);
        $this->getSecuritySection($config, $container);
        $this->getLegalSection($config, $container);
		
		// Load Service definitions.
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     *
     * @access private
	 * @param array $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    private function getEntitySection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_user_user.entity.user.class', $config['entity']['user']['class']);				
	}
	
    /**
     *
     * @access private
	 * @param array $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    private function getRepositorySection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_user_user.repository.user.class', $config['repository']['user']['class']);
	}
	
    /**
     *
     * @access private
	 * @param array $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    private function getFormSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_user_user.form.type.registration.class', $config['form']['type']['registration']['class']);
	}
	
    /**
     *
     * @access private
     * @param array $config
	 * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    private function getComponentSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_user_user.component.dashboard.integrator.class', $config['component']['dashboard']['integrator']['class']);		
        $container->setParameter('ccdn_user_user.component.route_referer_ignore.list.class', $config['component']['route_referer_ignore']['list']['class']);		
	}
	
    /**
     *
     * @access private
	 * @param array $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    protected function getSEOSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_user_user.seo.title_length', $config['seo']['title_length']);
    }

    /**
     *
     * @access private
	 * @param array $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    private function getAccountSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_user_user.account.show.layout_template', $config['account']['show']['layout_template']);

        $container->setParameter('ccdn_user_user.account.edit.layout_template', $config['account']['edit']['layout_template']);
        $container->setParameter('ccdn_user_user.account.edit.form_theme', $config['account']['edit']['form_theme']);
    }

    /**
     *
     * @access private
	 * @param array $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    private function getChangePasswordSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_user_user.password.change_password.layout_template', $config['password']['change_password']['layout_template']);
        $container->setParameter('ccdn_user_user.password.change_password.form_theme', $config['password']['change_password']['form_theme']);
    }

    /**
     *
     * @access private
	 * @param array $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    private function getRegistrationSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_user_user.registration.register.layout_template', $config['registration']['register']['layout_template']);
        $container->setParameter('ccdn_user_user.registration.register.form_theme', $config['registration']['register']['form_theme']);

        $container->setParameter('ccdn_user_user.registration.check_email.layout_template', $config['registration']['check_email']['layout_template']);

        $container->setParameter('ccdn_user_user.registration.confirmed.layout_template', $config['registration']['confirmed']['layout_template']);
    }

    /**
     *
     * @access private
	 * @param array $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    private function getResettingSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_user_user.resetting.request.layout_template', $config['resetting']['request']['layout_template']);

        $container->setParameter('ccdn_user_user.resetting.password_already_requested.layout_template', $config['resetting']['password_already_requested']['layout_template']);

        $container->setParameter('ccdn_user_user.resetting.check_email.layout_template', $config['resetting']['check_email']['layout_template']);

        $container->setParameter('ccdn_user_user.resetting.reset.layout_template', $config['resetting']['reset']['layout_template']);
        $container->setParameter('ccdn_user_user.resetting.reset.form_theme', $config['resetting']['reset']['form_theme']);
    }

    /**
     *
     * @access private
	 * @param array $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    private function getSecuritySection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_user_user.security.login.layout_template', $config['security']['login']['layout_template']);
        $container->setParameter('ccdn_user_user.security.login.support_facebook', $config['security']['login']['support_facebook']);
    }

    /**
     *
     * @access private
	 * @param array $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    private function getLegalSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_user_user.legal.terms_conditions.layout_template', $config['legal']['terms_conditions']['layout_template']);
        $container->setParameter('ccdn_user_user.legal.terms_conditions.document', $config['legal']['terms_conditions']['document']);
		
        $container->setParameter('ccdn_user_user.legal.copyright_notice.layout_template', $config['legal']['copyright_notice']['layout_template']);
        $container->setParameter('ccdn_user_user.legal.copyright_notice.document', $config['legal']['copyright_notice']['document']);
		
        $container->setParameter('ccdn_user_user.legal.privacy_policy.layout_template', $config['legal']['privacy_policy']['layout_template']);
        $container->setParameter('ccdn_user_user.legal.privacy_policy.document', $config['legal']['privacy_policy']['document']);
		
        $container->setParameter('ccdn_user_user.legal.disclaimer.layout_template', $config['legal']['disclaimer']['layout_template']);
        $container->setParameter('ccdn_user_user.legal.disclaimer.document', $config['legal']['disclaimer']['document']);
		

        $container->setParameter('ccdn_user_user.legal_identification.company_name', $config['legal_identification']['company_name']);
        $container->setParameter('ccdn_user_user.legal_identification.company_address', $config['legal_identification']['company_address']);
        $container->setParameter('ccdn_user_user.legal_identification.company_registered_number', $config['legal_identification']['company_registered_number']);
        $container->setParameter('ccdn_user_user.legal_identification.company_registered_house', $config['legal_identification']['company_registered_house']);
        $container->setParameter('ccdn_user_user.legal_identification.copyright_year', $config['legal_identification']['copyright_year']);

        $container->setParameter('ccdn_user_user.legal_identification.show_company_name', $config['legal_identification']['show_company_name']);
        $container->setParameter('ccdn_user_user.legal_identification.show_company_address', $config['legal_identification']['show_company_address']);
        $container->setParameter('ccdn_user_user.legal_identification.show_company_registered_number', $config['legal_identification']['show_company_registered_number']);
        $container->setParameter('ccdn_user_user.legal_identification.show_company_registered_house', $config['legal_identification']['show_company_registered_house']);
        $container->setParameter('ccdn_user_user.legal_identification.show_copyright_year', $config['legal_identification']['show_copyright_year']);

    }
}
