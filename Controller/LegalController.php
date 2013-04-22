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
class LegalController extends BaseController
{
    /**
     *
     * @access public
     * @return RenderResponse
     */
    public function showCopyrightNoticeAction()
    {
        return $this->renderResponse('CCDNUserUserBundle:legal:show_copyright_notice.html.', array());
    }

    /**
     *
     * @access public
     * @return RenderResponse
     */
    public function showDisclaimerAction()
    {
        return $this->renderResponse('CCDNUserUserBundle:legal:show_disclaimer.html.', array());
    }

    /**
     *
     * @access public
     * @return RenderResponse
     */
    public function showPrivacyPolicyAction()
    {
        return $this->renderResponse('CCDNUserUserBundle:legal:show_privacy_policy.html.', array());
    }

    /**
     *
     * @access public
     * @return RenderResponse
     */
    public function showTermsConditionsAction()
    {
        return $this->renderResponse('CCDNUserUserBundle:legal:show_terms_conditions.html.', array());
    }
}
