<?php 
    include ("../core/init.php");
    
        
    if(!isset($logged_user['access_token']))
    {
        header("Location: https://revival.noit.eu/index/");
        exit();
    }
    
    
    include ("../template/header.php");
    include ("../template/navbar.php");
    
?>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDAA_Ogp5qg7UNLqyU2cQpNLGp3DQc1wk"></script>
<script type="text/javascript" src="<?php echo Base_url();?>js/map.js"></script>

<!-- Main Content -->
<section class="content-wrap">

	<!-- Banner -->
	<div class="youplay-banner banner-top youplay-banner-parallax small" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
		<div class="image" style="background-image: url(&quot;<?php echo Base_url();?>layout/images/city/city_1.jpg&quot;); transform: translate3d(0px, 0px, 0px);">
		</div>


		<div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
			<div>
				<div class="container youplay-user">
					<a class="angled-img image-popup">
						<div class="img">
                            <?php
        				if($logged_user['selected_hero'] == 0)
        				{
        				   ?>
        				   <img src="<?php echo Base_url();?>layout/avatar.jpg" height="151" alt="">
        				   <?php 
        				   
        				}
        				if($logged_user['selected_hero'] == 1)
        				{
        				    ?>
        				    <img src="<?php echo Base_url();?>layout/images/heroes/Assasin.png" height="151" alt="">
        				    <?php
        				}
        				?>
        				    <?php
        				if($logged_user['selected_hero'] == 2)
        				{
        				   ?>
        				   <img src="<?php echo Base_url();?>layout/images/heroes/Mage.png" height="151" alt="">
        				   <?php 
        				   
        				}
        				if($logged_user['selected_hero'] == 3)
        				{
        				    ?>
        				    <img src="<?php echo Base_url();?>layout/images/heroes/Fighter.png" height="151" alt="">
        				    <?php
        				}
        				?>
                         </div>
					</a>
					<div class="user-data">
						<h2><?=$logged_user['first_name']; ?></h2>
						<h2><?=$logged_user['last_name']; ?></h2>
					</div>
				</div>
			</div>
		</div>
		<div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100; transform: translateX(0px) translateY(0px);">
			<div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 1262.81px; height: 1262.81px; overflow: hidden; pointer-events: none; margin-left: -0.09375px; margin-top: -406.406px; visibility: visible;"></div>
		</div>
	</div>
	<!-- /Banner -->