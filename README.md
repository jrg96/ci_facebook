# ci_facebook

Code Igniter Facebook Login implementation
-----

This is a simple Codeigniter 3.x Facebook PHP SDK 4 implementation

Configuration
------

1. copy the facebook folder of this repository to your Codeigniter's libraries folder (application/libraries)

2. add the following code to application/config/config.php

```php
$config['facebook']['api_id'] = 'APP_ID';
$config['facebook']['app_secret'] = 'APP_SECRET';
$config['facebook']['redirect_url'] = 'REDIRECT_URL';
$config['facebook']['permissions'] = 'public_profile, email, publish_actions';
```

3. maybe you will experience some issues about sessions, so be sure you have loaded the session library

a) autoload the session library (application/config/autoload.php)

```php
$autoload['drivers'] = array('session');
```

b) load the library on controller method

```php
$this->load->library('session');
```

4. to autoload the facebook library use the following code (application/config/autoload.php)

```php
$autoload['libraries'] = array('facebook/facebook');
```