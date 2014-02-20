<!--//app/View/Users/login.ctp-->

<div class="users form">

<?php 
echo $this->Session->flash('auth');
/*if( isset( $error ) ){
		debug( $error );
}*/
if( isset( $user_profile ) ){
		debug( $user_profile );
}	
//print_r($user_profile);
//echo h($user_profile['User']['first_name']);
//echo $this->Facebook->signin(__('Sigin in with Facebook account'));

//echo $this->Session->flash('auth'); ?>
<?php /*echo $this->Form->create('User'); ?>
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