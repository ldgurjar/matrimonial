<!-- app/View/Users/idvarifaction.ctp -->
<div class="middle-container">

    <h2 class="title">ID Proff Varifaction</h2>

    <div class="title-row">

      <p>Please upload your any ID Proof ( Voter ID, Licence, PAN card, Aadhaar Cardd and any other ID proof). This Id Proof is required for Your Introduction Security. </p>

    </div>
<?php echo $this->Form->create('User', array('type' => 'file','action' => 'idvarifaction')); ?>
<?php echo $this->Form->input('user_id_new', array('type' => 'hidden','value' => $newuserid)); ?>
    <div class="form">

      <div class="col-md-6 col-sm-6 input-row">

         <?php echo $this->Form->input('identity_image', array('label' => 'Upload Your ID:  ','type' => 'file'));?>

        <span class="required">Upload file as a jpg, png, gif, pdf and word file.</span>

      </div>

      <div class="clear"></div>

      <div class="col-md-6 col-sm-6 input-row">

        <?php  echo $this->Form->button('Submit', array('type' => 'submit' ,'class'=>'register-btn btn'));
        echo $this->Form->end(); ?>
      </div>

    </div>
	

   <!-- <div class="successful">

      Congratulation for Successful your Registration, Your Id Proof is submitted. 

Shaadi Azurewebsites will send Your User Login and Password on your Email id/mobile no. Then you will login and will search your life partner.

    </div>-->

    <br>

  </div>
<script type="application/javascript" >
jQuery(document).ready(function(){
  jQuery('#UserIdvarifactionForm').validate({
      rules: {
        "data[User][identity_image]": {
		     required: true,
	         accept: "jpg,jpeg,png,gif,pdf,docx,doc"
	      },
    },
     messages: {
        "data[User][identity_image]": {
             required: "Please upload ID Proof.",
			 accept: "Please upload valid format."
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