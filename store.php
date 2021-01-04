<?php
    include 'core/init.php';
    include 'template/header.php';
    include 'template/navbar.php';
    
    $items = $db->getAllItems();
?>

<section class="content-wrap full youplay-404">

	<!-- Banner -->
	<div class="youplay-banner banner-top">
		<div class="image" style="background-image: url(&#39;<?php echo Base_url();?>layout/images/city/city_18.jpg&#39;)">
		</div>

		<div class="info">
				<div class="container align-center">
				<h1>Магазин</h1>
				</div>
		</div>
	</div>
	<!-- /Banner -->

</section>


<!-- Main Content -->
<section class="content-wrap">

<br>

<?php foreach($items as $item): ?>
<div class="content">
    <!--about-->
    <?php if($item): ?>
    
    <div class="about-section">
        <div class="container" style="background-color: #171a21;border: 5px solid #F5F5F5;">
            <div class="about-grids">
                <div class="col-md-6 about-grid" style="margin-top: 30px; ">
                    <img style="border: 1px solid #b2b2b2" src="<?php echo Base_url(); ?>layout/images/items/<?php echo $item['item_img']; ?>" width="300" height="265">
                </div>
                <div class="col-md-6 about-grid1" style="position: relative; height: 350.00px; margin-top: 30px;"> 
                     <table class="table table-bordered">
                        <tr>
                            <th>Име</th>
                            <td><?=$item['item_name']?></td>
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
                    
                    <?php if(isset($logged_user['access_token'])) { ?>
                    <div class="col-xs-6">
						    <div class="price">
								 <a  class="btn btn-sm btn btn-primary" href="<?php echo Base_url();?>buy_now/?id=<?php echo $item['item_id']; ?>">Купи</a>
							</div>
					</div>
					<?php } ?>
                </div>
            </div>
            <?php else: ?>
                <p>Нищо не е намерено.</p>
            <?php endif; ?>
            
        </div>
    </div>
</div>
			</div>

		</div>
		<!-- /Games List -->
		
	</div>
<?php endforeach; ?>

<br>
<br>

</section>
<!-- /Main Content -->

<?php 
    include ("template/js.php");
    include ("template/footer.php");
?>