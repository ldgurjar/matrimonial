<?php
// app/Model/User.php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
	//public $hasOne = 'Profile';
	public $hasOne = 'Matrimonial';
	//public $hasOne = array('Matrimonial','City','Country','State');
	var $hasMany = array( 
         'PhotoCustomer' => array( 
			 'className'     => 'PhotoCustomer', 
			 'foreignKey'    => 'internal_id_primary_key'      
               ),
	     'IdProof' => array( 
             'className'     => 'IdProof', 
             'foreignKey'    => 'internal_id_primary_key'       
               )		    
    );
	
	
    /*public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
	*/
	/*
	public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new SimplePasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
   }*/
}?>