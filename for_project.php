<?php
include 'core/init.php';
include 'template/header.php';
include 'template/navbar.php';
?>
    <!-- Main Content -->
    <section class="content-wrap">

        <!-- Banner -->
        <div class="youplay-banner banner-top youplay-banner-parallax small" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
            <div class="image" style="background-image: url(&quot;<?php echo Base_url();?>layout/images/city/city_11.jpg&quot;); transform: translate3d(0px, 0px, 0px);">
            </div>

            <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
                <div>
                    <div class="container">
                        <h1>За проекта</h1>
                    </div>
                </div>
            </div>
            <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100; transform: translateX(0px) translateY(0px);">
                <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 1262.81px; height: 1262.81px; overflow: hidden; pointer-events: none; margin-left: -0.09375px; margin-top: -406.406px; visibility: visible;"></div>
            </div>
        </div>
        <!-- /Banner -->

        <div class="container youplay-content">

            <h2 class="mt-0">Каква е целта на проекта?</h2>
            <p class="desc">
                Сайтът представлява онлайн допълнение към играта "Възраждането". Приложението дава възможност на потребителите да се регистрират и да изтеглят играта, да проверят своя статус, да изберат героя си, да се сдобият с най-редките предмети в играта и да научат повече за предстоящите мисии и приключения.
            </p>
            <h2 class="mt-0">Кои са използваните технологии?</h2>

            <p align="center">

                <img src="<?php echo Base_url();?>layout/images/technologies/php.png" style="width:100px;height:100px"></img>
                <img src="<?php echo Base_url();?>layout/images/technologies/mysql.png" style="width:100px;height:100px"></img>
                <img src="<?php echo Base_url();?>layout/images/technologies/apache.png" style="width:100px;height:100px"></img>
                <img src="<?php echo Base_url();?>layout/images/technologies/html5.png" style="width:100px;height:100px"></img>
                <img src="<?php echo Base_url();?>layout/images/technologies/css3.png" style="width:100px;height:100px"></img>
                <img src="<?php echo Base_url();?>layout/images/technologies/javascript.png" style="width:100px;height:100px"></img>
                <img src="<?php echo Base_url();?>layout/images/technologies/jquery.png" style="width:100px;height:100px"></img>
                <img src="<?php echo Base_url();?>layout/images/technologies/google-maps-api.png" style="width:100px;height:100px"></img>
                <img src="<?php echo Base_url();?>layout/images/technologies/youtube-player-api.png" style="width:100px;height:100px"></img>
                <img src="<?php echo Base_url();?>layout/images/technologies/pdo.png" style="width:100px;height:100px"></img>
            </p>

            <h2 class="mt-0">Кои са източниците на информация?</h2>
            <a class="register" href="https://developers.google.com/maps/" target="_blank">Google Maps API</a>
            <br>
            <a class="register" href="https://developers.google.com/youtube/" target="_blank">YouTube Player API</a>
        </div>
    </section>

<?php 
    include ("template/js.php");
    include ("template/footer.php");
?>