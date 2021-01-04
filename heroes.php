<?php
   include 'core/init.php';
   include 'template/header.php';
   include 'template/navbar.php';

   $heroes = $db->getAllHeroes();
?>
   
    <!-- Main Content -->
    <section class="content-wrap">
        <!-- Banner -->
        <div class="youplay-banner banner-top youplay-banner-parallax small" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
            <div class="image" style="background-image: url(&quot;<?php echo Base_url();?>layout/images/heroes/Heroes.png&quot;); transform: translate3d(0px, 0px, 0px);">
            </div>
            <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
                <div>
                    <div class="container">
                        <h1>Герои</h1>
                    </div>
                </div>
            </div>
            <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100; transform: translateX(0px) translateY(0px);">
                <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 1262.81px; height: 1262.81px; overflow: hidden; pointer-events: none; margin-left: -0.09375px; margin-top: -406.406px; visibility: visible;"></div>
            </div>
        </div>
        <!-- /Banner -->

        <div class="container youplay-news">

            <div class="col-md-9">
                <?php foreach($heroes as $hero): ?>
                    <!-- Single Block -->
                    <div class="news-one">
                        <div class="row vertical-gutter">
                            <div class="col-md-4">
                                <a class="angled-img">
                                    <div class="img">
                                        <img src="<?php echo Base_url(); ?>layout/images/heroes/<?php echo $hero['hero_img']; ?>" alt="Hero" />
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-8">

                                <div class="clearfix">
                                    <h3 class="h2 pull-left m-0"><?php echo $hero['hero_name'];?></h3>
                                </div>
                                
        
                                <div class="desc">
                                    <?php echo $hero['hero_desc'];?>
                                </div>

                                <div id="nav-spells">
                                    <a href="<?php echo Base_url();?>spells/<?php echo $hero['hero_spells']?>/" class="btn btn-primary">Магии</a>
                                </div>
                                
                                <!-- Progress Bars -->
                                <h4 class="h4"><b><i>Статистики:</i></b></h4>
                                
                                Скорост на атака:<div class="progress">
                                  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $hero['hero_attack_speed']?>">
                                  </div>
                                </div>
                                
                                Енергия:<div class="progress">
                                  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $hero['hero_energy']?>">
                                  </div>
                                </div>
                                
                                Защита:<div class="progress">
                                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $hero['hero_armour']?>">
                                  </div>
                                </div>
                                
                                Атака:<div class="progress">
                                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $hero['hero_damage']?>">
                                  </div>
                                </div>
                                
                                Кръв:<div class="progress">
                                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $hero['hero_health']?>">
                                  </div>
                                </div>
                                <!-- /Progress Bars -->
        
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <br>
                        <!-- /Single Block -->

            </div>
        </div>
    </section>
    <!-- /Main Content -->
<?php 
    include ("template/js.php");
    include ("template/footer.php");
?>