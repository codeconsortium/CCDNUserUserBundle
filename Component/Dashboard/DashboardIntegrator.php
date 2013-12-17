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

namespace CCDNUser\UserBundle\Component\Dashboard;

use CCDNComponent\DashboardBundle\Component\Integrator\Model\BuilderInterface;

/**
 *
 * @category CCDNUser
 * @package  UserBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNUserUserBundle
 *
 */
class DashboardIntegrator
{
    /**
     *
     * @access public
     * @param CCDNComponent\DashboardBundle\Component\Integrator\Model\BuilderInterface $builder
     */
    public function build(BuilderInterface $builder)
    {
        $builder
            ->addCategory('account')
                ->setLabel('dashboard.categories.account', array(), 'CCDNUserUserBundle')
                ->addPages()
                    ->addPage('account')
                        ->setLabel('dashboard.pages.account', array(), 'CCDNUserUserBundle')
                    ->end()
                ->end()
                ->addLinks()
                    ->addLink('account_show')
                        ->setAuthRole('ROLE_USER')
                        ->setRoute('ccdn_user_user_account_show')
                        ->setIcon('/bundles/ccdncomponentcommon/images/icons/Black/32x32/32x32_account.png')
                        ->setLabel('dashboard.links.show_account', array(), 'CCDNUserUserBundle')
                    ->end()
                    ->addLink('login')
                        ->setLessThanAuthRole('ROLE_USER')
                        ->setRoute('fos_user_security_login')
                        ->setIcon('/bundles/ccdncomponentcommon/images/icons/Black/32x32/32x32_account.png')
                        ->setLabel('dashboard.links.login', array(), 'CCDNUserUserBundle')
                    ->end()
                    ->addLink('register')
                        ->setLessThanAuthRole('ROLE_USER')
                        ->setRoute('ccdn_user_user_registration_terms')
                        ->setIcon('/bundles/ccdncomponentcommon/images/icons/Black/32x32/32x32_account.png')
                        ->setLabel('dashboard.links.register', array(), 'CCDNUserUserBundle')
                    ->end()
                ->end()
            ->end()
        ;
    }
}
