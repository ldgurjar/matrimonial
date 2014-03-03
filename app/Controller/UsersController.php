<?php  session_start();
// app/Controller/UsersController.php
//App::uses('CakeEmail', 'Network/Email');
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController {
    //var $helpers = array('Html', 'Form', 'JqueryValidation');
	public $components = array('Twilio.Twilio');
    public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
		//$this->Auth->allow('add', 'logout');
		//$this->Auth->allow('*');
	}

    public function index() {
		$this->set('title_for_layout', 'Home');
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
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
		 
		 $this->loadModel('Country');
		 $this->set('countries',$this->Country->find('list', array(
        'fields' => array('Country.id', 'Country.country_name_en_us'))));
		
		 $this->loadModel('State');
		 $this->set('states',$this->State->find('list', array(
        'fields' => array('State.id', 'State.state_name'),'conditions' => array('State.scid =' => '103'))));
		
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
		try{
            // create an instance for Hybridauth with the configuration file path as parameter
            $hybridauth = new Hybrid_Auth($hybridauth_config);
            // try to authenticate the selected $provider
            $adapter = $hybridauth->authenticate($provider);
			// grab the user profile
            $user_profile = $adapter->getUserProfile();
			//debug($user_profile); //uncomment this to print the object
            //exit();
            //login user using auth component
            if (!empty($user_profile)) {
                //$user = $this->_findOrCreateUser($user_profile, $provider);
				$this->set( 'provider',  $provider );
				
				$userexist = $this->User->find('first', array('conditions' => array(
                'OR'=>array('User.username' => $user_profile->identifier, 'User.email_address'=>$user_profile->email))));
				//echo $userexist['User']['id'];
				if(!empty($userexist)){
					$this->set( 'user_exist',  $userexist);
					if($this->request->is('post')){
						if($this->request->data['User']['confirm']=='no'){
							$adapter->logout();
							$this->redirect(array('controller' => 'users','action' => 'login'));
						}else if($this->request->data['User']['confirm']=='yes'){
						    
							$this->Session->write('user.uid',$this->request->data['User']['id'] );           $this->redirect(array('controller' => 'users','action' => 'profile'));
						}
					}
				}else{
					$this->Session->write('provider', $provider );
					$this->set('user_profile',  $user_profile );
				}
				
				//$this->Session->write('user.uid',$this->User->id );
			}
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
	
	public function register() {
		if ($this->request->is('post')) {
			$this->set('title_for_layout', 'User Registration');
		    $this->layout = 'registration';
			//debug($this->request->data);
		 
					 // Creating New state if this is not found in database(other than india)
					 if($this->request->data['Country']['field']!='103'){  
						$this->loadModel('State');
						$state=$this->State->findByStateName($this->request->data['State']['field']);    
						if(empty($state)){
							$this->State->create();
							$this->State->set(array(
								'state_name' => $this->request->data['State']['field'],                       'state_code' =>'',
								'lang_code2'=>'',
								'scid' => $this->request->data['Country']['field']
							));
							$this->State->save();
						    $StateId = $this->State->id;
						}
					  }else{
						    $StateId=$this->request->data['State']['field'];
					  }
					  
					  $this->loadModel('City');
					  $city=$this->City->findByCityName ($this->request->data['Matrimonial']['city']);
					  if(empty($city)){
						  $this->City->create();
							$this->City->set(array(
								'city_name' => $this->request->data['Matrimonial']['city'],                      'city_std_code' =>'',
								'state_primary_key' => $StateId
							));
							$this->City->save();
						    $CityId = $this->City->id;
					  }else{
						  $CityId = $city['City']['id'];
					  }
					  //echo $StateId;
					  //echo $CityId;
					  //print_r($city);
					  
					
					/*if ($this->Matrimonial->validates(array('fieldList' => array('first_name', 'last_name','email_address','caste')))) {
						// it validated logic
						echo 'right';
					} else {
						// didn't validate logic
						$errors = $this->Matrimonial->invalidFields();
						print_r($errors);
					}*/

              $user1 = $this->User->find('list', array('fields' => array('User.id', 'User.username', 'User.email_address'),'conditions' => array('User.username' => $this->request->data['User']['username'], 'User.email_address'=>$this->request->data['Matrimonial']['email_address'])));
			  //print_r($user1);
			if(!empty($user1)){
				 //$this->Session->setFlash(__('This user is already Exist.'));
				 $this->redirect(array('controller' => 'users','action' => 'profile'));
			}else{
				$this->User->create();
				$this->request->data['User']['email_address']=$this->request->data['Matrimonial']['email_address'];
				$user = $this->User->save($this->request->data['User']);
				
             if (!empty($user)) {
			 
				  $this->request->data['Matrimonial']['user_id'] = $this->User->id;                  $this->request->data['Matrimonial']['city_primary_key'] = $CityId;          
				  $this->request->data['Matrimonial']['state_primary_key'] = $StateId;
				  $this->request->data['Matrimonial']['country_primary_key'] = $this->request->data['Country']['field'];
			      /********************************************************/
				  // Code for Image saving In databse 
				  if(!empty($this->data['Matrimonial']['profile_image']['name'])){
					$dir = WWW_ROOT.'img/upload';
					$slas= '\\';                    
					$filenamez= $this->data['Matrimonial']['profile_image']['name'];
					$dir=$dir.$slas.$filenamez;
					//echo $dir;
					@move_uploaded_file($this->data['Matrimonial']['profile_image']['tmp_name'],$dir);
				   $imagepath=BASE_URL.'img/upload/'.$this->data['Matrimonial']['profile_image']['name'];  
				}else{
				  $filenamez= 'social_image';
				  $imagepath=$this->data['Matrimonial']['profile_image_social'];
				}
					$this->loadModel('PhotoCustomer');
					$this->PhotoCustomer->create();
					$this->PhotoCustomer->set(array(
						'internal_id_primary_key' => $this->User->id,
						'photo_name' => $filenamez,
						'photo_path'  => $imagepath
					));
					$this->PhotoCustomer->save();
					$newPhotocustomerId = $this->PhotoCustomer->id;
			    /*****************************************************/
				
				   $this->request->data['Matrimonial']['photo_primary_key']=$newPhotocustomerId;
				   $this->request->data['Matrimonial']['validation_primary_key']= 0;
				   
			  if(empty($this->request->data['Matrimonial']['time_of_birth'])){
				  $this->request->data['Matrimonial']['time_of_birth']='00:00:00';
			  }
			   if(empty($this->request->data['Matrimonial']['date_of_birth'])){
				  $this->request->data['Matrimonial']['date_of_birth']='0000-00-00 00:00:00';
			   }else{
				   $this->request->data['Matrimonial']['date_of_birth']= date('Y-m-d',strtotime($this->request->data['Matrimonial']['date_of_birth']));
			   }
			  
		            // Because our User hasOne Profile, we can access
					// the Profile model through the User model:
					$user1=  $this->User->Matrimonial->save($this->request->data);
				}
				// Here start code for sending mobile vrification code
				// My Stuff
				// End Code
				$this->Session->write('user.uid',$this->User->id );
			} 
			$this->redirect(array('controller' => 'users','action' => 'mobilevarifaction'));
		}
		
    }
	public function mobilevarifaction(){
		$this->layout = 'registration';
		
		$userid = $this->Session->read('user.uid');
		
		if(empty($userid)){
			$this->redirect(array('controller' => 'users','action' => 'login'));
		}else{
		    $this->set('newuserid',$userid);
		}
		
		// Create code of unique code
		//$random_number=rand(100000,999999);
		//echo $random_number;
		/*$this->loadModel('UniqueCode');
		$this->UniqueCode->create();
		$this->UniqueCode->set(array(
						'internal_id_primary_key' => $userdetail['User']['id'],
						'sms_code'  => $random_number,
						'web_code'  => $random_number
					));
		$this->UniqueCode->save();*/
		$varification_code='123456';// This is comming form databse
		
		if ($this->request->is('post')) {
			if($this->request->data['User']['verificationcode']==$varification_code){
			   $this->redirect(array('controller' => 'users','action' => 'idvarifaction'));
			}else{
				$this->set('error','Your varification code is wrong. Please try again.');
			}
		}
		//echo $userid;
	}
	public function idvarifaction(){
		$this->layout = 'registration';
		$userid = $this->Session->read('user.uid');
		if(empty($userid)){
			$this->redirect(array('controller' => 'users','action' => 'login'));
		}else{
		    $this->set('newuserid',$userid);
		}
		if ($this->request->is('post')) {
			if(!empty($this->request->data['User']['identity_image']['name'])){
					$dir = WWW_ROOT.'img/idproof';
					$slas= '\\';                    
					$filenamez= $this->request->data['User']['identity_image']['name'];
					$dir=$dir.$slas.$filenamez;
					//echo $dir;
					@move_uploaded_file($this->request->data['User']['identity_image']['tmp_name'],$dir);
				   $imagepath=BASE_URL.'img/idproof/'.$this->request->data['User']['identity_image']['name'];           
					$this->loadModel('IdProof');
					$this->IdProof->create();
					$this->IdProof->set(array(
						'internal_id_primary_key' =>$this->request->data['User']['user_id_new'],
						'proof_name' => $filenamez,
						'proof_path'  => $imagepath
					));
					$this->IdProof->save();
					//echo $newPhotocustomerId = $this->IdProof->id;
					if($this->IdProof->id){
						$this->redirect(array('controller' => 'users','action' => 'privacypolicy'));
					}
			}
		 }
	}
	public function privacypolicy(){
		$this->layout = 'registration';
		$userid = $this->Session->read('user.uid');
		if(empty($userid)){
			$this->redirect(array('controller' => 'users','action' => 'login'));
		}else{
		    $this->set('newuserid',$userid);
		}
		if ($this->request->is('post')) {
			if($this->request->data['User']['policycheck']==1){
				
				$this->User->id = $this->request->data['User']['user_id_new'];
                $this->User->saveField('is_user_approved', 1);
				$this->redirect(array('controller' => 'users','action' => 'profile'));
			}else{
				$this->set('error','Please agree with our conditions.');
				$this->redirect(array('controller' => 'users','action' => 'privacypolicy'));
			}
		}
	}
    public function profile() {
		    $this->layout = 'profile';
		    $userid = $this->Session->read('user.uid');
			if(empty($userid)){
				$this->redirect(array('controller' => 'users','action' => 'login'));
			}else{
				$this->set('newuserid',$userid);
			}
			$thisuser=$this->User->findById($userid);
			//pr($thisuser);
			
			if (empty($thisuser)) {
				throw new NotFoundException(__('Invalid User'));
			}else{
				$this->set('thisuser',$thisuser);
				$city =$this->_getusercityname($thisuser['Matrimonial']['city_primary_key']);
				$this->set('thisusercity',$city);
				$state =$this->_getuserstatename($thisuser['Matrimonial']['state_primary_key']);
				$this->set('thisuserstate',$state);
				$country =$this->_getusercountryname($thisuser['Matrimonial']['country_primary_key']);
				$this->set('thisusercountry',$country);
				$this->set('thisuserprovider',$thisuser['Matrimonial']['provider']);
			}
	}
	public function _getusercityname($cityid = null){
		        
				$this->loadModel('City');
				$this->City->id = $cityid;
				$city =$this->City->findById($cityid); 
				$cityname=$city['City']['city_name'];
				return $cityname;
	}
	public function _getuserstatename($stateid = null){
		        
				$this->loadModel('State');
				$this->State->id = $stateid;
				$state =$this->State->findById($stateid); 
				$statename=$state['State']['state_name'];
				return $statename;
	}
	public function _getusercountryname($countryid = null){
		        
				$this->loadModel('Country');
				$this->Country->id = $countryid;
				$country =$this->Country->findById($countryid); 
				$countryname=$country['Country']['country_name_en_us'];
				return $countryname;
	}
	public function _profiledata() {
		    $this->layout = 'profile';
		    $userid = $this->Session->read('user.uid');
			if(empty($userid)){
				$this->redirect(array('controller' => 'users','action' => 'login'));
			}else{
				$this->set('newuserid',$userid);
			}
			$thisuser=$this->User->findById($userid);
			
			if (empty($thisuser)) {
				throw new NotFoundException(__('Invalid post'));
			}else{
				return $thisuser;
			 }
	}
	public function contactsent(){
	     $thisuser=$this->_profiledata();
		 $this->set('thisuser',$thisuser);
	     
		 
		 $this->loadModel('MessageSent');
	     $messagesendlist = $this->MessageSent->find('all', array(
            'conditions' => array('MessageSent.internal_id_primary_key' => $thisuser['User']['id'])
    ));  
	    $allmessagetolist= array();
	    foreach($messagesendlist as $ml){
			
			$touser=$this->User->findById($ml['MessageSent']['internal_id_primary_key_to']);
			//pr($touser);
			$allmessagetolist[]=array(
			'to_user_id'=>$touser['User']['id'],
			'image_path'=>$touser['PhotoCustomer'][0]['photo_path'],       
		    'user_full_name'=>$touser['Matrimonial']['first_name'].' '.$touser['Matrimonial']['last_name'],
			'web_message'=>$ml['MessageSent']['web_message'],
			'sms_message'=>$ml['MessageSent']['sms_message'],
			'message_date_time'=>$ml['MessageSent']['message_date_time']);
			
		}
		//pr($allmessagetolist);
		$this->set('allmessagetolist',$allmessagetolist);
		
	}
	public function contactreceived() {
	     $thisuser=$this->_profiledata();
		 $this->set('thisuser',$thisuser);
		 
		 $this->loadModel('MessageReceived');
	     $messagerecievedlist = $this->MessageReceived->find('all', array(
            'conditions' => array('MessageReceived.internal_id_primary_key' => $thisuser['User']['id'])
    ));  
	    $allmessagefromlist = array();
	    foreach($messagerecievedlist as $ml){
			
			$fromuser=$this->User->findById($ml['MessageReceived']['internal_id_primary_key_from']);
			$allmessagefromlist[]=array(
			'to_user_id'=>$fromuser['User']['id'],
			'image_path'=>$fromuser['PhotoCustomer'][0]['photo_path'],       
		    'user_full_name'=>$fromuser['Matrimonial']['first_name'].' '.$fromuser['Matrimonial']['last_name'],
			'web_message'=>$ml['MessageReceived']['web_message'],
			'sms_message'=>$ml['MessageReceived']['sms_message'],
			'message_date_time'=>$ml['MessageReceived']['message_date_time']);
			
		}
		//pr($allmessagefromlist);
		$this->set('allmessagefromlist',$allmessagefromlist);
	}
	public function profilesearchlisting(){
	     $thisuser=$this->_profiledata();
		 $this->set('thisuser',$thisuser); 
		 
		 if ($this->request->is('post')) {
		   $searchstr = $this->data['User']['s'];
		   /*$this->paginate = array(
				'conditions' => array(
				'or' => array(
				    "Matrimonial.first_name LIKE" => "%$searchstr%",
					"Matrimonial.last_name LIKE" => "%$searchstr%",
					"Matrimonial.education LIKE" => "%$searchstr%",
					"Matrimonial.caste LIKE" => "%$searchstr%",
					"Matrimonial.father_gotra LIKE" => "%$searchstr%",
					"Matrimonial.mother_gotra LIKE" => "%$searchstr%"
				    )
				 ),
				'limit' => 10
			);
			$userresults = $this->paginate('User');
			$this->set(compact('userresults','searchstr'));*/
			$userresults=$this->User->find("all", array(
			        'fields' => array('User.*','Matri.*','State.*','City.*','Country.*'),
					'joins' => array(
						array(
							"table" => "matrimonials",
							"alias" => "Matri",
							"type" => "inner",
							"conditions" => array(
								"User.id = Matri.user_id"
							)
						),
						array(
							"table" => "cities",
							"alias" => "City",
							"type" => "inner",
							"conditions" => array(
								"Matri.city_primary_key = City.id"
							)
						),
						array(
							"table" => "states",
							"alias" => "State",
							"type" => "inner",
							"conditions" => array(
								"Matri.state_primary_key = State.id"
							)
						)
						,
						array(
							"table" => "countries",
							"alias" => "Country",
							"type" => "inner",
							"conditions" => array(
								"Matri.country_primary_key = Country.id"
							)
						)
					),
					'conditions' => array(
						'or' => array(
							"Matri.first_name LIKE" => "%$searchstr%",
							"Matri.last_name LIKE" => "%$searchstr%",
							"Matri.education LIKE" => "%$searchstr%",
							"Matri.caste LIKE" => "%$searchstr%",
							"Matri.father_gotra LIKE" => "%$searchstr%",
							"Matri.mother_gotra LIKE" => "%$searchstr%",                            "City.city_name LIKE" => "%$searchstr%",                            "Country.country_name_en_us LIKE" => "%$searchstr%",                            "State.state_name LIKE" => "%$searchstr%"                            ),
						'and' => array(
						      "user.id !=" => $thisuser['User']['id']
		                    )
						 )
				 ));
				 //pr($userresults);
				$this->set('userresults',$userresults);
				$this->set('searchstr',$searchstr);
		}
	 }
    public function editprofile() {
		  $thisuser=$this->_profiledata();
		  $this->set('thisuser',$thisuser);
		  $provider = $this->Session->read('provider');
		  $this->set('provider','Facebook');
		 
		  $this->loadModel('City');
		  $city =$this->City->findById($thisuser['Matrimonial']['city_primary_key']);      $this->set('city', $city);
		 
		  $this->loadModel('State');
		  if($thisuser['Matrimonial']['country_primary_key']=='103'){
			  $this->set('states',$this->State->find('list', array(
			 'fields' => array('State.id', 'State.state_name'),'conditions' => array('State.scid =' => '103'))));
		  }else{
			  $this->set('state',$this->State->findById($thisuser['Matrimonial']['state_primary_key']));
		  }
		
		  $this->loadModel('Country');
		  $this->set('countries',$this->Country->find('list', array(
         'fields' => array('Country.id', 'Country.country_name_en_us'))));
		
		
		 // Updating data
		 if ($this->request->is('post')) {
			 //debug($this->request->data);
			        $id=$thisuser['User']['id'];
			        if (!$id) {
						throw new NotFoundException(__('Invalid User'));
					}
				
					$user = $this->User->findById($id);
					//pr($user);
					if (!$user) {
						throw new NotFoundException(__('Invalid User'));
					}
				   
					$this->request->data['User']=$user['User'];
					if ($this->User->save($this->request->data['User'])) {
							$this->request->data['Matrimonial']['profile_image']['name'];                    $this->loadModel('PhotoCustomer');
							$image =$this->PhotoCustomer->findByInternalIdPrimaryKey($this->request->data['User']['id']);
							//pr($image);
							
						if(!empty($this->data['Matrimonial']['profile_image']['name'])){
								$dir = WWW_ROOT.'img/upload';
								$slas= '\\';                    
								$filenamez= $this->data['Matrimonial']['profile_image']['name'];
								$dirnew=$dir.$slas.$filenamez;
								//echo $dir;
								@move_uploaded_file($this->data['Matrimonial']['profile_image']['tmp_name'],$dirnew);
							   $imagepath=BASE_URL.'img/upload/'.$this->data['Matrimonial']['profile_image']['name']; 
							   if(!empty($image)){
							       // unlink($image['PhotoCustomer']['photo_path']);
								    $this->PhotoCustomer->set(array(
										'id'=>$image['PhotoCustomer']['id'],
										'internal_id_primary_key' =>$this->request->data['User']['id'],
										'photo_name' => $filenamez,
										'photo_path'  => $imagepath
									));
							   }else{
								    $this->PhotoCustomer->create();
									$this->PhotoCustomer->set(array(
										'internal_id_primary_key' =>$this->request->data['User']['id'],
										'photo_name' => $filenamez,
										'photo_path'  => $imagepath
									));
							   }
							    $this->PhotoCustomer->save();
							    $newPhotocustomerId = $this->PhotoCustomer->id;                        }else{
							    $newPhotocustomerId= $image['PhotoCustomer']['id'];		
						}
					 /*****************************************************/
					  $city=$this->City->findByCityName ($this->request->data['Matrimonial']['city']);
					  if(empty($city)){
						  $this->City->create();
							$this->City->set(array(
								'city_name' => $this->request->data['Matrimonial']['city'],                      'city_std_code' =>'',
								'state_primary_key' => $StateId
							));
							$this->City->save();
							$CityId = $this->City->id;
					  }else{
						    $CityId = $city['City']['id'];
					  }
					  /*********************************************/
					  if($this->request->data['Country']['field']!='103'){  
						$this->loadModel('State');
						$state=$this->State->findByStateName($this->request->data['State']['field']);    //pr($state);
						if(empty($state)){
							$this->State->create();
							$this->State->set(array(
								'state_name' => $this->request->data['State']['field'],                       'state_code' =>'',
								'lang_code2'=>'',
								'scid' => $this->request->data['Country']['field']
							));
							$this->State->save();
						    $StateId = $this->State->id;
						}else{
							$StateId = $state['State']['id'];
						}
					  }else{
						    $StateId=$this->request->data['State']['field'];
					  }
					  /**********************************************/
					  $this->loadModel('IdProof');
					  $idproof =$this->IdProof->findByInternalIdPrimaryKey($this->request->data['User']['id']);
					 // print_r($idproof);
					  /**********************************************/
					    $this->request->data['Matrimonial']['id']=$user['Matrimonial']['id'];
						$this->request->data['Matrimonial']['user_id']=$user['Matrimonial']['user_id'];
						$this->request->data['Matrimonial']['city_primary_key']=$CityId;                
						$this->request->data['Matrimonial']['state_primary_key']=$StateId;               $this->request->data['Matrimonial']['country_primary_key']=$this->request->data['Country']['field'];
						$this->request->data['Matrimonial']['validation_primary_key']=$idproof['IdProof']['id'];
						$this->request->data['Matrimonial']['photo_primary_key']=$newPhotocustomerId;    
						 if(empty($this->request->data['Matrimonial']['time_of_birth'])){
						  $this->request->data['Matrimonial']['time_of_birth']='00:00:00';
					     }
					    if(empty($this->request->data['Matrimonial']['date_of_birth'])){
						  $this->request->data['Matrimonial']['date_of_birth']='0000-00-00 00:00:00';
					    }else{
						   $this->request->data['Matrimonial']['date_of_birth']= date('Y-m-d',strtotime($this->request->data['Matrimonial']['date_of_birth']));
					    }
						$this->request->data['Matrimonial']['gender']=$this->request->data['Matrimonial']['gender'];
						
						$usermetrimonial=$this->User->Matrimonial->save($this->request->data['Matrimonial']);         
						//print_r($usermetrimonial);
						
						$this->set('thisuser',$usermetrimonial);
						    //$this->Session->setFlash(__('Your profile has been updated.'));
							//return $this->redirect(array('action' => 'index'));
					}
				    //$this->Session->setFlash(__('Unable to update you.'));
					
				
					if (!$this->request->data) {
						$this->request->data  = $usermetrimonial;
					}
					
		    $this->redirect(array('controller' => 'users','action' => 'profile'));
		 }// End Updating data
    }
	public function profiledetail($id = null) {
		$thisuser=$this->_profiledata();
		$this->set('thisuser',$thisuser);
		
		if (!$id) {
            throw new NotFoundException(__('Invalid User'));
        }

        $userdetail=$this->User->findById($id);
        if (!$userdetail) {
			//$this->redirect(array('controller' => 'users','action' => 'userprofileerror'));
             throw new NotFoundException(__('Invalid User'));
			 
        }
		
		$this->set('thisuserdetail',$userdetail);
		$city =$this->_getusercityname($userdetail['Matrimonial']['city_primary_key']);
		$this->set('thisusercity',$city);
		$state =$this->_getuserstatename($userdetail['Matrimonial']['state_primary_key']);
		$this->set('thisuserstate',$state);
		$country =$this->_getusercountryname($userdetail['Matrimonial']['country_primary_key']);
		$this->set('thisusercountry',$country);
		$this->set('loggedinuserprovider',$thisuser['Matrimonial']['provider']);
		 
	}
	public function sendsms($id = null) {
		 $thisuser=$this->_profiledata();
		 $this->set('thisuser',$thisuser);
		if (!$id) {
            throw new NotFoundException(__('Invalid User'));
        }

        $userdetail=$this->User->findById($id);
        if (!$userdetail) {
            throw new NotFoundException(__('Invalid User'));
        }
		
		$this->set('thisuserdetail',$userdetail);
		
		$city =$this->_getusercityname($thisuser['Matrimonial']['city_primary_key']);
		$this->set('thisusercity',$city);
		$state =$this->_getuserstatename($thisuser['Matrimonial']['state_primary_key']);
		$this->set('thisuserstate',$state);
		$country =$this->_getusercountryname($thisuser['Matrimonial']['country_primary_key']);
		$this->set('thisusercountry',$country);
		$this->set('loggedinuserprovider',$thisuser['Matrimonial']['provider']);
		
		 
		
		// Check Message is sent Or not
		$this->loadModel('MessageSent');
		$alreadysent = $this->MessageSent->find('first', 
			array(
				'conditions' => array(
				'and' => array(
					   array('MessageSent.internal_id_primary_key' => $thisuser['User']['id'],'MessageSent.internal_id_primary_key_to' =>$userdetail['User']['id'])
						)
				   )
	           )
		);
		//pr($alreadysent);
		if(!empty($alreadysent)){
		  if($alreadysent['MessageSent']['internal_id_primary_key']==$thisuser['User']['id']){	
				if($alreadysent['MessageSent']['sms_message']!=''){
				$msg='1__alreadysentsms';
				}elseif($alreadysent['MessageSent']['web_message']!=''){
				$msg='1__alreadysentemail';
				}
				$this->set('msg',$msg);	
		  }
		}
		
		// Code for SMS sending 
		if ($this->request->is('post')) {
			//debug($this->request->data);
			        $to = $this->User->findById($this->request->data['sendsms']['userid']); 
					// This will go to 'message_sent' table
			        $alreadysent = $this->MessageSent->findByInternalIdPrimaryKeyTo($to['User']['id']);           //pr( $alreadysent);
					if(!empty($to)){
						
						if(empty($alreadysent)||($alreadysent['MessageSent']['internal_id_primary_key']!=$thisuser['User']['id'])){
						$from='+441422400177';
						//$tonumber ='+447574929475';
						$tonumber = $to['Matrimonial']['contact_number'];
						$message=$this->request->data['sendsms']['message'];
						$response = $this->Twilio->sms($from, $tonumber, $message);
						if($response->IsError){
							$this->set('error',$response->ErrorMessage);
						}else{
					
							$this->MessageSent->create();
							$this->MessageSent->set(array(
								'internal_id_primary_key' => $thisuser['User']['id'],
								'internal_id_primary_key_to' => $to['User']['id'],
								'sms_message'  => $this->request->data['sendsms']['message'],
								'web_message'  => '',
								'message_date_time'  => date('Y-m-d H:i:s')
							));
							$this->MessageSent->save();
							//echo $newMessageSentId = $this->MessageSent->id;
							
							// This will go to 'message_received' table
							$this->loadModel('MessageReceived');
							$this->MessageReceived->create();
							$this->MessageReceived->set(array(
								'internal_id_primary_key' => $to['User']['id'],
								'internal_id_primary_key_from' =>$thisuser['User']['id'] ,
								'sms_message'  => $this->request->data['sendsms']['message'],
								'web_message'  => '',
								'message_date_time'  => date('Y-m-d H:i:s')
							));
							$this->MessageReceived->save();
							//echo $newMessageReceivedId = $this->MessageReceived->id;
							$msg='1__successfullysent';	
							$this->set('msg',$msg);	 
							//$this->redirect(array('controller' => 'users','action' => 'sendsms'.'/'.$to['User']['id']));
						  }
						 }
					    }else{
						  $msg='1__wentwrong';	
						  $this->set('msg',$msg);	
				       }
		             }
	    }
	public function sendmail($id = null) {
		 $thisuser=$this->_profiledata();
		 $this->set('thisuser',$thisuser);
		 //phpinfo();
		 if (!$id) {
            throw new NotFoundException(__('Invalid User'));
         }

        $userdetail=$this->User->findById($id);
        if (!$userdetail) {
            throw new NotFoundException(__('Invalid User'));
        }
		
		$this->set('thisuserdetail',$userdetail);
		$city =$this->_getusercityname($thisuser['Matrimonial']['city_primary_key']);
		$this->set('thisusercity',$city);
		$state =$this->_getuserstatename($thisuser['Matrimonial']['state_primary_key']);
		$this->set('thisuserstate',$state);
		$country =$this->_getusercountryname($thisuser['Matrimonial']['country_primary_key']);
		$this->set('thisusercountry',$country);
		$this->set('loggedinuserprovider',$thisuser['Matrimonial']['provider']);
		
		// Check message sent already
		$this->loadModel('MessageSent');
		$alreadysent = $this->MessageSent->find('first', 
			array(
				'conditions' => array(
				'and' => array(
					   array('MessageSent.internal_id_primary_key' => $thisuser['User']['id'],'MessageSent.internal_id_primary_key_to' =>$userdetail['User']['id'])
						)
				   )
	           )
		); //pr($alreadysent);
		if(!empty($alreadysent)){
			if($alreadysent['MessageSent']['internal_id_primary_key']==$thisuser['User']['id']){
				if($alreadysent['MessageSent']['sms_message']!=''){
				$msg='1__alreadysentsms';
				}elseif($alreadysent['MessageSent']['web_message']!=''){
				$msg='1__alreadysentemail';
				}
				$this->set('msg',$msg);	
			}
		}
		/* Code for email sending */
		if ($this->request->is('post')) {
			        
			        $to = $this->User->findById($this->request->data['sendmail']['userid']);  
			        // This will go to 'message_sent' table
			        $alreadysent = $this->MessageSent->findByInternalIdPrimaryKeyTo($to['User']['id']);           
					if(!empty($to)){
					if(empty($alreadysent)||($alreadysent['MessageSent']['internal_id_primary_key']!=$thisuser['User']['id'])){
					$this->MessageSent->create();
					$this->MessageSent->set(array(
						'internal_id_primary_key' => $thisuser['User']['id'],
						'internal_id_primary_key_to' => $to['User']['id'],
						'sms_message'  => '',
						'web_message'  => $this->request->data['sendmail']['message'],
						'message_date_time'  => date('Y-m-d H:i:s')
					));
					$this->MessageSent->save();
					//echo $newMessageSentId = $this->MessageSent->id;
					
					// This will go to 'message_received' table
					$this->loadModel('MessageReceived');
					$this->MessageReceived->create();
					$this->MessageReceived->set(array(
						'internal_id_primary_key' => $to['User']['id'],
						'internal_id_primary_key_from' =>$thisuser['User']['id'] ,
						'sms_message'  => '',
						'web_message'  => $this->request->data['sendmail']['message'],
						'message_date_time'  => date('Y-m-d H:i:s')
					));
					$this->MessageReceived->save();
					//echo $newMessageReceivedId = $this->MessageReceived->id;
					
					// Mail code
					$Email = new CakeEmail();
					$Email->config('gmail');
					$Email->from(array('leeladharg@vervelogic.com' => 'Shaadi Azurewebsites.net'))
						->to($to['User']['email_address'])
						->subject($this->request->data['sendmail']['subject'])
						->send($this->request->data['sendmail']['message']);
						
					$msg='1__successfullysent';	
					$this->set('msg',$msg);	 
					$this->redirect(array('controller' => 'users','action' => 'sendmail'.'/'.$to['User']['id']));
					}
				}else{
					$msg='1__wentwrong';	
					$this->set('msg',$msg);	
				}
			}
		}
    public function deleteprofile($id = null) {
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
	public function logout() {
		//return $this->redirect($this->Auth->logout());
		$this->Session->destroy();
		$this->redirect(array('controller' => 'users','action' => 'login'));
	}
}?>