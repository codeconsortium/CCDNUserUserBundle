Installing CCDNUser UserBundle.
===============================

## Installation:

Installation takes only 4 steps:

1. Download and install dependencies via Composer.
2. Register bundles with AppKernel.php.
3. Update your app/config/routing.yml.
4. Update your database schema.

### Step 1: Download and install dependencies via Composer.

Append the following to end of your applications composer.json file (found in the root of your Symfony2 installation):

``` js
// composer.json
{
    // ...
    "require": {
        // ...
        "codeconsortium/ccdn-user-bundle": "dev-master"
    }
}
```

NOTE: Please replace ``dev-master`` in the snippet above with the latest stable branch, for example ``2.0.*``.

Then, you can install the new dependencies by running Composer's ``update``
command from the directory where your ``composer.json`` file is located:

``` bash
$ php composer.phar update
```

### Step 2: Register bundles with AppKernel.php.

Now, Composer will automatically download all required files, and install them
for you. All that is left to do is to update your ``AppKernel.php`` file, and
register the new bundle:

``` php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        new FOS\UserBundle\FOSUserBundle(),
        new CCDNUser\UserBundle\CCDNUserUserBundle(),
        // ...
    );
}
```

### Step 3: Update your app/config/routing.yml.

In your app/config/routing.yml add:

``` yml
_security_check:
      pattern:  /login_check/
_security_logout:
    pattern:  /logout

CCDNUserUserBundle:
    resource: "@CCDNUserUserBundle/Resources/config/routing.yml"
    prefix: /
```

You can change the route of the standalone route to any route you like, it is included for convenience.

### Step 4: Update your database schema.

Make sure to add the UserBundle to doctrines mapping configuration:

```
# app/config/config.yml
# Doctrine Configuration
doctrine:
    orm:
        default_entity_manager: default
        auto_generate_proxy_classes: "%kernel.debug%"
        resolve_target_entities:
            Symfony\Component\Security\Core\User\UserInterface: CCDNUser\UserBundle\Entity\User
        entity_managers:
            default:
                mappings:
                    FOSUserBundle: ~
                    CCDNUserUserBundle:
                        mapping:              true
                        type:                 yml
                        dir:                  "Resources/config/doctrine"
                        alias:                ~
                        prefix:               CCDNUser\UserBundle\Entity
                        is_bundle:            true
```

From your projects root Symfony directory on the command line run:

``` bash
$ php app/console doctrine:schema:update --dump-sql
```

Take the SQL that is output and update your database manually.

**Warning:**

> Please take care when updating your database, check the output SQL before applying it.

### Translations

If you wish to use default texts provided in this bundle, you have to make sure you have translator enabled in your config.

``` yaml
# app/config/config.yml

framework:
    translator: ~
```

## Next Steps.

Installation should now be complete!

If you need further help/support, have suggestions or want to contribute please join the community at [Code Consortium](http://www.codeconsortium.com)

- [Return back to the docs index](index.md).
- [Configuration Reference](configuration_reference.md).
- [Default FOS UserBundle Reference](default_fos_configuration.md).
- [Enabling Facebook Login Support](enable_facebook_support.md).
