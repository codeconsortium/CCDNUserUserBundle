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

use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\True;


/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
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
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
			))
            ->add('recaptcha', 'ewz_recaptcha', array(
                'property_path' => false,
		        'constraints'   => array(
		            new True()
		        ),
                'attr' => array(
                    'options' => array(
                        'theme' => 'clean'
					)
                ),
				'label' => ' ',
				'translation_domain' => 'CCDNUserUserBundle',
			))
		;
    }

    /**
     *
     * @access public
     * @param array $options
     */
    public function getDefaultOptions(array $options)
    {
        return array('data_class' => $this->class);
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
