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
class AccountController extends BaseController
{
    /**
     *
     * @access public
     * @return RenderResponse
     */
    public function showAction()
    {
        $this->isAuthorised('ROLE_USER');

        $user = $this->getUser();

        return $this->renderResponse('CCDNUserUserBundle:Account:show.html.',
            array(
                'user' => $user,
            )
        );
    }

    /**
     *
     * @access public
     * @return RedirectResponse|RenderResponse
     */
    public function editAction()
    {
        $this->isAuthorised('ROLE_USER');

        $user = $this->getUser();

        $form = $this->container->get('fos_user.profile.form');
        $formHandler = $this->container->get('fos_user.profile.form.handler');

        $process = $formHandler->process($user);

        if ($process) {
            $this->setFlash('fos_user_success', $this->trans('ccdn_user_user.flash.account.updated'));

            return $this->redirectResponse($this->path('ccdn_user_user_account_show'));
        }

        return $this->renderResponse('FOSUserBundle:Account:edit.html.',
            array(
                'form' => $form->createView(),
            )
        );
    }
}
