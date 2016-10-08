# Module Manager
Module that allows a tracked file to determine which modules are enabled/disabled.

The problem that this module solves is in managing which modules are enabled versus disabled. In Magento 1, this
was accomplished via separate `app/etc/modules/NameSpace_ModuleName.xml` files. Unfortunately in Magento 2, this is done
by an automatically generated `app/etc/config.php` file. The native issue with Magento 2 is that this file also happens
to store the (seemingly nondeterministic) sequence of modules.

If you are working as a development team in source control, tracking the `config.php` file results in unmanageable
conflicts because of the sequencing creating unreadable diffs.

This module will, essentially, replace the `config.php` file with an alphabetically sorted `modules.php` file which
can be easily tracked, as the sequencing is kept in an ignored `config.php`.

### Installation
```
composer config repositories.samtay/module-modman git git@github.com:samtay/m2-module-modman.git
composer require samtay/module-modman:1.0.0
bin/magento setup:upgrade && bin/magento cache:flush
```

### Approach
The approach here is to keep `app/etc/config.php` ignored by git, and instead track `app/etc/modules.php`, which is
simply a lexicographically sorted version of `app/etc/config.php`. This is done by use of Magento plugins placed
wherever Magento reads & writes to `config.php`.

### Development Progress
Look in the issues for new features to build or bugs to squash.
