<?php 
include "user-header.php";

$user_id = $logged_user["user_id"];

$items = $db->getItemsByPurchase($user_id);

$count = $db->itemsPurchased($user_id);
?>

        <div class="container youplay-content">
            <div class="row">
                <div class="col-md-9">
                    <ul class="pagination pagination-sm mt-0">
                        <li>
                            <a href="<?php echo Base_url();?>user/user-profile/">Профил</a>
                        </li>
                        <li>
                            <a href="<?php echo Base_url();?>user/user-character/">Герои</a>
                        </li>
                        <li>
                            <a href="<?php echo Base_url();?>user/user-questions/">Мисии</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo Base_url();?>user/user-items/">Редки предмети</a>
                        </li>
                    </ul>
                </div>
                
                <?php if(!$items)
                {
                ?>
                <div class="col-md-9">
                    <h4>Вие още не сте закупили предмет.</h4>    
                    <hr>
                    <h4><b>Какво представлява закупката на предметите?</b></h4>
                    
                    <div class="image">
                        <img src="<?php echo Base_url();?>layout/images/items/store.png">
                    </div>
                    
                    <p class="description-user">
                              <p>Както виждате от снимката, когато тръгнем да купим някой рядък предмет имаме информация за съответният предмет.</p>
                    </p>
                </div>
                <?php
                }
                ?>
                <?php if($items){?>
                <div class="col-md-9" style="background-color: #171a21;border: 5px solid #F5F5F5;">
                    <h3 align="center"><b>Вашите редки предмети:</b></h3>
                    <br>
                    <br>
                    
                    <hr>
                    <h4>Общ брой закупени редки предмети: <?=$count['count']?></h4>
                    <hr>
                     
                     <?php foreach($items as $item): ?>
                         <div class="title" align="center">
                             <h3><?=$item['item_name']?></h3>
                         </div>
                        
              
                         <div id="items-img" class="col-md-6 about-grid" style="margin-top: 5px; margin-left: 280px;">
                            <img src="<?php echo Base_url(); ?>layout/images/items/<?php echo $item['item_img']; ?>" style="margin-bottom: 10px;" width="239" height="200">
                        </div>
                        
                        
                        <table class="table table-bordered" style="margin-top: 100px;">
                        
                        <tr>
                            <th>Статистики: </th>
                            <th>Стойности: </th>
                        </tr>
                         <tr>
                            <th>Идентификационен номер</th>
                            <td><?=$item['item_id']?></td>
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
                    
                    
                    <hr>
                    
                     <?php endforeach;?>
                     </div>
                    <?php } ?>
                    
                <!-- Left Side -->
                <div class="col-md-3">
                    
                    <div class="side-block">
                        <h4 class="block-title">За страницата</h4>
                        <div class="block-content">
                            <p class="desc">В тази страница вие може да намери вашите редки предмети, които сте закупили от нашият магазин, а тези предмети могат да ви помогнат в играта.</p>
                        </div>
                    </div>
                    
                    <div class="side-block">
                        <h4 class="block-title">Местоположение</h4>
                        <div class="block-content pt-5">
                            <div id="map"></div>
                            <br>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading" align="center" >
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse">
                                                Виж информацията<span class="icon-plus"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading">
                                        <div class="panel-body desc">
                                            Адресът, който се показва на картата може да не е напълно точен, защото местоположението работи по IP и съотвено получаваме местоположението на най-близкия рутер на интернет доставчика!
                                        </div>
                                    </div>
                                </div>
                                <p id="error"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Left Side -->

            </div>
        </div>
    </section>
    <!-- /Main Content -->
    
<?php 
    include ("../template/js.php");
    include ("../template/footer.php");
?>
