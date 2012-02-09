<?php

/*
 * This file is part of the CCDN RefererBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/> 
 * 
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNUser\UserBundle\Listener;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class RefererListener
{


	/**
	 *
	 * @access protected
	 */
	protected $router;

	
	/**
	 *
	 * @access protected
	 */
	protected $container;


	/**
	 *
	 * @access public
	 * @param $router, $container
	 */
	public function __construct($router, $container)
	{
		$this->router = $router;
		$this->container = $container;
	}


	/**
	 *
	 * @access public
	 * @param GetResponseEvent $event
	 */
    public function onKernelRequest(GetResponseEvent $event)
    {
	
	    if ($event->getRequestType() !== \Symfony\Component\HttpKernel\HttpKernel::MASTER_REQUEST) {
            return;
        }

		$request = $event->getRequest();
		$route = $request->get('_route');
		
		if ($route != 'fos_user_security_login'
		&& $route != 'fos_user_security_check'
		&& $route != 'fos_user_security_logout'
		&& $route[0] != '_') // last one checks incase of some of SF2 internal routes
		{
			$session = $request->getSession();		
			$session->set('referer', $request->getBasePath() . $request->getPathInfo());			
		}
    }

}