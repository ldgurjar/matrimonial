<!-- app/View/Users/mobilevarifaction.ctp -->
<div class="middle-container">

    <h2 class="title">Our Privacy Policy</h2>
      <?php if(isset($error)){ ?>
      <div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a>          <?php echo $error;?> </div>  
	  <?php } ?>
    <div class="content-row">

      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </p>

    </div>
     <?php echo $this->Form->create('User', array('action' => 'privacypolicy'));  echo $this->Form->input('user_id_new', array('type' => 'hidden','value' => $newuserid)); ?>
    <div class="form">

      <div class="col-md-10 col-sm-10 input-checkbox">
           <?php echo $this->Form->input('policycheck', array('type' => 'checkbox','label'=>'I am Agree with this Privacy Policy.'));?>      </div>

      <div class="clear"></div>

      <div class="col-md-6 col-sm-6 input-row">
        <?php  echo $this->Form->button('Agree', array('type' => 'submit' ,'class'=>'register-btn btn', 'style'=>'margin-left:0px;'));
        echo $this->Form->end(); ?>
       </div>

    </div>
</div>
<script type="application/javascript" >
jQuery(document).ready(function(){
  jQuery('#UserPrivacypolicyForm').validate({
      rules: {
        "data[User][policycheck]": {
          required: true
		},
    },
     messages: {
        "data[User][policycheck]": {
             required: "Please check box on."
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