<?php
session_start();

class HaexampleController extends AppController {
	public function index() { 
	} 
	
	public function authenticatewith( $provider ) {   
		require_once( WWW_ROOT . 'hybridauth/Hybrid/Auth.php' );

		$hybridauth_config = array(
			//"base_url" => 'http://'.$_SERVER['HTTP_HOST'].$this->base . "/hybridauth/", // well watev, set yours
			
			"base_url" => "http://vervelogicshowcase.com/hybridauth/index.php", // well watev, set yours

			"providers" => array ( 
				"Google" => array ( 
					"enabled" => true,
					"keys"    => array ( "id" => "AIzaSyBLwBh9TI7YybizK6Tuz9TFlLS7oej2cYg", "secret" => "ogidGpQy5NeOQ52WRRv54VSs" ),
					"scope"           => "https://www.googleapis.com/auth/userinfo.profile "."https://www.googleapis.com/auth/userinfo.email"    // optional
				),

				"Facebook" => array (
					"enabled" => true,
					"keys"    => array ( "id" => "1523278297898087", "secret" => "a9c9925fadeeaad499fc9b1ac84c26b6" ),
					"scope"   => 'email', 
				),

				"Twitter" => array ( 
					"enabled" => true,
					"keys"    => array ( "key" => "3Kxv9oP04rXfiQY0H4Rsbw", "secret" => "V7jLWd6oPghgDTJE3A51VxHsabg3jDfyRV9c2CBk4w" ) 
				),
				"LinkedIn" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "75whb1nxfs4pf7", "secret" => "JSJIce3MelV5HKpp" ) 
			),
			)
		); 

		try{
		// create an instance for Hybridauth with the configuration file path as parameter
			$hybridauth = new Hybrid_Auth( $hybridauth_config );

		// try to authenticate the selected $provider
			$adapter = $hybridauth->authenticate( $provider );

		// grab the user profile
			$user_profile = $adapter->getUserProfile();
			
			$this->set( 'user_profile',  $user_profile );
		}
		catch( Exception $e ){
			// Display the recived error
			switch( $e->getCode() ){ 
				case 0 : $error = "Unspecified error."; break;
				case 1 : $error = "Hybriauth configuration error."; break;
				case 2 : $error = "Provider not properly configured."; break;
				case 3 : $error = "Unknown or disabled provider."; break;
				case 4 : $error = "Missing provider application credentials."; break;
				case 5 : $error = "Authentification failed. The user has canceled the authentication or the provider refused the connection."; break;
				case 6 : $error = "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again."; 
					     $adapter->logout(); 
					     break;
				case 7 : $error = "User not connected to the provider."; 
					     $adapter->logout(); 
					     break;
			} 

			// well, basically your should not display this to the end user, just give him a hint and move on..
			$error .= "<br /><br /><b>Original error message:</b> " . $e->getMessage(); 
			$error .= "<hr /><pre>Trace:<br />" . $e->getTraceAsString() . "</pre>";  

			$this->set( 'error',  $error );
		}
	} 
}
