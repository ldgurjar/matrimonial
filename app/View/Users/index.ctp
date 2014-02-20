<!-- app/View/Users/index.ctp -->
<div class="users form">
<?php /*echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));*/ ?>
<div class="text-center login-with-buttons">

        <button class="facebook" onclick="location.href='register.html'">Login with Facebook <span><?php echo $this->Html->image('facebook.png') ;?> &nbsp;</span>  </button>

        <div class="clear"></div>

        <button class="googlePluse" onclick="location.href='register.html'">Login with Google + <span><?php echo $this->Html->image('googleplus.png') ;?> &nbsp;</span></button>

        <div class="clear"></div>

        <button class="Linkedin" onclick="location.href='register.html'">Login with Linked In <span><?php echo $this->Html->image('linkedin.png') ;?> &nbsp;</span></button>

        <div class="clear"></div>

        <button class="Twitter" onclick="location.href='register.html'">Login with Twitter <span><?php echo $this->Html->image('twitter.png') ;?> &nbsp;</span></button>

      </div>
</div>