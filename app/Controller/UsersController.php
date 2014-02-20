<?php  session_start();
// app/Controller/UsersController.php
class UsersController extends AppController {

    public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
		//$this->Auth->allow('add', 'logout');
		//$this->Auth->allow('*');
	}

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
		$this->set('title_for_layout', 'Home');
		//$this->layout = 'userhome';
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
		
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
		 $this->layout = 'registration';
    }
	public function register() {
		//$identifier = $this->Session->read('identifier');
		//pr($identifier);
		//pr($_SESSION['userdata']);
		
		//$userprofile=unserialize($userprofile);
		//pr($_SESSION);
		//pr($_SESSION['userprofile']['data']->identifier);
		//pr($userprofile);
		//pr(unserialize($userprofile));
		//$this->set( 'identifier',  $identifier );
		//$provider = $this->Session->read('provider');
		//pr($provider);
		$this->set( 'provider',  $provider );
		
        if ($this->request->is('post')) {
			debug($this->request->data);
			debug($this->request->data['Matrimonial']);
			/*$this->Matrimonial->create();
            if ($this->Matrimonial->save($this->request->data['Matrimonial'])) {
                $this->Session->setFlash(__('The user has been saved'));
                //return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );*/
            
			/*$this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );*/
			
        }
		 $this->set('title_for_layout', 'User Registration');
		 $this->layout = 'registration';
    }
	public function mobile_varifaction(){
		
	}

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
		
		
	// If it is a post request we can assume this is a local login request
    if ($this->request->isPost()){
        if ($this->Auth->login()){
            $this->redirect($this->Auth->redirectUrl());
        } else {
            $this->Session->setFlash(__('Invalid Username or password. Try again.'));
        }
    } 
    }
	public function loginwith($provider) {
		 $this->set('title_for_layout', 'User Registration with '.$provider);
		 $this->layout = 'registration';
        //$this->autoRender = false;
        require_once( WWW_ROOT . 'hybridauth/Hybrid/Auth.php' );

           $hybridauth_config = array(
            //"base_url" => 'http://' . $_SERVER['HTTP_HOST'] . $this->base . "/hybridauth/", // set hybridauth path
           "base_url" => "http://vervelogicshowcase.com/app/webroot/hybridauth/index.php", 
           "providers" => array ( 
				"Google" => array ( 
					"enabled" => true,
					"keys"    => array ( "id" => "21464671464-memi0sen7p1554q2o2gm2b2euj9kudsm.apps.googleusercontent.com", "secret" => "UGjMmby438rNr2JtrY5H_axI" ),
					"scope"   => "https://www.googleapis.com/auth/userinfo.profile ". // optional
                               "https://www.googleapis.com/auth/userinfo.email"   , // optional
					"access_type"     => "online",   // optional
                    "approval_prompt" => "force",     // optional 
					"hd" => "vervelogicshowcase.com",
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
           //pr( $hybridauth_config);
		   $hybridauth = new Hybrid_Auth($hybridauth_config);

            // try to authenticate the selected $provider
            $adapter = $hybridauth->authenticate($provider);
			 //debug(Router::getParams());

            // grab the user profile
            $user_profile = $adapter->getUserProfile();
			//echo "Hi there! " . $user_profile->displayName;
			//pr($user_profile);
        try {
            // create an instance for Hybridauth with the configuration file path as parameter
            $hybridauth = new Hybrid_Auth($hybridauth_config);

            // try to authenticate the selected $provider
            $adapter = $hybridauth->authenticate($provider);
			 //debug(Router::getParams());

            // grab the user profile
            $user_profile = $adapter->getUserProfile();
			//$user_profile=serialize($user_profile);
			//echo "Hi there! " . $user_profile->displayName;
			 //pr($user_profile);
		    //Debugger::dump($user_profile);
            //debug($user_profile); //uncomment this to print the object
//exit();
            
			$this->set( 'user_profile',  $user_profile );
			$this->set( 'provider',  $provider );
			
			///$user_profile[]=$user_profile;
			/*if (!empty($user_profile)) {
			   $_SESSION['userdata']=serialize($user_profile);
			}*/
			//$this->Session->write('identifier',$user_profile );
			//$this->Session->write('provider', $provider);
			
			
           
            //login user using auth component
            if (!empty($user_profile)) {
                $user = $this->_findOrCreateUser($user_profile, $provider); 
				//print_r($user);
				// optional function if you combine with Auth component
                unset($user['password']);
                $this->request->data['User'] = $user;
                if ($this->Auth->login($this->request->data['User'])) {
                    $this->redirect($this->Auth->redirect());
                    $this->Session->setFlash('You are successfully logged in');
                } else {
                    $this->Session->setFlash('Failed to login');
                }
				return $this->redirect(array('action' => 'register'));
            }
			//return $this->redirect(array('action' => 'register'));
        } catch (Exception $e) {
            // Display the recived error
			$error ='';
            switch ($e->getCode()) {
                case 0 : $error = "Unspecified error.";
                    break;
                case 1 : $error = "Hybriauth configuration error.";
                    break;
                case 2 : $error = "Provider not properly configured.";
                    break;
                case 3 : $error = "Unknown or disabled provider.";
                    break;
                case 4 : $error = "Missing provider application credentials.";
                    break;
                case 5 : $error = "Authentification failed. The user has canceled the authentication or the provider refused the connection.";
                    break;
                case 6 : $error = "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.";
                    $adapter->logout();
                    break;
                case 7 : $error = "User not connected to the provider.";
                    $adapter->logout();
                    break;
            }

            // well, basically you should not display this to the end user, just give him a hint and move on..
            $error .= "Original error message: " . $e->getMessage();
            $error .= "Trace: " . $e->getTraceAsString();
            $this->set('error', $error);
        }
		
    }


// this is optional function to create user if not already in database. you can do anything with your hybridauth object
private function _findOrCreateUser($user_profile = array(), $provider=null) {
        if (!empty($user_profile)) {
            $user = $this->User->find('first', array('conditions' => array(
                'OR'=>array('User.username' => $user_profile->identifier, 'User.email_address'=>$user_profile->email))));
            if (!$user) {
                $this->User->create();
                $this->User->set(array(
                    'group_id' => 2,
                    // 'first_name' => $user_profile->firstName,
                    // 'last_name' => $user_profile->lastName,
                    'email_address' => $user_profile->email,
                    'username' => $user_profile->identifier,
                   // 'password' => AuthComponent::password($user_profile->identifier), //in case you need to save password to database
                    //'country' => $user_profile->country,
                    //'city' => $user_profile->city,
                    //'address' => $user_profile->address,
                    //add another fields you want
                ));
                if ($this->User->save()) {
                    $this->User->recursive = -1;
                    $user = $this->User->read(null, $this->User->getLastInsertId());
                    return $user['User'];
                }
            } else {
                return $user['User'];
            }
        }
    }
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
}?>