<!-- app/View/Users/profilesearchlisting.ctp -->
<?php if(isset($userresults)){ ?>
<div class="middle-container">
  <h2 class="title"><?php  if($thisuser['Matrimonial']['gender']==1){ ?>Bride by <?php }else{ ?>Groom by <?php } ?> Profile Listing - <span class="search-text">Searching text 

    <strong> &#8220;<?php echo $searchstr;?>&#8221;</strong> </span></h2>
    <div class="row">

      <section class="col-md-3 col-sm-3 col-sx-12">

        <div class="left-content-block">

         <article class="advertisement">

           <span class="hide-xs"><img src="<?php echo $this->webroot; ?>img/add-160x600.jpg" alt=""></span>

           <span class="show-only-xs"><img src="<?php echo $this->webroot; ?>img/add-468x60.jpg" alt=""></span>

         </article>

        </div>

      </section>

      <section class="col-md-9 col-sm-9 col-sx-12">
          <?php if(!empty($userresults)){?>
            <div class="row">
            <?php foreach($userresults as $ur){ ?> 
                 <article class="col-md-6 col-sm-6 col-sx-12">
    
                  <div class="search-profile-block">
    
                    <figure class="profile-img">
                         <img class="img" src="<?php echo $ur['PhotoCustomer'][0]['photo_path'];?>" alt="<?php echo $ur['Matri']['first_name'];?>">
    
                      <span class="profile-detail"><?php  echo $this->Html->link(
                                'View Detail',
                                 array('controller' => 'users', 'action' => 'profiledetail/'.$ur['User']['id'])
                            );
                      ?></span>
    
                    </figure>
    
                    <aside class="profile-desc">
    
                      <p class="desc-row">
    
                        <label class="user-name"><?php  echo $this->Html->link(
                                $ur['Matri']['first_name'].' '.$ur['Matri']['last_name'],
                                 array('controller' => 'users', 'action' => 'profiledetail/'.$ur['User']['id'])
                            );?></label>
    
                      </p>
    
                      <p class="desc-row">
    
                        <label class="title">Age:</label>
    
                        <label class="desc"><?php 
                    $dob= $ur['Matri']['date_of_birth'];
                    $date1 = strtotime($dob);
                    $date2 = strtotime(date('Y-m-d'));
                    $time_difference = $date2 - $date1;
                    $seconds_per_year = 60*60*24*365;
                    $years = round($time_difference / $seconds_per_year);
                    
                    echo $years;?></label>
    
                      </p>
    
                       <p class="desc-row">
    
                        <label class="title">Caste:</label>
    
                        <label class="desc"><?php echo $ur['Matri']['caste']; ?></label>
    
                      </p>
    
                       <p class="desc-row">
    
                        <label class="title">Occupation:</label>
    
                        <label class="desc"><?php echo $ur['Matri']['profession']; ?></label>
    
                      </p>
    
                       <p class="desc-row">
    
                        <label class="title">Location:</label>
    
                        <label class="desc"><?php echo $ur['City']['city_name']; ?><?php echo '/'.$ur['State']['state_name']; ?><br/><?php echo $ur['Country']['country_name_en_us']; ?></label>
    
                      </p>
    
                    </aside>
                  </div>
                </article>
            <?php }?>
            </div> 
         <?php }else{?>
         <div class='alert alert-success'> No Recod Found.</div>
		 <?php } ?>
       </section>
   </div>
</div>
<?php }else{?>
<div class="middle-container">
<h2 class="title"><?php  if($thisuser['Matrimonial']['gender']==1){ ?>Bride by <?php }else{ ?>Groom by <?php } ?> Profile Listing - <span class="search-text">Searching text <strong> &#8220;&#8221;</strong> </span></h2>
    <div class="row">

      <section class="col-md-3 col-sm-3 col-sx-12">

        <div class="left-content-block">

         <article class="advertisement">

           <span class="hide-xs"><img src="<?php echo $this->webroot; ?>img/add-160x600.jpg" alt=""></span>

           <span class="show-only-xs"><img src="<?php echo $this->webroot; ?>img/add-468x60.jpg" alt=""></span>

         </article>

        </div>
       </section>
       <section class="col-md-9 col-sm-9 col-sx-12">
       <div class='alert alert-success' style='margin-top:30px;'><a class='close' data-dismiss='alert'>×</a> Your Search String is Null, Please try again.</div>	
      </section>
   </div>
</div>
<?php }?>
