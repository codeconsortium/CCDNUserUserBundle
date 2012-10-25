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

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;

/*
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class LegalController extends ContainerAware
{

    /**
     *
     * @access public
     * @return RenderResponse
     */
    public function showCopyrightNoticeAction()
    {
        return $this->container->get('templating')->renderResponse('CCDNUserUserBundle:legal:show_copyright_notice.html.' . $this->container->getParameter('fos_user.template.engine'), array());
    }

    /**
     *
     * @access public
     * @return RenderResponse
     */
    public function showDisclaimerAction()
    {
        return $this->container->get('templating')->renderResponse('CCDNUserUserBundle:legal:show_disclaimer.html.' . $this->container->getParameter('fos_user.template.engine'), array());
    }

    /**
     *
     * @access public
     * @return RenderResponse
     */
    public function showPrivacyPolicyAction()
    {
        return $this->container->get('templating')->renderResponse('CCDNUserUserBundle:legal:show_privacy_policy.html.' . $this->container->getParameter('fos_user.template.engine'), array());
    }

    /**
     *
     * @access public
     * @return RenderResponse
     */
    public function showTermsConditionsAction()
    {
        return $this->container->get('templating')->renderResponse('CCDNUserUserBundle:legal:show_terms_conditions.html.' . $this->container->getParameter('fos_user.template.engine'), array());
    }

}
