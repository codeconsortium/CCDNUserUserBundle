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

namespace CCDNUser\UserBundle\Service;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

/**
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
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
	protected $security;
	
	
	/**
	 *
	 * @access public
	 * @param Router $router, SecurityContext $security
	 */
	public function __construct(Router $router, SecurityContext $security)
	{
		$this->router = $router;
		$this->security = $security;
	}
	
	
	/**
	 *
	 * @access public
	 * @param Request $request, TokenInterface $token
	 * @return RedirectResponse
	 */
	public function onAuthenticationSuccess(Request $request, TokenInterface $token)
	{
		
		if ($this->security->isGranted('ROLE_SUPER_ADMIN'))
		{
			$response = new RedirectResponse($this->router->generate('cc_admin_forum_cp'));
		}
		elseif ($this->security->isGranted('ROLE_ADMIN'))
		{
			$response = new RedirectResponse($this->router->generate('cc_admin_forum_cp'));			
		}
		elseif ($this->security->isGranted('ROLE_MODERATOR'))
		{
			$response = new RedirectResponse($this->router->generate('cc_moderator_forum_cp'));
		}
		elseif ($this->security->isGranted('ROLE_USER'))
		{
			$session = $request->getSession();		
			
			if ($session->has('referer'))
			{
				$response = new RedirectResponse($session->get('referer'));
			} else {
				$response = new RedirectResponse($request->getBasePath() . '/'); // if no referer then go to homepage
			}
		}
			
		return $response;
	}
	
}