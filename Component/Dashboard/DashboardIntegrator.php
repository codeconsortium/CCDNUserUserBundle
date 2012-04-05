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
	 *
	 * Structure of $resources
	 * 	[DASHBOARD_PAGE String]
	 * 		[CATEGORY_NAME String]
	 *			[ROUTE_FOR_LINK String]
	 *				[AUTH String]
	 *				[URL_LINK String]
	 *				[URL_NAME String]
	 */
	public function getResources()
	{
		$resources = array(
			'user' => array(
				'Account' => array(
					'cc_user_account_show' => array('auth' => 'ROLE_USER', 'name' => 'My Account', 'icon' => $this->basePath . '/bundles/ccdncomponentcommon/images/icons/Black/32x32/32x32_account.png'),
					'cc_user_account_edit' => array('auth' => 'ROLE_USER', 'name' => 'Edit My Account', 'icon' => $this->basePath . '/bundles/ccdncomponentcommon/images/icons/Black/32x32/32x32_account.png'),				
				),
			),

		);
		
		return $resources;
	}
	
}

