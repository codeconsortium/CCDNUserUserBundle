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

use CCDNComponent\DashboardBundle\Component\Integrator\BaseIntegrator;
use CCDNComponent\DashboardBundle\Component\Integrator\IntegratorInterface;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class DashboardIntegrator extends BaseIntegrator implements IntegratorInterface
{

    /**
     *
     * Structure of $resources
     * 	[DASHBOARD_PAGE <string>]
     * 		[CATEGORY_NAME <string>]
     *			[ROUTE_FOR_LINK <string>]
     *				[AUTH <string>] (optional)
     *				[URL_LINK <string>]
     *				[URL_NAME <string>]
	 * 
	 * @access public
	 * @return array $resources
     */
    public function getResources()
    {
        $resources = array(
            'user' => array(
                'Account' => array(
                    'ccdn_user_user_account_show' 		=> array('auth' => 'ROLE_USER', 'name' => 'My Account', 'icon' => $this->basePath . '/bundles/ccdncomponentcommon/images/icons/Black/32x32/32x32_account.png'),
                //	'ccdn_user_user_account_edit' 		=> array('auth' => 'ROLE_USER', 'name' => 'Edit My Account', 'icon' => $this->basePath . '/bundles/ccdncomponentcommon/images/icons/Black/32x32/32x32_account.png'),
					'fos_user_security_login' 			=> array('no_auth' => true, 'name' => 'Login', 'icon' => $this->basePath . '/bundles/ccdncomponentcommon/images/icons/Black/32x32/32x32_account.png'),
					'ccdn_user_user_registration_terms' => array('no_auth' => true, 'name' => 'Register', 'icon' => $this->basePath . '/bundles/ccdncomponentcommon/images/icons/Black/32x32/32x32_account.png'),
                ),
            ),

        );

        return $resources;
    }

}
