<?php
    include 'core/init.php';
    include 'template/header.php';
    include 'template/navbar.php';

    if(!isset($logged_user['access_token']))
    {
        header("Location: https://revival.noit.eu/store/");
    }

    $id = 1;
    if(isset($_GET['id'])){
    if(is_numeric($_GET['id'])){
    $id = (int) $_GET['id'];
    }}

    $item = $db->getItem($id);
    

    $error = false;
    
    if(isset($_POST['btn-accept']))
    {
        $item_id = $_GET['id'];
        $user_id = $logged_user['user_id'];
        $user_points = $logged_user['user_points'];
        
        $item_price = $item['item_price'];
        
        if($item_id)
        {
            $check_purchase = $db->checkUserPurchase($item_id, $user_id);
            
            if($check_purchase != false)
            {
                $error = true;
                $errMSG = '<div style="color:red">Вие вече сте закупили този предмет!</div>';
            }
           
        }
        if(!$error)
        {
            if($user_points < $item_price)
            {
                $errMSG = '<div style="color:red">Вие нямате нужните точки, за да закупите този предмет!</div>';
            }
            
            else
            {
                if($user_points != false)
                {
                   $user = $db->decreasePoints($user_id, $item_price);
                }
            
                
                $item_insert = $db->insertItemByUser($item_id, $user_id);
                
                if($item_insert != false)
                {
                    $success = '<div style="color:#76EE00">Вие успешно купихте този предмет, а сега можете да го използвате в играта.</style>';
                }
                
                else
                {
                    $errMSG = '<div style="color:red">Нещо се обърка при закупването, моля опитайте отново по-късно!</div>';
                }
            }
        }
    }
    
    
?>

    <!-- Main Content -->
    <section class="content-wrap">

        <!-- Banner -->
        <div class="youplay-banner banner-top youplay-banner-parallax small" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
            <div class="image" style="background-image: url(&quot;<?php echo Base_url();?>layout/images/city/city_5.jpg&quot;); transform: translate3d(0px, 0px, 0px);">
            </div>

            <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
                <div>
                    <div class="container">
                        <h1>Купи сега</h1>
                    </div>
                </div>
            </div>

            <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100; transform: translateX(0px) translateY(0px);">
                <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 1262.81px; height: 1262.81px; overflow: hidden; pointer-events: none; margin-left: -0.09375px; margin-top: -406.406px; visibility: visible;"></div>
            </div>
        </div>

        <!-- /Banner -->

        <!-- Main Content -->
        <div class="container youplay-content" style="background-color: #171a21;border: 5px solid #F5F5F5;" align="center">

                <?php if($item): ?>
                    <div class="title">
                        <h3>Име: <?=$item['item_name']?></h2>
                    </div>
                    
                    <div class="col-md-6 about-grid" style="margin-top: 25px;">
                        <img src="<?php echo Base_url(); ?>layout/images/items/<?php echo $item['item_img']; ?>" width="250" height="196">
                    </div>
                    
                    <div class="col-md-6 about-grid1" style="position: relative; height: 350.00px; margin-top: 5px;"> 
                     <table class="table table-bordered">
                         <tr>
                            <th>Идентификационен номер</th>
                            <td><?=$item['item_id']?></td>
                        </tr>
                        <tr>
                            <th>Точки</th>
                            <td><?=$item['item_price']?></td>
                        </tr>
                        <tr>
                            <th>Скорост на атака</th>
                            <td><?=$item['item_attack_cooldown']?></td>
                        </tr>
                        <tr>
                            <th>Енергия</th>
                            <td><?=$item['item_mana']?></td>
                        </tr>
                        <tr>
                            <th>Защита</th>
                            <td><?=$item['item_armour']?></td>
                        </tr>
                        <tr>
                            <th>Атака</th>
                            <td><?=$item['item_damage']?></td>
                        </tr>
                        <tr>
                            <th>Кръв</th>
                            <td><?=$item['item_health']?></td>
                        </tr>
                    </table>
                    </div>
                    
                    
                    <div class="row">
                        
                        <form method="POST">
                            
    						
    						<?php if(isset($errMSG)): ?>
    							<div>
    								<div <?php echo ($errTyp == " success ") ? "success " : $errTyp; ?>>
    									<?php echo $errMSG; ?>
    								</div>
    							</div>
    							
    							<br>
    							<a type="submit" href="<?php echo Base_url();?>store/" name="btn-decline" class="btn btn-primary">Към магазина</a>
    							<br>
    							<br>
                                <a type="submit" href="<?php echo Base_url();?>user/user-items/" name="btn-decline" class="btn btn-primary">Към инвентара</a>
                                
    						<?php endif; ?>
    						
    						<br>
    						 
                            
                            <?php
                            if(isset($check_purchase))
                            {
                                ?>
                                
                            <?php if(isset($success)): ?>
    							<div>
    								<div <?php echo ($errTyp == " success ") ? "success " : $errTyp; ?>>
    									<?php echo $success; ?>
    								</div>
    							</div>
    							
                                <br>
                                <a type="submit" href="<?php echo Base_url();?>store/" name="btn-decline" class="btn btn-primary">Към магазина</a>
    							<br>
    							<br>
                                <a type="submit" href="<?php echo Base_url();?>user/user-items/" name="btn-decline" class="btn btn-primary">Към инвентара</a>
    						<?php endif; ?>
    						
    						<?php 
                            }
                            
                            ?>
                            
                            <?php
                            if(!isset($check_purchase))
                            {
                            ?>
                                <p class="desc">Сигурни ли сте, че искате да закупите този предмет?</p>   						 
                                <button type="submit" name="btn-accept" class="btn btn-primary">Да</button>
                                <a type="submit" href="<?php echo Base_url();?>store/" name="btn-decline" class="btn btn-danger">Не</a>
                                
                                <br>
                                <br>
                                <br>
                                <a type="submit" href="<?php echo Base_url();?>store/" name="btn-decline" class="btn btn-primary">Към магазина</a>
                                <br>
                                <br>
                                <a type="submit" href="<?php echo Base_url();?>user/user-items/" name="btn-decline" class="btn btn-primary">Към инвентара</a>
                            <?php 
                            }
                            ?>

                            <br>
                            <br>
                            
                        </form>                    
                    </div>
                    
                <?php else: ?>
                    <p>Не е открит такъв предмет.</p>
                <?php endif; ?>

        </div>

        <!-- /Main Content -->

    </section>
    <!-- /Main Content -->
<?php 
    include ("template/js.php");
    include ("template/footer.php");
?>