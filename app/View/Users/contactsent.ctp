<!-- app/View/Users/contactsent.ctp -->
<?php //echo $this->action;?>
<div class="middle-container">

    <h2 class="title">Contact Send Message List</h2>
     <div class="row">
      <section class="col-md-3 col-sm-3 col-sx-12">
          <div class="left-content-block">         
           <article class="myaccount-link">

            <h4>My Contacts</h4>
              <?php echo $this->Html->link(
					'Contacts Received ',
					'/users/contactreceived',
					array('class' => '')
				);
				echo $this->Html->link(
					'Contacts Sent '.$this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-chevron-right')),
					'/users/contactsent',
					array('class' => 'active','escape' => false)
				);
			  ?>

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

             <h3>Sent Messages</h3>

             <section class="row">

               <article class="col-md-10 col-sm-12 col-sx-12">
                <?php foreach($allmessagetolist as $aml){ ?>
                 <div class="conact-sent-message">

                  <figure class="profile-img">

                    <img class="img" src="<?php echo $aml['image_path'];?>" alt="">
                    <?php if($aml['web_message']=='') {?>
                    <span style="text-align:center"> SMS </span>
                    <?php }else{ ?>
                     <span style="text-align:center"> Email </span>
                    <?php }?>
                    
                  </figure>

                  <aside class="profile-desc">

                    <label class="user">To: <strong><?php echo $aml['user_full_name'];?></strong></label>
                    
                    <label class="mess-desc">Message: <?php  if($aml['web_message']==''){ echo $aml['sms_message']; }else{ echo $aml['web_message'];}?>

                    <br> <span class="date"><?php echo $aml['message_date_time'];?></span></label>

                  </aside>

                </div>
               <?php } ?>


              </article>

             </section>

            </div>

          </section>

        </div>
     </section>
</div>
</div>
