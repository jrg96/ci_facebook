# ci_facebook
Code Igniter Facebook Login implementation

This is a simple Codeigniter 3.x Facebook PHP SDK 4 implementation

Just copy the facebook folder of this repository to your Codeigniter's libraries folder (application/libraries)

and add to your config.php file the following variables (application/config/config.php)

$config['facebook']['api_id'] = 'APP_ID';
$config['facebook']['app_secret'] = 'APP_SECRET';
$config['facebook']['redirect_url'] = 'REDIRECT_URL';
$config['facebook']['permissions'] = 'public_profile, email, publish_actions';
