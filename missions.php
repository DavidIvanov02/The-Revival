<?php
   include 'core/init.php';
   include 'template/header.php';
   include 'template/navbar.php';
   
   $missions = $db->getAllMissions();
   ?>
<!-- Main Content -->
<section class="content-wrap">
<!-- Banner -->
<div class="youplay-banner youplay-banner-parallax banner-top" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
   <div class="image" style="background-image: url(&quot;<?php echo Base_url();?>layout/images/city/city_21.jpg&quot;); transform: translate3d(0px, 0px, 0px);">
   </div>
   <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
      <div>
         <div class="container">
            <h1>Мисии</h1>
         </div>
      </div>
   </div>
   <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100; transform: translateX(0px) translateY(0px);">
      <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 1262.81px; height: 1262.81px; overflow: hidden; pointer-events: none; margin-left: -0.09375px; margin-top: -356.406px; visibility: visible;"></div>
   </div>
</div>
<!-- /Banner -->
<div class="container youplay-store">
   <div class="col-md-9" style="width: 100%; margin-top: -40px;">
      <!-- Post Info -->
      <article>
         <h2 align="center" class="h1">Описание на мисиите</h2>
         
         <!-- Description -->
         <!-- Accordion -->
         <?php foreach($missions as $mission): ?>
         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="<?php echo $mission['heading']; ?>">
                  <h4 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $mission['collapse']; ?>" aria-expanded="true" aria-controls="<?php echo $mission['collapse']; ?>">
                     <?php echo $mission['mission_name'];?><span class="icon-plus"></span>
                     </a>
                  </h4>
               </div>
               <div id="<?php echo $mission['collapse']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $mission['heading']; ?>">
                   
                  
                  <div class="panel-body desc">
                     <?php echo $mission['mission_desc'];?>
                  </div>
                  
                  <div class="img">
                    <img src="<?php echo Base_url(); ?>layout/images/missions/<?php echo $mission['mission_img']; ?>" alt="Mission" />
                  </div>
               </div>
            </div>
         </div>
         <?php endforeach;?>
         <!-- /Accordion -->
         <!-- /Description -->
         
      </article>
      <!-- /Post Info -->
   </div>
</div>

<?php 
    include ("template/js.php");
    include ("template/footer.php");
?>