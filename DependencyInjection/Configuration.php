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

namespace CCDNUser\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
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
     *
	 * @access public
	 * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder
     */
	public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ccdn_user_user');

        $rootNode
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()
                ->arrayNode('template')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->scalarNode('engine')->defaultValue('twig')->end()
                    ->end()
                ->end()
            ->end();

		// Class file namespaces.
		$this
			->addEntitySection($rootNode)
			->addRepositorySection($rootNode)
			->addFormSection($rootNode)
			->addComponentSection($rootNode)
		;
		
		// Configuration stuff.
        $this
			->addSEOSection($rootNode)
	        ->addAccountSection($rootNode)
	        ->addChangePasswordSection($rootNode)
	        ->addRegistrationSection($rootNode)
	        ->addResettingSection($rootNode)
	        ->addSecuritySection($rootNode)
	        ->addLegalSection($rootNode)
		;

        return $treeBuilder;
    }

    /**
     *
     * @access private
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNUser\UserBundle\DependencyInjection\Configuration
     */
    private function addEntitySection(ArrayNodeDefinition $node)
	{
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('entity')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
				        ->arrayNode('user')
		                    ->addDefaultsIfNotSet()
		                    ->canBeUnset()
				            ->children()
								->scalarNode('class')->defaultValue('CCDNUser\UserBundle\Entity\User')->end()
							->end()
						->end()
					->end()
				->end()
			->end()
		;
		
		return $this;
	}
	
    /**
     *
     * @access private
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNUser\UserBundle\DependencyInjection\Configuration
     */
    private function addRepositorySection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('repository')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('user')
		                    ->addDefaultsIfNotSet()
		                    ->canBeUnset()
                            ->children()
								->scalarNode('class')->defaultValue('CCDNUser\UserBundle\Repository\UserRepository')->end()							
							->end()
						->end()
					->end()
				->end()
			->end()
		;
		
		return $this;
	}
	
    /**
     *
     * @access private
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNUser\UserBundle\DependencyInjection\Configuration
     */
    private function addFormSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('form')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('type')
		                    ->addDefaultsIfNotSet()
		                    ->canBeUnset()
                            ->children()
		                        ->arrayNode('registration')
				                    ->addDefaultsIfNotSet()
				                    ->canBeUnset()
		                            ->children()
										->scalarNode('class')->defaultValue('CCDNUser\UserBundle\Form\Type\RegistrationFormType')->end()							
									->end()
								->end()
							->end()
						->end()
					->end()
				->end()
			->end()
		;
		
		return $this;
	}
	
    /**
     *
     * @access private
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNUser\UserBundle\DependencyInjection\Configuration
     */
    private function addComponentSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('component')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
		                ->arrayNode('dashboard')
		                    ->addDefaultsIfNotSet()
		                    ->canBeUnset()
		                    ->children()
				                ->arrayNode('integrator')
				                    ->addDefaultsIfNotSet()
				                    ->canBeUnset()
				                    ->children()
										->scalarNode('class')->defaultValue('CCDNUser\UserBundle\Component\Dashboard\DashboardIntegrator')->end()							
									->end()		
								->end()
							->end()
						->end()
		                ->arrayNode('route_referer_ignore')
		                    ->addDefaultsIfNotSet()
		                    ->canBeUnset()
		                    ->children()
				                ->arrayNode('list')
				                    ->addDefaultsIfNotSet()
				                    ->canBeUnset()
				                    ->children()
										->scalarNode('class')->defaultValue('CCDNUser\UserBundle\Component\RouteRefererIgnore\RouteRefererIgnoreList')->end()							
									->end()		
								->end()
							->end()
						->end()
					->end()
				->end()
			->end()
		;
		
		return $this;
	}
	
    /**
     *
     * @access protected
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNUser\UserBundle\DependencyInjection\Configuration
     */
    protected function addSEOSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()
                ->arrayNode('seo')
                ->addDefaultsIfNotSet()
                ->canBeUnset()
                    ->children()
                        ->scalarNode('title_length')->defaultValue('67')->end()
                    ->end()
                ->end()
            ->end()
		;
		
		return $this;
    }

    /**
     *
     * @access private
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNUser\UserBundle\DependencyInjection\Configuration
     */
    private function addAccountSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()
                ->arrayNode('account')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('show')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('edit')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNUserUserBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
		;
		
		return $this;
    }

    /**
     *
     * @access private
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNUser\UserBundle\DependencyInjection\Configuration
     */
    private function addChangePasswordSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()
                ->arrayNode('password')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('change_password')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNUserUserBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
		;
		
		return $this;
    }

    /**
     *
     * @access private
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNUser\UserBundle\DependencyInjection\Configuration
     */
    private function addRegistrationSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()
                ->arrayNode('registration')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('register')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNUserUserBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('check_email')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('confirmed')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
		;
		
		return $this;
    }

    /**
     *
     * @access private
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNUser\UserBundle\DependencyInjection\Configuration
     */
    private function addResettingSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()
                ->arrayNode('resetting')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('request')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('password_already_requested')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('check_email')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('reset')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNUserUserBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
		;
		
		return $this;
    }

    /**
     *
     * @access private
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNUser\UserBundle\DependencyInjection\Configuration
     */
    private function addSecuritySection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()
                ->arrayNode('security')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('login')
                            ->addDefaultsIfNotSet()
                            ->canBeUnset()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_single_column.html.twig')->end()
                                ->scalarNode('support_facebook')->defaultValue(false)->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
		;
		
		return $this;
    }

    /**
     *
     * @access private
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $node
	 * @return \CCDNUser\UserBundle\DependencyInjection\Configuration
     */
    private function addLegalSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->canBeUnset()
            ->children()
                ->arrayNode('legal')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
		                ->arrayNode('terms_conditions')
		                    ->addDefaultsIfNotSet()
		                    ->canBeUnset()
		                    ->children()
		                        ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
		                        ->scalarNode('document')->defaultValue('CCDNUserUserBundle:Legal:terms_conditions.txt.twig')->end()
							->end()
						->end()
		                ->arrayNode('copyright_notice')
		                    ->addDefaultsIfNotSet()
		                    ->canBeUnset()
		                    ->children()
		                        ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
		                        ->scalarNode('document')->defaultValue('CCDNUserUserBundle:Legal:copyright_notice.txt.twig')->end()
							->end()
						->end()
		                ->arrayNode('privacy_policy')
		                    ->addDefaultsIfNotSet()
		                    ->canBeUnset()
		                    ->children()
		                        ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
		                        ->scalarNode('document')->defaultValue('CCDNUserUserBundle:Legal:privacy_policy.txt.twig')->end()
							->end()
						->end()
		                ->arrayNode('disclaimer')
		                    ->addDefaultsIfNotSet()
		                    ->canBeUnset()
		                    ->children()
		                        ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
		                        ->scalarNode('document')->defaultValue('CCDNUserUserBundle:Legal:disclaimer.txt.twig')->end()
							->end()
						->end()
					->end()
				->end()
				->arrayNode('legal_identification')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
					->children()
						->scalarNode('company_name')->defaultValue('')->end()
						->scalarNode('show_company_name')->defaultValue(false)->end()

						->scalarNode('company_address')->defaultValue('')->end()
						->scalarNode('show_company_address')->defaultValue(false)->end()

						->scalarNode('company_registered_number')->defaultValue('')->end()
						->scalarNode('show_company_registered_number')->defaultValue(false)->end()

						->scalarNode('company_registered_house')->defaultValue('')->end()
						->scalarNode('show_company_registered_house')->defaultValue(false)->end()

						->scalarNode('copyright_year')->defaultValue('')->end()
						->scalarNode('show_copyright_year')->defaultValue(false)->end()
                    ->end()
                ->end()
            ->end()
		;
		
		return $this;
    }
}
