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

namespace CCDNUser\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

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
 */
class CCDNUserUserBundle extends Bundle
{
    /**
     *
     * @access public
     * @return string
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }

//	public function build(ContainerBuilder $container)
//    {
//	    parent::build($container);
//		
//        if (false === $container->hasDefinition('doctrine.orm.listeners.resolve_target_entity')) {
//            return;
//        }
//
//        $definition = $container->getDefinition('doctrine.orm.listeners.resolve_target_entity');
//
//		//$taggedServices = $container->findTaggedServiceIds('doctrine.event_listener');
//		$targetEntites = array(
//            '\Symfony\Component\Security\Core\User\UserInterface' => 'CCDNUser\UserBundle\Entity\User'
//		);
//		
//        foreach ($argetEntities as $name => $implementation) {
//            $definition->addMethodCall('addResolveTargetEntity', array($name, $implementation, array()));
//        }
//	}

    /**
     *
     * @access public
     */
    public function boot()
    {
        $twig = $this->container->get('twig');
		
        $twig->addGlobal(
			'ccdn_user_user',
            array(
                'seo' => array(
                    'title_length' => $this->container->getParameter('ccdn_user_user.seo.title_length'),
                ),
                'legal' => array(
                    'terms_conditions' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.legal.terms_conditions.layout_template'),
                        'document' => $this->container->getParameter('ccdn_user_user.legal.terms_conditions.document'),
                    ),
                    'copyright_notice' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.legal.copyright_notice.layout_template'),
                        'document' => $this->container->getParameter('ccdn_user_user.legal.copyright_notice.document'),
                    ),
                    'privacy_policy' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.legal.privacy_policy.layout_template'),
                        'document' => $this->container->getParameter('ccdn_user_user.legal.privacy_policy.document'),
                    ),
                    'disclaimer' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.legal.disclaimer.layout_template'),
                        'document' => $this->container->getParameter('ccdn_user_user.legal.disclaimer.document'),
                    ),
                ),
                'legal_identification' => array(
                    'company_name' => $this->container->getParameter('ccdn_user_user.legal_identification.company_name'),
                    'company_address' => $this->container->getParameter('ccdn_user_user.legal_identification.company_address'),
                    'company_registered_number' => $this->container->getParameter('ccdn_user_user.legal_identification.company_registered_number'),
                    'company_registered_house' => $this->container->getParameter('ccdn_user_user.legal_identification.company_registered_house'),
                    'copyright_year' => $this->container->getParameter('ccdn_user_user.legal_identification.copyright_year'),

                    'show_company_name' => $this->container->getParameter('ccdn_user_user.legal_identification.show_company_name'),
                    'show_company_address' => $this->container->getParameter('ccdn_user_user.legal_identification.show_company_address'),
                    'show_company_registered_number' => $this->container->getParameter('ccdn_user_user.legal_identification.show_company_registered_number'),
                    'show_company_registered_house' => $this->container->getParameter('ccdn_user_user.legal_identification.show_company_registered_house'),
                    'show_copyright_year' => $this->container->getParameter('ccdn_user_user.legal_identification.show_copyright_year'),
                ),
                'registration' => array(
                    'register' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.registration.register.layout_template'),
                        'form_theme' => $this->container->getParameter('ccdn_user_user.registration.register.form_theme'),
                    ),
                    'terms' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.registration.terms.layout_template'),
                    ),
                    'check_email' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.registration.check_email.layout_template'),
                    ),
                    'confirmed' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.registration.confirmed.layout_template'),
                    ),
                ),
                'security' => array(
                    'login' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.security.login.layout_template'),
                        'support_facebook' => $this->container->getParameter('ccdn_user_user.security.login.support_facebook'),
                    ),
                ),
                'resetting' => array(
                    'request' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.resetting.request.layout_template'),
                    ),
                    'check_email' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.resetting.check_email.layout_template'),
                    ),
                    'password_already_requested' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.resetting.password_already_requested.layout_template'),
                    ),
                    'reset' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.resetting.reset.layout_template'),
                        'form_theme' => $this->container->getParameter('ccdn_user_user.resetting.reset.form_theme'),
                    ),
                ),
                'account' => array(
                    'show' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.account.show.layout_template'),
                    ),
                    'edit' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.account.edit.layout_template'),
                        'form_theme' => $this->container->getParameter('ccdn_user_user.account.edit.form_theme'),
                    ),
                ),
                'password' => array(
                    'change_password' => array(
                        'layout_template' => $this->container->getParameter('ccdn_user_user.password.change_password.layout_template'),
                        'form_theme' => $this->container->getParameter('ccdn_user_user.password.change_password.form_theme'),
                    ),
                ),
            )
        ); // End Twig Globals.
    }
}
