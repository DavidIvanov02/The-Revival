<?php
include 'core/init.php';
include 'template/header.php';
include 'template/navbar.php';
?>

    <!-- Main Content -->
    <section class="content-wrap full youplay-404">

        <!-- Banner -->
        <div class="youplay-banner banner-top">

            <div class="image" style="background-image: url(&#39;<?php echo Base_url();?>layout/images/pages/errorpage.png&#39;)">
            </div>

            <div class="info">
                <div>
                    <div class="container align-center">
                        <h2 class="h1">Error: 404</h2>
                        <p class="desc">Страницата не е намерена или е била преместена.</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Banner -->

    </section>
    <!-- /Main Content -->

<?php
    include 'template/js.php';
?>