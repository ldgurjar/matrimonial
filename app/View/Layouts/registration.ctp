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
		echo $this->Html->css('style');
		echo $this->Html->css('bootstrap');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <?php echo $this->Html->css('comman');?>
    <?php echo $this->Html->script('countries3');?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="wrapper">
<header class="header">

  <section class="pre-login-header">

    <div class="container">

      <div class="row">

        <div class="col-md-offset-4 col-md-4 col-sm-4 col-sm-offset-4 text-center col-xs-8">

          <a class="logo" id="logo" href="#">&nbsp;</a>

        </div>

        <div class="col-md-4 col-sm-4 col-xs-4">

          <div class="pull-right pre-login-language-box">

            <select class="language">

              <option>English</option>

              <option>Hindi</option>

            </select>

          </div>
        </div>

      </div>

    </div>

    <div class="text-logo">

      <article class="text-center container">

        <a  id="textlogo" class="col-md-12 col-sm-12 col-xs-12" href="index.html">&nbsp;</a>

      </article>

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

