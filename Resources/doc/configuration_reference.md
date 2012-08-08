CCDNUser UserBundle Configuration Reference.
============================================

All available configuration options are listed below with their default values.

``` yml
#
# for CCDNUser UserBundle   
#
ccdn_user_user:
    user:
        profile_route: ccdn_user_profile_show_by_id 
    template:
        engine: twig
    account:
        show:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig     
        edit:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            form_theme: CCDNUserUserBundle:Form:fields.html.twig
    password:
        change_password:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            form_theme: CCDNUserUserBundle:Form:fields.html.twig
    registration:
        register:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            form_theme: CCDNUserUserBundle:Form:fields.html.twig
        check_email:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
        confirmed:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
    resetting:
        request:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
        password_already_requested:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
        check_email:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
        reset:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            form_theme: CCDNUserUserBundle:Form:fields.html.twig
    security:
        login:
            layout_template: CCDNComponentCommonBundle:Layout:layout_body_right.html.twig
            support_facebook: false
    sidebar:
        members_route: ccdn_user_member_index
        profile_route: ccdn_user_profile_show

```

- [Return back to the docs index](index.md).
