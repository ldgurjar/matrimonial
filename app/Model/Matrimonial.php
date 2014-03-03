<?php
//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Matrimonial extends AppModel {
   var $name = 'Matrimonial';
   public $belongsTo = array('User');
   //public $hasOne = array('City','Country','State');
   /*var $hasMany = array( 
         'City' => array( 
			 'className'     => 'City', 
			 'foreignKey'    => 'city_primary_key'      
               ),
	     'State' => array( 
             'className'     => 'State', 
             'foreignKey'    => 'state_primary_key'       
               ),
	     'Country' => array( 
             'className'     => 'Country', 
             'foreignKey'    => 'country_primary_key'       
               )		    
    );*/
   
}?>