<?php
    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }
    
    if (!defined('BASEPATH')){
        exit('No direct script access allowed');
    }
    
    // Autoload Facebook library
    require_once(APPPATH . 'libraries/facebook/autoload.php');
    
    use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
    
    class Facebook {
        var $ci;
        var $helper;
        var $session;
        var $permissions;
    
        public function __construct(){
            $this->ci =& get_instance();
            $this->permissions = $this->ci->config->item('permissions', 'facebook');
            
            
            FacebookSession::setDefaultApplication($this->ci->config->item('api_id', 'facebook'), 
                $this->ci->config->item('app_secret', 'facebook'));
            
            $this->helper = new FacebookRedirectLoginHelper($this->ci->config->item('redirect_url', 'facebook'));
            $this->session = $this->helper->getSessionFromRedirect();
            
            if ($this->session){
                $this->ci->session->set_userdata('fb_token', $this->session->getToken());
            } else{
                if ($this->ci->session->userdata('fb_token')){
                    $this->session = new FacebookSession($this->ci->session->userdata('fb_token'));
                    
                    try{
                        $this->session->validate($this->ci->config->item('api_id', 'facebook'), 
                            $this->ci->config->item('app_secret', 'facebook'));
                    }catch(FacebookAuthorizationException $e){
                        echo $e->getMessage();
                    }
                }
            }
        }
        
        public function getSession(){
            return $this->session;
        }
        
        public function getFBLink(){
            return $this->helper->getLoginUrl(array('scope' => $this->permissions));
        }
    }
?>