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

namespace CCDNUser\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

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
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }


	/**
	 *
	 * @access public
	 * @param FormBuilder $builder, Array() $options
	 */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email', 'email')
            ->add('plainPassword', 'repeated', array('type' => 'password'))
			->add('recaptcha', 'ewz_recaptcha', array(
				'property_path' => false,
				'attr' => array(
					'options' => array(
						'theme' => 'clean')
				),
			));
    }


	/**
	 *
	 * for creating and replying to topics
	 *
	 * @access public
	 * @param Array() $options
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
        return 'fos_user_registration';
    }

}
