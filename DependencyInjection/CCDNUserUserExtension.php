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
    public function getAlias()
    {
        return 'ccdn_user_user';
    }

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

        $this->getAccountSection($container, $config);
        $this->getChangePasswordSection($container, $config);
        $this->getRegistrationSection($container, $config);
        $this->getResettingSection($container, $config);
        $this->getSecuritySection($container, $config);
        $this->getSidebarSection($container, $config);
    }

    /**
     *
     * @access private
     * @param $container, $config
     */
    private function getAccountSection($container, $config)
    {
        $container->setParameter('ccdn_user_user.account.show.layout_template', $config['account']['show']['layout_template']);

        $container->setParameter('ccdn_user_user.account.edit.layout_template', $config['account']['edit']['layout_template']);
        $container->setParameter('ccdn_user_user.account.edit.form_theme', $config['account']['edit']['form_theme']);

    }

    /**
     *
     * @access private
     * @param $container, $config
     */
    private function getChangePasswordSection($container, $config)
    {
        $container->setParameter('ccdn_user_user.password.change_password.layout_template', $config['password']['change_password']['layout_template']);
        $container->setParameter('ccdn_user_user.password.change_password.form_theme', $config['password']['change_password']['form_theme']);
    }

    /**
     *
     * @access private
     * @param $container, $config
     */
    private function getRegistrationSection($container, $config)
    {
        $container->setParameter('ccdn_user_user.registration.register.layout_template', $config['registration']['register']['layout_template']);
        $container->setParameter('ccdn_user_user.registration.register.form_theme', $config['registration']['register']['form_theme']);

        $container->setParameter('ccdn_user_user.registration.check_email.layout_template', $config['registration']['check_email']['layout_template']);

        $container->setParameter('ccdn_user_user.registration.confirmed.layout_template', $config['registration']['confirmed']['layout_template']);
    }

    /**
     *
     * @access private
     * @param $container, $config
     */
    private function getResettingSection($container, $config)
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
     * @param $container, $config
     */
    private function getSecuritySection($container, $config)
    {
        $container->setParameter('ccdn_user_user.security.login.layout_template', $config['security']['login']['layout_template']);
        $container->setParameter('ccdn_user_user.security.login.support_facebook', $config['security']['login']['support_facebook']);
    }

    /**
     *
     * @access private
     * @param $container, $config
     */
    private function getSidebarSection($container, $config)
    {
        $container->setParameter('ccdn_user_user.sidebar.members_route', $config['sidebar']['members_route']);
        $container->setParameter('ccdn_user_user.sidebar.profile_route', $config['sidebar']['profile_route']);

    }

}
