<?php
    include 'core/init.php';
    include 'template/header.php';
    include 'template/navbar.php';
    
    $id = 1;
        if(isset($_GET['id'])){
            if(is_numeric($_GET['id'])){
            $id = (int) $_GET['id'];
        }}
    
    $new = $db->getNews($id);
    
?>
    
    <!-- Main Content -->
    <section class="content-wrap">

        <!-- Banner -->
        <div class="youplay-banner banner-top youplay-banner-parallax small" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
            <div class="image" style="background-image: url(&quot;<?php echo Base_url();?>layout/images/pages/news.png&quot;); transform: translate3d(0px, 0px, 0px);">
            </div>

            <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
                <div>
                    <div class="container">
                        <h1><?=$new['news_name']?></h1>
                    </div>
                </div>
            </div>

            <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100; transform: translateX(0px) translateY(0px);">
                <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 1262.81px; height: 1262.81px; overflow: hidden; pointer-events: none; margin-left: -0.09375px; margin-top: -406.406px; visibility: visible;"></div>
            </div>
        </div>

        <!-- /Banner -->

        <!-- Main Content -->
        <div class="container youplay-content">
            
            <?php if($new): ?>
            
            <div class="row">
                <div class="col-md-4">
                    <a class="angled-img">
                        <div class="img">
                            <img src="<?php echo Base_url(); ?>layout/images/news/<?php echo $new['news_img']; ?>" alt="New" />
                        </div>
                    </a>
                </div>
                
                <div class="col-md-8">
                    <h3 align="center"><?=$new['news_name']?></h3>
                    <p><?=$new['news_longDesc']?></p>
                </div>
                </div>
                
                
            </div>
            
            <?php else: ?>
                    <h4 align="center">Не е открита новината, която потърсихте.</h4>
            <?php endif; ?>

        </div>

        <!-- /Main Content -->

    </section>
    <!-- /Main Content -->
<?php 
    include 'template/js.php';
    include 'template/footer.php';
?>