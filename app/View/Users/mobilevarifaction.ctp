<!-- app/View/Users/mobilevarifaction.ctp -->
<?php 
echo $this->Session->flash('auth');?>
<div class="middle-container">

    <h2 class="title">Mobile varifaction</h2>

    <div class="title-row">
	<?php if(isset($error)){ ?>
      <div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a> <?php echo $error;?> </div>  
	  <?php } ?>
      <p>Please enter a your mobile verification code. If not get verification sms on you mobile then <a htef='#' >click here</a> to update your phone number.</p>

    </div>
<?php echo $this->Form->create('User', array('action' => 'mobilevarifaction')); ?>
<?php echo $this->Form->input('user_id_new', array('type' => 'hidden','value' => $newuserid)); ?>
    <div class="form">

      <div class="col-md-6 col-sm-6 input-row">
       <?php echo $this->Form->input('verificationcode', array('label' => 'Unique Code:','placeholder' => 'Type your verification code','default' => '') ); ?><em>[default we are taking '123456']</em>
       </div>

      <div class="clear"></div>

      <div class="col-md-6 col-sm-6 input-row">

       <?php  echo $this->Form->button('Verify Code', array('type' => 'submit' ,'class'=>'register-btn btn'));
        echo $this->Form->end(); ?>
     </div>
  </div>
</div>
<script type="application/javascript" >
jQuery(document).ready(function(){
  jQuery('#UserMobilevarifactionForm').validate({
      rules: {
        "data[User][verificationcode]": {
          required: true,
		  minlength:6
        },
    },
     messages: {
        "data[User][verificationcode]": {
             required: "This is required, Please fill right verification code."
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