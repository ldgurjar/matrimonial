<!-- app/View/Users/profile.ctp -->
<?php //print_r($thisuser);?>
<div class="middle-container">
      <h2 class="title"><?php echo $thisuser['Matrimonial']['first_name'].' '.$thisuser['Matrimonial']['last_name']; ?></h2>
     <div class="row">
      <section class="col-md-3 col-sm-3 col-sx-12">
       <div class="left-content-block">
         <figure class="user-img">

            <img src='<?php 
				if(!empty($thisuser['PhotoCustomer'])){
					echo $thisuser['PhotoCustomer'][0]['photo_path'];
				}else{
				   if($thisuser['Matrimonial']['gender']==1){
						echo $this->webroot.'img/male.png';
				   }else{
						echo $this->webroot.'img/female.png';
				   }
				}?>' alt='<?php echo $thisuser['Matrimonial']['first_name'];?>'/>          </figure>
          <article class="myaccount-link">

            <h4>My Account:</h4>
            <?php  
		    echo $this->Html->link(
				'My Profile '.$this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-chevron-right')),
				 array('controller' => 'users', 'action' => 'profile'),array('class' => 'active','escape' => false)
			); 
		   echo $this->Html->link(
    'Edit Profile',
     array('controller' => 'users', 'action' => 'editprofile', $thisuser['User']['id'])
); ?>

          </article>

          <article class="myaccount-link social-link">

            <h4>Social Site Link:</h4>
            <?php if($thisuserprovider=="Facebook"){?>
                 <a class="facebook connect" href="<?php echo $thisuser['Matrimonial']['facebook_profile']; ?>" target="_blank">View Facebook Profile</a>
                <a class="twitter" href="<?php echo BASE_URL; ?>users/loginwith/twitter">Connect with Twitter</a>
                <a class="linkedin" href="<?php echo BASE_URL; ?>users/loginwith/linkedin"> Connect with Linkedin</a>
                <a class="linkedin" href="<?php echo BASE_URL; ?>users/loginwith/google"> Connect with Google</a>
            <?php } elseif($thisuserprovider=='Twitter'){ ?>
                <a class=" twitter connect" href="<?php echo $thisuser['Matrimonial']['twitter_profile']; ?>" target="_blank">View Twitter Profile</a>
                <a class="facebook" href="<?php echo BASE_URL; ?>users/loginwith/facebook">Connect with Facebbok</a>
                <a class="linkedin" href="<?php echo BASE_URL; ?>users/loginwith/linkedin"> Connect with Linkedin</a>
                <a class="linkedin" href="<?php echo BASE_URL; ?>users/loginwith/google"> Connect with Google</a>
            <?php } elseif($thisuserprovider=='Linkedin'){ ?>
                <a class=" twitter connect" href="<?php echo $thisuser['Matrimonial']['linkedin_profile']; ?>" target="_blank">View Linkedin Profile</a>
                <a class="facebook" href="<?php echo BASE_URL; ?>users/loginwith/facebook">Connect with Facebbok</a>
                <a class="twitter" href="<?php echo BASE_URL; ?>users/loginwith/twitter">Connect with Twitter</a>
                <a class="linkedin connect" href="<?php echo BASE_URL; ?>users/loginwith/google"> Connect with Google</a>
            <?php } elseif($thisuserprovider=='Google'){ ?>
                <a class="linkedin connect" href="<?php echo $thisuser['Matrimonial']['google_profile']; ?>" target="_blank">View Google Profile</a>
                <a class="facebook" href="<?php echo BASE_URL; ?>users/loginwith/facebook">Connect with Facebbok</a>
                <a class="linkedin" href="<?php echo BASE_URL; ?>users/loginwith/linkedin"> Connect with Linkedin</a>
                 <a class="twitter" href="<?php echo BASE_URL; ?>users/loginwith/twitter">Connect with Twitter</a>
               
            <?php } ?>
          </article>

        </div>

      </section>

      <section class="col-md-9 col-sm-9 col-sx-12">

        <div class="row">

          <article class="col-md-6 col-sm-6 col-sx-12">

              <div class="user-info-row">

                <label class="title">Education:</label>

                <label class="desc"><?php echo $thisuser['Matrimonial']['education']; ?></label>

              </div>

              <div class="user-info-row">

                <label class="title">Occupation:</label>

                <label class="desc"><?php echo $thisuser['Matrimonial']['profession']; ?></label>

              </div>

              <div class="user-info-row">

                <label class="title">Salery:</label>

                <label class="desc"><?php echo $thisuser['Matrimonial']['salary']; ?></label>

              </div>

              <div class="user-info-row">

                <label class="title">Family Member:  </label>

                <label class="desc">  <?php echo $thisuser['Matrimonial']['number_of_brothers']; ?> Brother, &nbsp; <?php echo $thisuser['Matrimonial']['number_of_sisters']; ?> Sister</label>

              </div>

              <div class="user-info-row">

                <label class="title">Height:  </label>

                <label class="desc">  <?php 
				if(!empty($thisuser['Matrimonial']['height'])){
				$height= explode('.',$thisuser['Matrimonial']['height']); echo $height[0].' Foot &'.$height[1].' Inch'; }?></label>

              </div>

              <div class="user-info-row">

                <label class="title">Age:  </label>

                <label class="desc">  
				<?php $dob= $thisuser['Matrimonial']['date_of_birth'];
				
				$date1 = strtotime($dob);
				
				$date2 = strtotime(date('Y-m-d'));
				
				$time_difference = $date2 - $date1;
				
				$seconds_per_year = 60*60*24*365;
				$years = round($time_difference / $seconds_per_year);
				
				echo $years; ?> Years</label>

              </div>

              <div class="user-info-row">

                <label class="title">Caste:  </label>

                <label class="desc"> <?php echo $thisuser['Matrimonial']['caste'];?></label>

              </div>

              <div class="user-info-row">

                <label class="title">Location:  </label>

                <label class="desc"><?php echo $thisusercity;?><?php echo '/'.$thisuserstate;?><br/><?php echo $thisusercountry;?></label>

              </div>

          </article>

          <article class="col-md-6 col-sm-6 col-sx-12">

              <div class="user-info-row">

                <label class="title">Father Name:</label>

                <label class="desc"> <?php echo $thisuser['Matrimonial']['father_name'];?></label>

              </div>

              <div class="user-info-row">

                <label class="title">Mother Name:</label>

                <label class="desc"><?php echo $thisuser['Matrimonial']['mother_name'];?></label>

              </div>

              <div class="user-info-row">

                <label class="title">Contact Number:</label>

                <label class="desc"><?php echo $thisuser['Matrimonial']['contact_number'];?></label>

              </div>

              <div class="user-info-row">

                <label class="title">Father Gotra:</label>

                <label class="desc"><?php echo $thisuser['Matrimonial']['father_gotra'];?></label>

              </div>

              <div class="user-info-row">

                <label class="title">Mother Gotra:</label>

                <label class="desc"><?php echo $thisuser['Matrimonial']['mother_gotra'];?></label>

              </div>

              <div class="user-info-row">

                <label class="title">Dadi Gotra:</label>

                <label class="desc"><?php echo $thisuser['Matrimonial']['dadi_gotra'];?></label>

              </div>

              <div class="user-info-row">

                <label class="title">Nani Gotra:</label>

                <label class="desc"><?php echo $thisuser['Matrimonial']['nani_gotra'];?></label>

              </div>

          </article>

          <section class="col-md-12 col-sm-12 col-sx-12">

            <div class="user-info-desc">

               <label class="title">About My Profile:</label>

                <p class="desc"><?php echo $thisuser['Matrimonial']['profile_short_description'];?></p>

            </div> 

          </section>

        </div>

        <div class="row"></div>

      </section>

    </div>
</div>
