<!-- app/View/Users/contactsent.ctp -->
<div class="middle-container">

    <h2 class="title">Contact Received Message List</h2>
    <div class="row">
     <section class="col-md-3 col-sm-3 col-sx-12">
         <div class="left-content-block">         

          <article class="myaccount-link">

            <h4>My Contacts</h4>
            <?php echo $this->Html->link(
					'Contacts Received '.$this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-chevron-right')),
					'/users/contactreceived',
					array('class' => 'active','escape' => false)
					
				);
				echo $this->Html->link(
					'Contacts Sent ',
					'/users/contactsent',
					array('class' => '')
					
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

               <img src="<?php echo $this->webroot;?>img/add-468x60.jpg" alt="">

             </article>

             <h3>Received Messages</h3>

             <section class="row">

               <article class="col-md-10 col-sm-12 col-sx-12">

               <?php foreach($allmessagefromlist as $aml){ ?>
                 <div class="conact-sent-message">

                  <figure class="profile-img">

                    <img class="img" src="<?php echo $aml['image_path'];?>" alt="userimage">
                    <?php if($aml['web_message']=='') {?>
                    <span style="text-align:center"> SMS </span>
                    <?php }else{ ?>
                     <span style="text-align:center"> Email </span>
                    <?php }?> 
                  </figure>
                  <aside class="profile-desc">

                    <label class="user">From: <strong><?php echo $aml['user_full_name'];?></strong></label>

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
