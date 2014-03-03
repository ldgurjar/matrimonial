<!-- app/View/Users/sendsms.ctp --> 
<?php  //print_r($thisuserdetail);
if(isset($thisuserdetail)){
?>
<style type="text/css">
.form .input-row{
	padding-left: 0;
}
.form .input-row textarea{
	margin-left:0%;
}
.form .input-row input{
	margin-left:0%;
}
.form .input-row label {
width: 100%;
text-align: left;
}
.form .input-row label.error{
	margin-left:0px;
}
.form .input-row label.valid{
	margin-left:0px;
}
</style>
<div class="middle-container">
    <h2 class="title"><?php echo $thisuserdetail['Matrimonial']['first_name'].' '.$thisuserdetail['Matrimonial']['last_name']; ?></h2>
    
    <div class="row">
      <section class="col-md-3 col-sm-3 col-sx-12">
        <div class="left-content-block">
          <figure class="user-img">
            <img src='<?php 
				if(!empty($thisuserdetail['PhotoCustomer'])){
					echo $thisuserdetail['PhotoCustomer'][0]['photo_path'];
				}else{
				   if($thisuserdetail['Matrimonial']['gender']==1){
						echo $this->webroot.'img/male.png';
				   }else{
						echo $this->webroot.'img/female.png';
				   }
				}?>' alt='<?php echo $thisuserdetail['Matrimonial']['first_name'];?>'/>
          </figure>
          <article class="myaccount-link send-message">
            <h4>Contact to him:</h4>
            <?php  echo $this->Html->link(
    'Send SMS '.$this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-chevron-right')),
     array('controller' => 'users', 'action' => 'sendsms', $thisuserdetail['User']['id']), array('class' => 'sms active','escape' => false));?>
           <?php  echo $this->Html->link(
    'Send E-mail',
     array('controller' => 'users', 'action' => 'sendmail', $thisuserdetail['User']['id']), array('class' => 'mail'));?>
          </article>
          <article class="myaccount-link social-link">
            <h4>Social Site Link:</h4>
           <?php if($loggedinuserprovider=="Facebook"){?>
                 <a class="facebook connect" href="<?php echo $thisuser['Matrimonial']['facebook_profile']; ?>" target="_blank">View Facebook Profile</a>
                <a class="twitter" href="<?php echo BASE_URL; ?>users/loginwith/twitter">Connect with Twitter</a>
                <a class="linkedin" href="<?php echo BASE_URL; ?>users/loginwith/linkedin"> Connect with Linkedin</a>
                <a class="linkedin" href="<?php echo BASE_URL; ?>users/loginwith/google"> Connect with Google</a>
            <?php } elseif($loggedinuserprovider=='Twitter'){ ?>
                <a class=" twitter connect" href="<?php echo $thisuser['Matrimonial']['twitter_profile']; ?>" target="_blank">View Twitter Profile</a>
                <a class="facebook" href="<?php echo BASE_URL; ?>users/loginwith/facebook">Connect with Facebbok</a>
                <a class="linkedin" href="<?php echo BASE_URL; ?>users/loginwith/linkedin"> Connect with Linkedin</a>
                <a class="linkedin" href="<?php echo BASE_URL; ?>users/loginwith/google"> Connect with Google</a>
            <?php } elseif($loggedinuserprovider=='Linkedin'){ ?>
                <a class=" twitter connect" href="<?php echo $thisuser['Matrimonial']['linkedin_profile']; ?>" target="_blank">View Linkedin Profile</a>
                <a class="facebook" href="<?php echo BASE_URL; ?>users/loginwith/facebook">Connect with Facebbok</a>
                <a class="twitter" href="<?php echo BASE_URL; ?>users/loginwith/twitter">Connect with Twitter</a>
                <a class="linkedin connect" href="<?php echo BASE_URL; ?>users/loginwith/google"> Connect with Google</a>
            <?php } elseif($loggedinuserprovider=='Google'){ ?>
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
          <section class="col-md-10 col-md-offset-1 col-sm-12 col-sx-12">
            <div class="send-sms-sectin send-message-section">
              <article>
               <img src="<?php echo $this->webroot; ?>img/add-468x60.jpg" alt="">
             </article>
             <?php 
             if($thisuserdetail['Matrimonial']['first_name']==1){
                 $hisher='his';
             }else{
				 $hisher='her';
             }  
			 ?>
             <h3>Sending Invite Message to <?php echo $hisher;?> Contact Number: <strong><?php  echo $this->Html->link(
    $thisuserdetail['Matrimonial']['first_name'].' '.$thisuserdetail['Matrimonial']['last_name'],
     array('controller' => 'users', 'action' => 'profiledetail', $thisuserdetail['User']['id']), array('class' => 'mail'));?></strong></h3>
             <p>
               <span class="red-text">Characters Limit is 200 Char. <br>You can send Email or SMS one time, can't send again for same user</span>
             </p>
               <?php 
			
			 //echo $error;
			 if(isset($msg)){
				    if($msg=='1__successfullysent'){?>
						<div class='alert alert-success'> You have sccessfuly sent SMS to <?php echo $thisuserdetail['Matrimonial']['first_name'].' '.$thisuserdetail['Matrimonial']['last_name'];?>.</div>
					<?php } else if($msg=='1__alreadysentemail'){?>
                   <div class='alert alert-danger'> You have already sent Email to <?php echo $thisuserdetail['Matrimonial']['first_name'].' '.$thisuserdetail['Matrimonial']['last_name'];?>.</div>
					<?php }else if($msg=='1__alreadysentsms'){?>
                   <div class='alert alert-danger'> You have already sent SMS to <?php echo $thisuserdetail['Matrimonial']['first_name'].' '.$thisuserdetail['Matrimonial']['last_name'];?>.</div>
					<?php }else if($msg=='1__wentwrong'){?>
                   <div class='alert alert-danger'> something went wrong.</div>
					<?php }
			 }else if(isset($error)){?>
				 <div class='alert alert-danger'><?php echo $error;?> </div> 
			 <?php }else{?>
             <div class="form">
              <?php echo $this->Form->create('User', array('action' => 'sendsms'.'/'.$thisuserdetail['Matrimonial']['user_id'],'id'=>'UserSendsmsForm')); ?>
              <?php echo $this->Form->input('sendsms.userid', array('type' => 'hidden','value' => $thisuserdetail['Matrimonial']['user_id']) ); ?>
              <div class="col-md-12 col-sm-6 input-row">
              <?php echo $this->Form->input(
              'sendsms.message', array('label' => 'Message:','type' => 'textarea','default'=>'','placeholder'=>'Type Your Message............','rows'=>4));?>
              </div><br/><br/>
               <div class="col-md-12 col-sm-6 input-row" style="margin-top:10px;">
              <?php echo $this->Form->button('Send Message', array('type' => 'submit' ,'class'=>'btn'));      echo $this->Form->end();
		      ?>
              </div>
              <?php } ?>
            </div>
          </section>
        </div>
        <div class="row"></div>
      </section>
    </div>
</div>
<?php } ?>
<script type="application/javascript" >
jQuery(document).ready(function(){
	jQuery('#UserSendsmsForm').validate({
	    rules: {
	     "data[sendsms][message]": {
	        required: true,
			maxlength: 200,
			minlength: 40
	      }
       },
	   messages: {
		   
			"data[sendsms][message]": {
				required: "Message is not empty.",
			}
		},
		highlight: function(element) {
				$(element).closest('.input-row').removeClass('success').addClass('error');
		},
		success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.input-row').removeClass('error').addClass('success');
		}
	  });
});
</script>