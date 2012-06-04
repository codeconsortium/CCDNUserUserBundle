
``` yml
fos_user:
   db_driver:      orm
   firewall_name:  main
   user_class:     CCDNUser\UserBundle\Entity\User
   use_listener:   true
#    from_email:     { webmaster@example.com: Admin }
   profile:
       form:
#            type:               FOS\UserBundle\Form\ProfileFormType
#            handler:            FOS\UserBundle\Form\ProfileFormHandler
           name:               fos_user_profile_form
           validation_groups:  [Profile]
   change_password:
       form:
#            type:               FOS\UserBundle\Form\ChangePasswordFormType
#            handler:            FOS\UserBundle\Form\ChangePasswordFormHandler
#            name:               fos_user_change_password_form
#            validation_groups:  [ChangePassword]
   registration:
#        confirmation:
#            from_email: ~
#            enabled:    false
#            template:   FOSUserBundle:Registration:email.txt.twig
        form:
            type:               ccdn_user_registration
#            handler:            FOS\UserBundle\Form\RegistrationFormHandler
#            name:               fos_user_registration_form
#            validation_groups:  [Registration]
   resetting:
       token_ttl: 86400
#        email:
#            from_email: ~
#            template:   FOSUserBundle:Resetting:email.txt.twig
#        form:
#            type:               FOS\UserBundle\Form\ResettingFormType
#            handler:            FOS\UserBundle\Form\ResettingFormHandler
#            name:               fos_user_resetting_form
#            validation_groups:  [ResetPassword]
   service:
#        mailer:                 fos_user.util.mailer.default
 #      email_canonicalizer:    fos_user.util.email_canonicalizer.default
 #      username_canonicalizer: fos_user.util.username_canonicalizer.default
       user_manager:           fos_user.user_manager.default
#    encoder:
#        algorithm:          sha512
#        encode_as_base64:   false
#        iterations:         1
   template:
       engine: twig
       theme:  CCDNUserUserBundle:Form:fields.html.twig
#    group:
#        group_class:    ~ # Required when using groups
#        form:
#            type:               FOS\UserBundle\Form\GroupFormType
#            handler:            FOS\UserBundle\Form\GroupHandler
#            name:               fos_user_group_form
#            validation_groups:  [Registration]

```

- [Return back to the docs index](index.md).
