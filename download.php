<?php 
include 'core/init.php';
include 'template/header.php';
include 'template/navbar.php';
?>

    <!-- Main Content -->
    <section class="content-wrap full">

        <!-- Preorder -->
        <section class="youplay-banner">
            <div class="image" style="background-image: url(&#39;<?php echo Base_url();?>layout/images/city/city_3.jpg&#39;);">
            </div>

            <div class="info container align-center">
                <div>
                    <a href="<?php echo Base_url();?>download/TheRevival.rar" class="btn-lg btn btn-primary">Изтеглете играта</a>
                    <br>
                    <br>

                    <?php
				if(!isset($logged_user['access_token']))
				{
				?>

                        <a class="register" href="<?php echo Base_url();?>register/">Нямате профил?</a>

                        <?php
				}
				?>

                            <?php 
				if(isset($logged_user['access_token']))
				{
				?>

                                <p class="desc">Вие вече сте в профила си, а сега може да изтеглите играта.</a>

                                    <?php
				}
				?>

                </div>
            </div>

        </section>
        <!-- /Preorder -->

    </section>
    <!-- /Main Content -->

<?php 
    include ("template/js.php");
    include ("template/footer.php");
?>