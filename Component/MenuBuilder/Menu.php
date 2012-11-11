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

namespace CCDNUser\UserBundle\Component\MenuBuilder;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class Menu
{

    /**
     *      
	 * @access public
	 * @return array
     */
    public function buildMenu($builder)
    {
	
		$builder
			->arrayNode('layout')
				->arrayNode('header')
					->arrayNode('bottom')
						->linkNode('ccdn_user_user.layout.header.login', 'fos_user_security_login', array(
							'no_auth_only' => true,
							'label_trans_bundle' => 'CCDNUserUserBundle',
							'style' => 'vertical-align:middle;margin-left:30px;',
							'class' => 'btn',
						))->end()
						->buttonDropDownNode('accout_dropdown', array(
							'auth' => 'ROLE_USER',
							'div_class' => 'btn-group',
							'div_style' => 'vertical-align:middle;margin-left:30px;border:0px;',
							'button_link' => '#',
							'button_label_trans' => 'Me haha ',
							'button_label_trans_params' => array(),
							'button_label_trans_bundle' => 'CCDNUserUserBundle',
							'button_class' => 'btn dropdown-toggle',
							'button_style' => '',
							'button_data_attributes' => array(
								'toggle' => 'dropdown',
							),
							'list_class' => 'dropdown-menu pull-right',
							'list_style' => 'z-index:20;margin-top:5px;',
							'list_data_attribtues' => array(
							),
						))
							->linkNode('ccdn_user_user.layout.header.account', 'ccdn_user_user_account_show', array(
								'auth' => 'ROLE_USER',
								'label_trans_bundle' => 'CCDNUserUserBundle',
								'rel' => 'nofollow',
							))->end()
							->dividerNode('sep1')->end()
							->linkNode('ccdn_user_user.layout.header.logout', 'fos_user_security_logout', array(
								'auth' => 'ROLE_USER',
								'label_trans_bundle' => 'CCDNUserUserBundle',
								'rel' => 'nofollow',
							))->end()
						->end()
					->end()
				->end()
				->arrayNode('footer')
					->arrayNode('tools')
						->htmlNode('tools_header', '<div class="footer_block"><h6>Tools</h6>')->end()
						->unorderedListNode('tools')
							->linkNode('ccdn_user_user.layout.header.login', 'fos_user_security_login', array(
								'no_auth_only' => true,
								'label_trans_bundle' => 'CCDNUserUserBundle',
							))->end()
							->linkNode('ccdn_user_user.link.register', 'ccdn_user_user_registration_terms', array(
								'no_auth_only' => true,
								'label_trans_bundle' => 'CCDNUserUserBundle',
							))->end()
							->linkNode('ccdn_user_user.layout.header.logout', 'fos_user_security_logout', array(
									'auth' => 'ROLE_USER',
									'label_trans_bundle' => 'CCDNUserUserBundle',
									'rel' => 'nofollow',
							))->end()
						->end()
						->htmlNode('tools_footer', '</div>')->end()
					->end()
					->arrayNode('legal')
						->htmlNode('legal_header', '<div class="footer_block"><h6>Legal</h6>')->end()
						->unorderedListNode('legal')
							->linkNode('ccdn_user_user.link.legal.copyright_notice', 'ccdn_user_user_legal_copyright_notice', array(
								'label_trans_bundle' => 'CCDNUserUserBundle',
							))->end()
							->linkNode('ccdn_user_user.link.legal.disclaimer', 'ccdn_user_user_legal_disclaimer', array(
								'label_trans_bundle' => 'CCDNUserUserBundle',
							))->end()
							->linkNode('ccdn_user_user.link.legal.privacy_policy', 'ccdn_user_user_legal_privacy_policy', array(
								'label_trans_bundle' => 'CCDNUserUserBundle',
							))->end()
							->linkNode('ccdn_user_user.link.legal.terms_conditions', 'ccdn_user_user_legal_terms_conditions', array(
								'label_trans_bundle' => 'CCDNUserUserBundle',
							))->end()
						->end()
						->htmlNode('legal_footer', '</div>')->end()
					->end()
				->end()
			->end();
    }

}
