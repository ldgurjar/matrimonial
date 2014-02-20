<!--//app/View/Users/login.ctp-->

<div class="users form">
<div class="login-button-div"> 
<!--<a href="loginwith/facebook" class="zocial facebook">Login with Facebook</a> 
<a href="loginwith/twitter" class="zocial twitter">Login with Twitter</a>--> 
</div> 
<div class="text-center login-with-buttons">

        <button class="facebook" onclick="location.href='http://vervelogicshowcase.com/users/loginwith/facebook'">Login with Facebook <span><?php echo $this->Html->image('facebook.png') ;?> &nbsp;</span>  </button> 

        <div class="clear"></div>

        <button class="googlePluse" onclick="location.href='http://vervelogicshowcase.com/users/loginwith/google'">Login with Google + <span><?php echo $this->Html->image('googleplus.png') ;?> &nbsp;</span></button>

        <div class="clear"></div>

        <button class="Linkedin" onclick="location.href='http://vervelogicshowcase.com/users/loginwith/linkedin'">Login with Linked In <span><?php echo $this->Html->image('linkedin.png') ;?> &nbsp;</span></button>

        <div class="clear"></div>

        <button class="Twitter" onclick="location.href='http://vervelogicshowcase.com/users/loginwith/twitter'">Login with Twitter <span><?php echo $this->Html->image('twitter.png') ;?> &nbsp;</span></button>

      </div>
<?php 
//echo $this->Facebook->signin(__('Sigin in with Facebook account'));

/*echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login'));*/


 ?>
</div>