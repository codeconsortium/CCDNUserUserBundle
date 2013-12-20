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

use CCDNUser\UserBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;

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
class RegistrationController extends BaseController
{
    /**
     *
     * @access public
     * @return RedirectResponse|RenderResponse
     */
    public function registerTermsAction()
    {
        $request = $this->getRequest();

        if ($request->request->get('accept_terms')) {
            $this->container->get('session')->set('accepted_terms', true);

            return $this->redirectResponse($this->path('fos_user_registration_register'));
        }

        // Warn user they must accept terms if this is second or more attempt.
        if ($request->getMethod() == 'POST') {
            $this->setFlash('warning', $this->trans('ccdn_user_user.flash.registration.terms.must_accept'));
        }

        return $this->renderResponse('CCDNUserUserBundle:Registration:terms.html.');
    }

    /**
     *
     * @access public
     * @param  \Symfony\Component\HttpFoundation\Request $request
     * @return RedirectResponse|RenderResponse
     */
    public function registerAction(Request $request)
    {
        $session = $this->container->get('session');

        if ($this->isGranted('ROLE_USER')) {
               $this->setFlash('warning', $this->trans('ccdn_user_user.flash.registration.cannot_be_logged_in'));

               return $this->redirectResponse($this->path('ccdn_user_user_account_show'));
        }

        if ($session->has('accepted_terms')) {
            if ($session->get('accepted_terms')) {
                return parent::registerAction($request);
            } else {
                return $this->redirectResponse($this->path('ccdn_user_user_registration_terms'));
            }
        }

        return $this->redirectResponse($this->path('ccdn_user_user_registration_terms'));
    }
}
