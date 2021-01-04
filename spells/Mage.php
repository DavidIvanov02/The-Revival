<?php
   include '../core/init.php';
   include '../template/header.php';
   include '../template/navbar.php';
   
   $hero = $db->getHero(2);
   $spells = $db->getSpellsForHero(2);
   ?>
<!-- Preloader -->
<div class="page-preloader preloader-wrapp" style="display: none;">
</div>
<!-- /Preloader -->
<!-- Main Content -->
<section class="content-wrap">
   <!-- Banner -->
   <div class="youplay-banner banner-top youplay-banner-parallax small" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
      <div class="image" style="background-image: url(&quot;<?php echo Base_url();?>layout/images/heroes/Mage_2.png&quot;); transform: translate3d(0px, 0px, 0px);">
      </div>
      <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
         <div>
            <div class="container">
               <h1>Магьосник</h1>
            </div>
         </div>
      </div>
      <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100; transform: translateX(0px) translateY(0px);">
         <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 1262.81px; height: 1262.81px; overflow: hidden; pointer-events: none; margin-left: -0.09375px; margin-top: -406.406px; visibility: visible;"></div>
      </div>
   </div>
   <!-- /Banner -->
   <div class="container youplay-content">
      <h2 class="mt-0">Магии</h2>
      <div class="col-md-9">
         <ul class="pagination pagination-sm mt-0">
            <li>
               <a href="<?php echo Base_url();?>spells/Assassin/">Асасин</a>
            </li>
            <li>
               <a href="<?php echo Base_url();?>spells/Fighter/">Войн</a>
            </li>
         </ul>
      </div>
      <div class="container youplay-news">
         <!-- News List -->
         <div class="col-md-9">
            <?php foreach($spells as $spell): ?>
            <!-- Single News Block -->
            <div class="news-one">
               <div class="row vertical-gutter">
                  <div class="col-md-4">
                     <a class="angled-img">
                        <div class="img">
                           <img src="<?php echo Base_url(); ?>layout/images/spells/Mage/<?php echo $spell['spell_img']; ?>" alt="Hero" height="150" width="150"/>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-8">
                     <div class="clearfix">
                        <h3 class="h2 pull-left m-0"><?php echo $spell['spell_name'];?></h3>
                     </div>
                     <br>
                     <div class="desc-color">
                        <?php echo $spell['spell_cost'];?>
                        <br>
                        <?php echo $spell['spell_cooldown'];?>
                     </div>
                     <br>
                     <div class="desc">
                        <?php echo $spell['spell_desc'];?>
                     </div>
                     <br>
                     
                     <div id="video">
                        <iframe width="560" height="315" src="<?php echo $spell['spell_video'];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                  </div>
               </div>
            </div>
            <!-- /Single News Block -->
            <?php endforeach;?>
         </div>
      </div>
   </div>
</section>
<!-- /Main Content -->
<?php
   include '../template/js.php';
   include '../template/footer.php';
?>