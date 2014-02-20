<!--//app/View/Users/login.ctp-->
<?php 
echo $this->Session->flash('auth');
/*if( isset( $error ) ){
		debug( $error );
}*/
//echo $user_profile->identifier;
if(isset($user_profile)){
	//$provider=$this->Session->read('provider');
	//echo $provider;
	//debug( $user_profile );
	$provider=ucfirst($provider);
	$identifier=$user_profile->identifier;
	$webSiteURL=$user_profile->webSiteURL;
	$profileURL =$user_profile->profileURL;
	$photoURL=$user_profile->photoURL;
	$displayName=$user_profile->displayName;
	$firstName =$user_profile->firstName;
	$lastName =$user_profile->lastName ;
	$gender =$user_profile->gender ;
	$description =$user_profile->description ;
	$language =$user_profile->language ;
	$birthDay =$user_profile->birthDay;
	$birthYear =$user_profile->birthYear;
	$birthMonth =$user_profile->birthMonth;
	$email  =$user_profile->email ;
	$emailVerified =$user_profile->emailVerified;
	$phone =$user_profile->phone;
	$address =$user_profile->address;
	$country =$user_profile->country;
	$region =$user_profile->region;
	$city =$user_profile->city;
	$zip =$user_profile->zip;
	//echo $zip;
	//echo $displayName;
?>
<style type="text/css">
.rselect select{ 
width: 18% !important;
margin-left: 1% !important;
}
.addressdiv textarea{
float: right !important;
width: 55% !important;
margin-right: 10%;
}
.imageset{
float: left;
width: 30%;
clear: both;
margin-top: -38px;
margin-left: 50%;
}
</style>
<?php echo $this->Form->create('User', array('type' => 'file','action' => 'register')); ?>
<div class="middle-container">
   
    <h2 class="title"><?php echo 'You are logged in by '.$provider.', Register and Update your Profile' ?></h2>

    <div class="form">
            <?php echo $this->Form->input('Matrimonial.provider', array('type' => 'hidden','value' => $provider)); ?>
            <?php echo $this->Form->input('Matrimonial.identifier', array('type' => 'hidden','value' => $identifier) ); ?>
            <?php echo $this->Form->input('Matrimonial.profileURL', array('type' => 'hidden','value' => $profileURL) ); ?>
            <?php echo $this->Form->input('Matrimonial.photoURL', array('type' => 'hidden','value' => $photoURL) ); ?>
            
			
			<?php echo $this->Form->input('User.username', array('type' => 'hidden','value' => $identifier) ); ?>
            <?php echo $this->Form->input('User.password', array('type' => 'hidden','value' => $identifier) ); ?>
             <?php echo $this->Form->input('User.registration_date_time', array('type' => 'hidden','value' => date('Y-m-d H:s:i')) ); ?>
             <?php echo $this->Form->input('User.email_address', array('type' => 'hidden','value' => $email) ); ?>
              <?php echo $this->Form->input('User.role', array('type' => 'hidden','value' => 'member') ); ?>
             <?php 
			  if($provider=='Facebook'){
			       echo $this->Form->input('User.uuid_facebook', array('type' => 'hidden','value' => $profileURL) );
			  } else if($provider=='Google'){
				  
			    echo $this->Form->input('User.uuid_google', array('type' => 'hidden','value' =>  $profileURL) );
			  } else if($provider=='Twitter'){
				  
			    echo $this->Form->input('User. 	uuid_twitter', array('type' => 'hidden','value' =>  $profileURL) );
			  } else if($provider=='Linkedin'){
				 echo $this->Form->input('User.uuid_linkedin', array('type' => 'hidden','value' =>  $profileURL) );
			  }
				
			?>
        <div class="col-md-6 col-sm-6 input-row">
                <?php echo $this->Form->input('Matrimonial.first_name', array('label' => 'First Name:','div' => false,'placeholder' => 'Last Name','default' => $firstName) ); ?>
      </div>
      <div class="col-md-6 col-sm-6 input-row">
          <?php echo $this->Form->input('Matrimonial.last_name', array('label' => 'Last Name:','div' => false,'placeholder' => 'Last Name','default' => $lastName) ); ?>
     </div>
     <div class="col-md-6 col-sm-6 input-row">
          <?php echo $this->Form->input('Matrimonial.email', array('label' => 'Email:','div' => false,'placeholder' => 'Email','default' => $email) ); ?>
     </div>

      <div class="col-md-6 col-sm-6 input-row">
       <?php echo $this->Form->input('Matrimonial.father_name', array('label' => 'Father\'s Name:','div' => false,'placeholder' => 'Father\'s Name','default' => '') ); ?>

      </div>

      <div class="col-md-6 col-sm-6 input-row">
          <?php echo $this->Form->input('Matrimonial.mother_name', array('label' => 'Mother\'s Name:','div' => false,'placeholder' => 'Mother\'s Name','default' => '') ); ?>

      </div>

      <div class="col-md-6 col-sm-6 input-row">

        <label>Gender:</label>
        <label class="radio"> <?php  $options = array('male' => 'Male', 'female' => 'Female');
            $attributes = array('legend' => false,'default' => $gender);
            echo $this->Form->radio('Matrimonial.gender', $options, $attributes);?></label>

      </div>

      <div class="col-md-6 col-sm-6 input-row">
      <?php echo $this->Form->input('Matrimonial.date_of_birth', 
			 array(
				'type' => 'date',
				'label' => 'Date of Birth:<span>*</span>',
				'dateFormat' => 'MDY',
				'empty' => array(
					'month' => 'Month',
					'day'   => 'Day',
					'year'  => 'Year'
				),
				'minYear' => date('Y')-70,
				'maxYear' => date('Y'),
				'separator' => '',
				'options' => array('1','2'),
				'div' => array(
                    'class' => 'rselect',
                 ),
				 'selected'=> array(
					'month' => $birthMonth ,
					'day' => $birthDay,
					'year' => $birthYear ,
				 )
			)
		); ?>
      </div> 
      <div class="col-md-6 col-sm-6 input-row">
      <?php echo $this->Form->input('Matrimonial.time_of_birth', 
			 array(
				'type' => 'time',
				'label' => 'Time of Birth:<span>*</span>',
				'timeFormat' => '12',
				'empty' => array(
					'hour' => 'Hour',
					'minute'   => 'Minute',
					'meridian'  => 'Meridian'
				),
				'separator' => '',
				'div' => array(
                    'class' => 'rselect',
                 )
			 )
		); ?>
       
      </div> 

      <div class="col-md-6 col-sm-6 input-row">
         <?php echo $this->Form->input('Matrimonial.caste', array('label' => 'Caste:','div' => false,'placeholder' => 'Caste','default' => '') ); ?>

      </div>      

      <div class="col-md-6 col-sm-6 input-row">
         <?php  $education = array('B.A' => 'B.A', 
		 'B.Arch' => 'B.Arch',
		 'BCA' => 'BCA',
		 'B.B.A' => 'B.B.A', 
		 'B.Com' => 'B.Com',
		 'B.Ed' => 'B.Ed',
		 'BDS' => 'BDS',
		 'BHM' => 'BHM',
		 'B.Pharma' => 'B.Pharma',
		 'B.Pharma' => 'B.Pharma',
		 'B.Sc' => 'B.Sc',
		 'B.Sc' => 'B.Sc',
		 'B.Tech/B.E.' => 'B.Tech/B.E.',
		 'LLB' => 'LLB',
		 'MBBS' => 'MBBS',
		 'Diploma' => 'Diploma',
		 'CA' => 'CA',
		 'CS' => 'CS',
		 'ICWA' => 'ICWA',
		 'Integrated PG' => 'Integrated PG',
		 'LLM' => 'LLM',
		 'M.A' => 'M.A',
		 'M.Arch' => 'M.Arch',
		 'M.Com' => 'M.Com',
		 'M.Ed' => 'M.Ed',
		 'M.Pharma' => 'M.Pharma',
		 'M.Sc' => 'M.Sc',
		 'M.Tech' => 'M.Tech',
		 'MBA/PGDM' => 'MBA/PGDM',
		 'MCA' => 'MCA',
		 'MS' => 'MS',
		 'PG Diploma' => 'PG Diploma',
		 'MVSC' => 'MVSC',
		 'MCM' => 'MCM',
		 'other' => 'other');
           echo $this->Form->input(
              'Matrimonial.education',
              array('label' => 'Education:','options' => $education, 'default' => '','empty' => 'Choose Education')
         );?>
      </div>

      <div class="col-md-6 col-sm-6 input-row">
       <?php  $profession = array(
		'Construction Project Manager' => 'Construction Project Manager', 
		'Project Builder' => 'Project Builder', 
		'Engineering Manager' => 'Engineering Manager', 
		'Production Manager (Mining)' => 'Production Manager (Mining)',
	    'Child Care Centre Manager' => 'Child Care Centre Manager',
		'Medical Administrator' => 'Medical Administrator',
		'Nursing Clinical Director' => 'Nursing Clinical Director',
		'Primary Health Organisation Manager' => 'Primary Health Organisation Manager',
		'Welfare Centre Manager' => 'Welfare Centre Manager',
		'Accountant (General)' => 'Accountant (General)',
		'Management Accountant' => 'Management Accountant',
		'Taxation Accountant' => 'Taxation Accountant',
		'External Auditor' => 'External Auditor',
		'Internal Auditor' => 'Internal Auditor',
		'Actuary' => 'Actuary',
		'Land Economist' => 'Land Economist',
		'Valuer' => 'Valuer',
		'Ship\'s Engineer' => 'Ship\'s Engineer',
		'Ship\'s Master' => 'Ship\'s Master',
		'Ship\'s Officer' => 'Ship\'s Officer',
		'Architect' => 'Architect',
		'Landscape Architect' => 'Landscape Architect',
		'Cartographer' => 'Cartographer',
		'Other Spatial Scientist' => 'Other Spatial Scientist',
		'Surveyor' => 'Surveyor',
		'Urban and Regional Planner' => 'Urban and Regional Planner',
		'Civil Engineer' => 'Civil Engineer',
		'Geotechnical Engineer' => 'Geotechnical Engineer','Quantity Surveyor' => 'Quantity Surveyor','other' => 'other');
           echo $this->Form->input(
              'Matrimonial.profession',
              array('label' => 'Your Occupation:','options' => $profession, 'default' => '','empty' => 'Choose Occupation')
         );?>

      </div>

      <div class="col-md-6 col-sm-6 input-row">
          <?php  $salary = array('0-10000' => '0-10000',
		    '10000-20000' => '10000-20000',
		    '20000-30000' => '20000-30000', 
			'30000-40000' => '30000-40000', 
			'40000-50000' => '40000-50000',
			'50000-60000' => '50000-60000',
			'60000-70000' => '60000-70000',
			'70000-80000' => '70000-80000',
			'80000-90000' => '80000-90000',
			'more than 90k' => 'more than 90k');
           echo $this->Form->input(
              'Matrimonial.salary',
              array('label' => 'Salary:','options' => $salary, 'default' => '','empty' => 'Choose Salary')
         );?>

      </div>

      <div class="col-md-6 col-sm-6 input-row family-mem">

        <label>Family Member:</label>

        <label class="shortinput">Brother  <?php echo $this->Form->input('Matrimonial.number_of_sisters', array('label' => false,'div' => false) ); ?> Sister <?php echo $this->Form->input('Matrimonial.number_of_sisters', array('label' => false,'div' => false ) ); ?></label>

      </div>

      <div class="col-md-6 col-sm-6 input-row">
       <?php  $height = array(
	   'less than 4.6' => 'Less than 4 ft 6 in',
	   '4.6' => '4 ft 6 in', 
	   '4.7' => '4 ft 7 in',
	   '4.8' => '4 ft 8 in',
	   '4.9' => '4 ft 9 in',
	   '4.10' => '4 ft 10 in',
	   '4.11' => '4 ft 11 in',
	   '5.0' => '5 ft',
	   '5.1' => '5 ft 1 in',
	   '5.2' => '5 ft 2 in',
	   '5.3' => '5 ft 3 in',
	   '5.4' => '5 ft 4 in',
	   '5.5' => '5 ft 5 in',
	   '5.6' => '5 ft 6 in',
	   '5.7' => '5 ft 7 in',
	   '5.8' => '5 ft 8 in',
	   '5.9' => '5 ft 9 in',
	   '5.10' => '5 ft 10 in',
	   '5.11' => '5 ft 11 in',
	   '6.0' => '6 ft',
	   '6.1' => '6 ft 1 in',
	   '6.2' => '6 ft 2 in',
	   '6.3' => '6 ft 3 in',
	   '6.4' => '6 ft 4 in',
	   '6.5' => '6 ft 5 in',
	   '6.6' => '6 ft 6 in',
	   '6.7' => '6 ft 7 in',
	   '6.8' => '6 ft 8 in',
	   '6.9' => '6 ft 9 in',
	   '6.10' => '6 ft 10 in',
	   '6.11' => '6 ft 11 in',
	   '7.0' => '7 ft',
	   'More than 7.0' => 'More than 7 ft',
	  );
           echo $this->Form->input(
              'Matrimonial.height',
              array('label' => 'Height-Foot &amp; Inch:','options' => $height, 'default' => '','empty' => 'Choose Height')
         );?>        

       </div>
       <div class="col-md-6 col-sm-6 input-row">
        <?php echo $this->Form->input('Matrimonial.address', array('label' => 'Address:','div'=> array('class'=>'addressdiv'),'type' => 'textarea','default' => $address) ); ?>
       </div> 
       <div class="col-md-6 col-sm-6 input-row">
        <?php echo $this->Form->input('Matrimonial.city', array('label' => 'City:','div' => false,'placeholder' => 'City','default' => $city) ); ?>
       </div>      
       <div class="col-md-6 col-sm-6 input-row">
         <label>Select Country: </label> <select onchange="print_state('state', this.selectedIndex);" id="country" name ="country"></select>
       </div>
       <div class="col-md-6 col-sm-6 input-row">
        <label>State/District:</label><select name ="state" id ="state"></select>
        <script language="javascript">print_country("country");</script>
       </div>
       <div class="col-md-6 col-sm-6 input-row">
         <?php echo $this->Form->input('Matrimonial.zip', array('label' => 'Zip code:','div' => false,'placeholder' => 'Zip code','default' => $zip) ); ?>
       </div> 
            
       <div class="col-md-6 col-sm-6 input-row">
         <?php echo $this->Form->input('Matrimonial.contact_number', array('label' => 'Contact Number:','div' => false,'placeholder' => 'Contact Number','default' => $phone) ); ?>

        </div>      

      <div class="title-row"><strong>Register your Gotra</strong></div>

      <div class="col-md-6 col-sm-6 input-row">
       <?php  $gotra = array(
		'Airan/Aeron' => 'Airan/Aeron', 
		'Bansal' => 'Bansal', 
		'Bindal' => 'Bindal', 
		'Dharan' => 'Dharan', 
		'Garg' => 'Garg',
		'Goyal' => 'Goyal',
		'Gangal' => 'Gangal',
		'Jindal' => 'Jindal',
		'Jindal' => 'Jindal',
		'Kansal' => 'Kansal',
		'Kuchhal' => 'Kuchhal',
		'Madhukul' => 'Madhukul',
		'Mangal' => 'Mangal',
		'Mittal' => 'Mittal',
		'Nangal' => 'Nangal',
		'Singhal' => 'Singhal',
		'Tayal' => 'Tayal',
		'Tingal' => 'Tingal',
		);
           echo $this->Form->input(
              'Matrimonial.father_gotra',
              array('label' => 'Father Gotra:','options' => $gotra, 'default' => '','empty' => 'Choose Gotra')
         );?>

      </div>

      <div class="col-md-6 col-sm-6 input-row">
    <?php  $gotra = array(
		'Airan/Aeron' => 'Airan/Aeron', 
		'Bansal' => 'Bansal', 
		'Bindal' => 'Bindal', 
		'Dharan' => 'Dharan', 
		'Garg' => 'Garg',
		'Goyal' => 'Goyal',
		'Gangal' => 'Gangal',
		'Jindal' => 'Jindal',
		'Jindal' => 'Jindal',
		'Kansal' => 'Kansal',
		'Kuchhal' => 'Kuchhal',
		'Madhukul' => 'Madhukul',
		'Mangal' => 'Mangal',
		'Mittal' => 'Mittal',
		'Nangal' => 'Nangal',
		'Singhal' => 'Singhal',
		'Tayal' => 'Tayal',
		'Tingal' => 'Tingal',
		);
           echo $this->Form->input(
              'Matrimonial.mother_gotra',
              array('label' => 'Mother Gotra:','options' => $gotra, 'default' => '','empty' => 'Choose Gotra')
         );?>

      </div>

      <div class="col-md-6 col-sm-6 input-row">

       <?php  $gotra = array(
		'Airan/Aeron' => 'Airan/Aeron', 
		'Bansal' => 'Bansal', 
		'Bindal' => 'Bindal', 
		'Dharan' => 'Dharan', 
		'Garg' => 'Garg',
		'Goyal' => 'Goyal',
		'Gangal' => 'Gangal',
		'Jindal' => 'Jindal',
		'Jindal' => 'Jindal',
		'Kansal' => 'Kansal',
		'Kuchhal' => 'Kuchhal',
		'Madhukul' => 'Madhukul',
		'Mangal' => 'Mangal',
		'Mittal' => 'Mittal',
		'Nangal' => 'Nangal',
		'Singhal' => 'Singhal',
		'Tayal' => 'Tayal',
		'Tingal' => 'Tingal',
		);
           echo $this->Form->input(
              'Matrimonial.dadi_gotra',
              array('label' => 'Dadi Gotra:','options' => $gotra, 'default' => '','empty' => 'Choose Gotra')
         );?>

      </div>

      <div class="col-md-6 col-sm-6 input-row">
         <?php  $gotra = array(
		'Airan/Aeron' => 'Airan/Aeron', 
		'Bansal' => 'Bansal', 
		'Bindal' => 'Bindal', 
		'Dharan' => 'Dharan', 
		'Garg' => 'Garg',
		'Goyal' => 'Goyal',
		'Gangal' => 'Gangal',
		'Jindal' => 'Jindal',
		'Jindal' => 'Jindal',
		'Kansal' => 'Kansal',
		'Kuchhal' => 'Kuchhal',
		'Madhukul' => 'Madhukul',
		'Mangal' => 'Mangal',
		'Mittal' => 'Mittal',
		'Nangal' => 'Nangal',
		'Singhal' => 'Singhal',
		'Tayal' => 'Tayal',
		'Tingal' => 'Tingal',
		);
           echo $this->Form->input(
              'Matrimonial.Nani_gotra',
              array('label' => 'Nani Gotra:','options' => $gotra, 'default' => '','empty' => 'Choose Gotra')
         );?>
      </div>

       <div class="col-md-12 col-sm-12 input-row">
       <?php echo $this->Form->input(
              'profile_image', array('label' => 'Your Profile Photo: ','div' => array('style'=>'width:50%'),'type' => 'file'));?><div class='imageset'><img src='<?php echo $photoURL;?>'  /></div>

      </div>

      <div class="clear"></div>

       <div class="col-md-12 col-sm-12 input-row textarea">
        <?php echo $this->Form->input(
              'Matrimonial.profile_short_description', array('label' => 'About Your Profile Description :','type' => 'textarea','default'=>$description));?>

      </div>

      <div class="col-md-6 col-sm-6 input-row">
        <?php
		echo $this->Form->button('Register Now', array('type' => 'button','onclick'=> "this.form.submit();" ,'class'=>'register-btn btn'));
        echo $this->Form->end();?>
         </div>
   </div>
</div>
<?php } ?>
