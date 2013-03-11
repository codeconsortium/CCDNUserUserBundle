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

namespace CCDNUser\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use FOS\UserBundle\Model\UserInterface;

use CCDNUser\ProfileBundle\Entity\Profile;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class RegistrationController extends BaseController
{

	/**
	 *
	 * @access public
	 * @return RedirectResponse|RenderResponse
	 */
	public function registerTermsAction()
	{
		
		$request = $this->container->get('request');
		
		if ($request->request->get('accept_terms'))
		{
			$this->container->get('session')->set('accepted_terms', true);
			
            return new RedirectResponse($this->container->get('router')->generate('fos_user_registration_register'));
		} else {
			
			// Warn user they must accept terms if this is second or more attempt.
			if ($request->getMethod() == 'POST')
			{
	            $this->container->get('session')->setFlash('warning', $this->container->get('translator')->trans('ccdn_user_user.flash.registration.terms.must_accept', array(), 'CCDNUserUserBundle'));
			}
			
			$crumbs = $this->container->get('ccdn_component_crumb.trail');

	        return $this->container->get('templating')->renderResponse('CCDNUserUserBundle:Registration:terms.html.' . $this->getEngine(), array(
	            'crumbs' => $crumbs,
	        ));	

		}		
	}
	
	
	/**
	 *
	 * @access public
	 * @return RedirectResponse|RenderResponse
	 */
    public function registerAction()
    {
		$session = $this->container->get('session');

		if ($this->container->get('security.context')->isGranted('ROLE_USER'))
		{
       		$this->container->get('session')->setFlash('warning', $this->container->get('translator')->trans('ccdn_user_user.flash.registration.cannot_be_logged_in', array(), 'CCDNUserUserBundle'));

       		return new RedirectResponse($this->container->get('router')->generate('ccdn_user_user_account_show'));
		}
						
		if ($session->has('accepted_terms'))
		{
			if ($session->get('accepted_terms')) 
			{
        		return parent::registerAction();
			} else {
            	return new RedirectResponse($this->container->get('router')->generate('ccdn_user_user_registration_terms'));
			}
		} else {
           	return new RedirectResponse($this->container->get('router')->generate('ccdn_user_user_registration_terms'));
		}
    }

	
    /**
     *
     * @access protected
     * @return string
     */
    protected function getEngine()
    {
        return $this->container->getParameter('ccdn_user_user.template.engine');
    }

}
