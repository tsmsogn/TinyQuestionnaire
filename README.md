# TinyQuestionnaire

[![Build Status](https://travis-ci.org/tsmsogn/TinyQuestionnaire.svg?branch=master)](https://travis-ci.org/tsmsogn/TinyQuestionnaire)

## Installation

Put your app plugin directory as `TinyQuestionnaire`.

### Enable plugin

In 2.0 you need to enable the plugin your app/Config/bootstrap.php file:

```php
<?php
CakePlugin::load('TinyQuestionnaire', array('bootstrap' => false, 'routes' => true));
?>
```

Enable admin routing in app/Config/core.php file:

```php
Configure::write('Routing.prefixes', array('admin'));
```
