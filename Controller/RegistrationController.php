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
    public function registerAction()
    {
        // work on previous action
        $response = parent::registerAction();

        // Ensure that a redirect response was given, this means
        // the form was successfully processed, otherwise a rendered
        // response is given, meaning the form is presented awaiting
        // input or ammendments to bad form data.
        if ($response instanceof RedirectResponse) {
            $user = $this->container->get("security.context")->getToken()->getUser();

            if ( ! is_object($user) || ! $user instanceof UserInterface) {
                throw new NotFoundHttpException('the user account was not created successfully.');
            }

        //    $profile = new Profile();
        //    $profile->setUser($user);
        //
        //    $em = $this->container->get('doctrine')->getEntityManager();
        //    $em->persist($profile);
        //    $em->flush();
        //
        //    $user->setProfile($profile);
        //    $user->setRegisteredDate(new \DateTime());
        //
        //    $em->persist($user);
        //    $em->flush();
        }

        return $response;
    }

}
