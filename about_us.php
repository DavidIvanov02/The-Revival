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
                        <h1>За нас</h1>
                        <p class="desc-color">Ние сме ученици от Професионална гимназия по Икономика - гр. Перник. Занимаваме се с разработката на уеб сайтове и игри. Решихме да участваме в НОИТ 2018, за да изпробваме нашите знания и умения срещу другите участници. За в бъдеще нашите планове са да постигнем много по-добри, качествени и глобални проекти.</p>
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
            
            <div class="img-center">
                <img src="<?php echo Base_url(); ?>layout/images/icons/user/google-location.png" align="left" style="width:250px;height:250px;">
            </div>
            
            <h2 id="xc" class="mt-0" align="center">Къде се намираме?</h2>
            
            <p class="desc" align="center">
                За повече информация и запитвания може да използвате нашата контактна форма!
            </p>
            <p class="desc" align="center">
                ПГИ - гр. Перник
            </p>
            <p class="desc" align="center">
                Адрес: гр. Перник, ул. Г. Мамарчев, 2
            </p>
            <div id="map-desc" class="map-desc">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1746.125059774242!2d23.046861522361894!3d42.60579239429677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14aacadf4ba43b73%3A0x28028560258f88be!2z0J_RgNC-0YTQtdGB0LjQvtC90LDQu9C90LAg0LPQuNC80L3QsNC30LjRjyDQv9C-INC40LrQvtC90L7QvNC40LrQsA!5e0!3m2!1sbg!2sbg!4v1483102486254" width="500" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <!-- /Main Content -->

<?php 
    include ("template/js.php");
    include ("template/footer.php");
?>