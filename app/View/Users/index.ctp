<!--//app/View/Users/index.ctp-->
<div class="login-button-div"> 
<!--<a href="loginwith/facebook" class="zocial facebook">Login with Facebook</a> 
<a href="loginwith/twitter" class="zocial twitter">Login with Twitter</a>--> 
</div> 
<div class="text-center login-with-buttons">

        <button class="facebook" onclick="location.href='<?php echo BASE_URL; ?>users/loginwith/facebook'">Login with Facebook <span><?php echo $this->Html->image('facebook.png') ;?> &nbsp;</span>  </button> 

        <div class="clear"></div>

        <button class="googlePluse" onclick="location.href='<?php echo BASE_URL; ?>users/loginwith/google'">Login with Google + <span><?php echo $this->Html->image('googleplus.png') ;?> &nbsp;</span></button>

        <div class="clear"></div>

        <button class="Linkedin" onclick="location.href='<?php echo BASE_URL; ?>users/loginwith/linkedin'">Login with Linked In <span><?php echo $this->Html->image('linkedin.png') ;?> &nbsp;</span></button>

        <div class="clear"></div>

        <button class="Twitter" onclick="location.href='<?php echo BASE_URL; ?>users/loginwith/twitter'">Login with Twitter <span><?php echo $this->Html->image('twitter.png') ;?> &nbsp;</span></button>
</div>