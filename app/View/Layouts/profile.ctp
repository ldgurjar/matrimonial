<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('style');
		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <?php //echo $this->Html->css('comman');?>
    <?php //echo $this->Html->script('countries3'); ?>
    <?php echo $this->Html->script('comman'); ?>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <?php echo $this->Html->script('bootstrap.min');?>
    <?php echo $this->Html->script('jquery.validate.min');?>
    <?php echo $this->Html->script('jquery.timepicker');?>
    <?php echo $this->Html->css('jquery.timepicker');?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css" >
#UserProfilesearchlistingForm{
	margin-bottom:0px;
}
</style>    
</head>
<body>
<div class="wrapper">
<header class="header">

  <section class="post-login-header">

    <div class="container">

      <div class="row">

        <div class="col-md-7 col-sm-7 col-sx-12">

          <a class="logo" href="<?php echo $this->html->url('/users/profile', true);?>"> <img src="<?php echo $this->webroot; ?>img/post-login-header-logo.png" alt=""></a>

        </div>

        <div class="col-md-5 col-sm-5 col-sx-12">
<?php //print_r($thisuser);?>
          <div class="login-user-detaile">

            <figure class="user-img"> <img src='<?php 
		if(!empty($thisuser['PhotoCustomer'])){
		    echo $thisuser['PhotoCustomer'][0]['photo_path'];
		}else{
		   if($thisuser['Matrimonial']['gender']==1){
		        echo $this->webroot.'img/male.png';
		   }else{
			    echo $this->webroot.'img/female.png';
		   }
		}?>' alt='<?php echo $thisuser['Matrimonial']['first_name'];?>'/></figure>

            <div class="user-detail">

              <div class="user-name">Welcome to <a href="<?php echo $this->html->url('/users/profile', true);?>"><?php echo $thisuser['Matrimonial']['first_name']; ?></a></div>

              <div class="post-login-popupbox">

                <a class="link">My Account <span class="glyphicon glyphicon-chevron-down"></span></a>

                <div class="dropdown-menu">

                  <a href="<?php echo $this->html->url('/users/profile', true);?>">View Profile</a>

                  <a href="<?php echo $this->html->url('/users/editprofile/'.$thisuser['User']['id'], true);?>">Profile Edit</a>

                  <a href="<?php echo $this->html->url('/users/logout', true);?>">Log Out</a>

                </div>

              </div>

              <div class="pull-right">

                <select class="language">

                  <option>English</option>

                  <option>Hindi</option>

                </select>

              </div>

            </div> 

          </div>

        </div>

      </div>

    </div>

    <div class="top-navbg">

      <div class="container">

        <div class="row">

          <nav class="col-md-5 col-sm-5 col-sx-12">

            <ul class="navigation">

              <li><?php  echo $this->Html->link(
				'Contacts Received',
				 array('controller' => 'users', 'action' => 'contactreceived')
			); ?></li>
                <li><?php  echo $this->Html->link(
				'Contacts Sent',
				 array('controller' => 'users', 'action' => 'contactsent')
			); ?></li>
              </ul>

          </nav>

          <article  class="col-md-7 col-sm-7 col-sx-12">
              <?php echo $this->Form->create('User', array('action' => 'profilesearchlisting')); ?>
            <div class="search-block">

              <label class="search-label">Search <span class="hide-xs"><?php  if($thisuser['Matrimonial']['gender']==1){ ?>Bride by <?php }else{ ?>Groom by <?php } ?></span>: </label>

              <div class="input-search">
                
                <!--<input class="search-input" type="text" placeholder="Location, Caste, Gotra, and Education .........">-->
                <?php echo $this->Form->input('s', array('label' => false,'div' => false,'placeholder' => 'Location, Caste, Gotra, and Education .........', 'class'=>'search-input') ); ?>

                <!--<button class="serch-btn" onclick="location.href=' profile-search-listing.html'">&nbsp;</button>-->
              <?php  echo $this->Form->button('Search', array('type' => 'submit' ,'class'=>'serch-btn'));
               echo $this->Form->end(); ?>

              </div>

            </div>
             

          </article>

        </div>

      </div>

    </div>

  </section>
</header>
<section class="middle-part container">
   <div class="row">
      <article class="col-md-12">
      <?php echo $this->Session->flash(); ?>
      <?php echo $this->fetch('content'); ?>
      </article>
   </div>

</section>
<footer class="footer">

  <section class="footer-bg">

    <div class="container">

      <div class="row">

        <article class="col-md-8 col-xs-12 col-sm-8">

          <p class="copyrithtext">Copyright &copy; 2013 Shaadi Azurewebsites.net.  All rights reserved.</p>

        </article>

        <article class="col-md-4 col-xs-12 col-sm-4">

          <p class="socil-link">           

            <a class="twitter" href="#">&nbsp;</a>

             <a class="facebook" href="#">&nbsp;</a>

          </p>

        </article>

      </div>

    </div>

  </section>   

</footer>
</div>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>

