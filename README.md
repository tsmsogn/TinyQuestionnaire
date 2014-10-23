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
<?php
Configure::write('Routing.prefixes', array('admin'));
?>
```

### Usage

#### Checkbox

value:

```
0|1
```

input type:

```
checkbox
```

#### Radio

value:

```
2
```

input type:

```
radio
```

options:

```
{"1":"aaa","2":"bbb","3":"ccc"}
```

#### Select

value:

```
2
```

input type:

```
multiple
```

options: 

```
{"1":"aaa","2":"bbb","3":"ccc"}
```

attributes:

```
{"multiple":false}
```

#### Multiple Select

value:

```
2
```

input type:

```
multiple
```

options: 

```
{"1":"aaa","2":"bbb","3":"ccc"}
```

#### text

input type:

```
text
```

#### textarae

input type:

```
textarea
```