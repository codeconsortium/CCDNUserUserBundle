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

namespace CCDNUser\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\True;

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
class RegistrationFormType extends AbstractType
{
    /**
     *
     * @access private
     */
    private $class;

    /**
     *
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     *
     * @access public
     * @param FormBuilder $builder, array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null,
                array(
                    'label' => 'form.label.username',
                    'translation_domain' => 'CCDNUserUserBundle'
                )
            )
            ->add('email', 'email',
                array(
                    'label' => 'form.label.email',
                    'translation_domain' => 'CCDNUserUserBundle'
                )
            )
            ->add('plainPassword', 'repeated',
                array(
                    'type' => 'password',
                    'options' => array('translation_domain' => 'CCDNUserUserBundle'),
                    'first_options' => array('label' => 'form.label.password'),
                    'second_options' => array('label' => 'form.label.password_verify'),
                    'invalid_message' => 'fos_user.password.mismatch',
                )
            )
            ->add('recaptcha', 'ewz_recaptcha',
                array(
                    'label'              => 'form.label.recaptcha',
                    'translation_domain' => 'CCDNUserUserBundle',
                    'mapped'             => false,
                    'constraints'        => array(
                        new True()
                    ),
                    'attr'               => array(
                        'options' => array(
                            'theme' => 'white'
                        )
                    ),
                )
            )
        ;
    }

	/**
	 * 
	 * @access public
	 * @param  \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
	 */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
	    $resolver->setDefaults(array(
			'data_class' => $this->class
		));
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'ccdn_user_registration';
    }
}
