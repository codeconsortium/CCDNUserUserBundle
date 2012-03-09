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

namespace CCDNUser\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ccdn_user_user');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
		$rootNode
			->children()
				->arrayNode('user')
					->children()
						->scalarNode('profile_route')->defaultValue('cc_profile_show_by_id')->end()
					->end()
				->end()
				->arrayNode('template')
					->children()
						->scalarNode('engine')->defaultValue('twig')->end()
						->scalarNode('theme')->defaultValue('CCDNUserUserBundle:Form:fields.html.twig')->end()
					->end()
				->end()
			->end();
			
		$this->addAccountSection($rootNode);
		$this->addChangePasswordSection($rootNode);
		$this->addRegistrationSection($rootNode);
		$this->addResettingSection($rootNode);
		$this->addSecuritySection($rootNode);
		
        return $treeBuilder;
    }

	

	/**
	 *
	 * @access private
	 * @param ArrayNodeDefinition $node
	 */
	private function addAccountSection(ArrayNodeDefinition $node)
	{
		$node
			->children()
				->arrayNode('account')
					->children()
						->arrayNode('layout_templates')
							->children()
								->scalarNode('show')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
								->scalarNode('edit')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
							->end()
						->end()
					->end()
				->end()
			->end();
	}
	
	

	/**
	 *
	 * @access private
	 * @param ArrayNodeDefinition $node
	 */
	private function addChangePasswordSection(ArrayNodeDefinition $node)
	{
		$node
			->children()
				->arrayNode('password')
					->children()
						->arrayNode('layout_templates')
							->children()
								->scalarNode('change_password')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
							->end()
						->end()
					->end()
				->end()
			->end();
	}
	
	

	/**
	 *
	 * @access private
	 * @param ArrayNodeDefinition $node
	 */
	private function addRegistrationSection(ArrayNodeDefinition $node)
	{
		$node
			->children()
				->arrayNode('registration')
					->children()
						->arrayNode('layout_templates')
							->children()
								->scalarNode('check_email')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
								->scalarNode('confirmed')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
								->scalarNode('register')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
							->end()
						->end()
					->end()
				->end()
			->end();
	}
	
	

	/**
	 *
	 * @access private
	 * @param ArrayNodeDefinition $node
	 */
	private function addResettingSection(ArrayNodeDefinition $node)
	{
		$node
			->children()
				->arrayNode('resetting')
					->children()
						->arrayNode('layout_templates')
							->children()
								->scalarNode('check_email')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
								->scalarNode('password_already_requested')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
								->scalarNode('request')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
								->scalarNode('reset')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()								
							->end()
						->end()
					->end()
				->end()
			->end();
	}
	
	

	/**
	 *
	 * @access private
	 * @param ArrayNodeDefinition $node
	 */
	private function addSecuritySection(ArrayNodeDefinition $node)
	{
		$node
			->children()
				->arrayNode('security')
					->children()
						->arrayNode('layout_templates')
							->children()
								->scalarNode('login')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
							->end()
						->end()
					->end()
				->end()
			->end();
	}
}
