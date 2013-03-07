CCDNUser UserBundle Configuration Reference.
============================================

All available configuration options are listed below with their default values.

``` yml
#
# for CCDNUser UserBundle   
#
ccdn_user_user:
    template:
        engine:               twig
    seo:
        title_length:         67
    account:
        show:
            layout_template:      CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
        edit:
            layout_template:      CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            form_theme:           CCDNUserUserBundle:Form:fields.html.twig
    password:
        change_password:
            layout_template:      CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            form_theme:           CCDNUserUserBundle:Form:fields.html.twig
    registration:
        register:
            layout_template:      CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            form_theme:           CCDNUserUserBundle:Form:fields.html.twig
        check_email:
            layout_template:      CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
        confirmed:
            layout_template:      CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
    resetting:
        request:
            layout_template:      CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
        password_already_requested:
            layout_template:      CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
        check_email:
            layout_template:      CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
        reset:
            layout_template:      CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            form_theme:           CCDNUserUserBundle:Form:fields.html.twig
    security:
        login:
            layout_template:      CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            support_facebook:     false
    legal_documents:
        terms_conditions:     CCDNUserUserBundle:Legal:terms_conditions.txt.twig
        copyright_notice:     CCDNUserUserBundle:Legal:copyright_notice.txt.twig
        privacy_policy:       CCDNUserUserBundle:Legal:privacy_policy.txt.twig
        disclaimer:           CCDNUserUserBundle:Legal:disclaimer.txt.twig
    legal_identification:
        company_name:
        show_company_name:    false
        company_address:
        show_company_address:  false
        company_registered_number:
        show_company_registered_number:  false
        company_registered_house:
        show_company_registered_house:  false
        copyright_year:
        show_copyright_year:  false

```

- [Return back to the docs index](index.md).
