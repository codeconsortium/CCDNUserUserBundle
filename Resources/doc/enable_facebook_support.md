Enable Facebook Support.
========================

### Step 1: Update your app/config/routing.yml. 

In your app/config/routing.yml add:  

``` yml
_facebook_login_check:
      pattern:  /login_check/facebook
```

### Step 2: Update your app/config/config.yml. 

In your app/config/config.yml add:    

``` yml
#
# for CCDNUser UserBundle   
#
ccdn_user_user:
    security:
        support_facebook: true
```

### Step 3: Warmup the cache.

From your projects root Symfony directory on the command line run:

``` bash
$ php app/console cache:warmup
```

Change the layout template you wish to use for each page by changing the configs under the labelled section 'layout_templates'.

## Next Steps.

- [Return back to the docs index](index.md).