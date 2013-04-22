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

namespace CCDNUser\UserBundle\Component\RouteRefererIgnore;

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
class RouteRefererIgnoreList
{
    /**
     *
      * @access public
     * @return mixed[]
     */
    public function getRoutes()
    {
        $ignore = array(
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_security_login'),
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_security_check'),
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_security_logout'),
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_registration_register'),
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_registration_check_email'),
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_registration_confirm'),
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_registration_confirmed'),
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_resetting_request'),
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_resetting_send_email'),
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_resetting_check_email'),
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_resetting_reset'),
            array('bundle' => 'fosuserbundle', 'route' => 'fos_user_change_password'),
            array('bundle' => 'ccdnuseruserbundle', 'route' => 'ccdn_user_user_registration_terms'),
        );

        return $ignore;
    }
}
