<?php 
include "user-header.php";
?>

<!-- User Profile -->
<div class="container youplay-content">

    <div class="row">

        <div class="col-md-9">

            <ul class="pagination pagination-sm mt-0">
                <li class="active">
                    <a href="<?php echo Base_url();?>user/user-profile/">Профил</a>
                </li>
                <li>
                    <a href="<?php echo Base_url();?>user/user-character/">Герои</a>
                </li>
                <li>
                    <a href="<?php echo Base_url();?>user/user-questions/">Мисии</a>
                </li>
                <li>
                    <a href="<?php echo Base_url();?>user/user-items/">Редки предмети</a>
                </li>
            </ul>

            <h3 class="mt-0 mb-20">Местоположение: </h3>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td style="width: 200px;">
                        <p>Вашият адрес</p>
                    </td>
                    <td>
                        <p id="address" class="desc"></p>
                    </td>
                </tr>
                </tbody>
            </table>
            
            <h3 class="mt-40 mb-20">Данните ви в сайта: </h3>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td style="width: 200px;">
                        <p>Име</p>
                    </td>
                    <td>
                        <p class="desc"><?=$logged_user['first_name']; ?></a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">
                        <p>Фамилия</p>
                    </td>
                    <td>
                        <p class="desc"><?=$logged_user['last_name']; ?></a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">
                        <p>Имейл</p>
                    </td>
                    <td>
                        <p class="desc"><?=$logged_user['email']; ?></a>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
            
            <h3 class="mt-40 mb-20">Данните ви в играта: </h3>
            <table class="table table-bordered">
                <tbody>
                    
                <tr>
                    <td style="width: 200px;">
                        <p>Герои</p>
                    </td>
                    <td>
                        <p class="desc">
                            
                            <!-- Nothing -->
                            <?php
                            
                                if($logged_user['selected_hero'] == 0)
            				{
        				   ?>
        				            <p class="desc">Не се избрали герой</p>
            				   <?php 
            				   
            				}
        				    ?>
        				    
        				    <!-- Assassin -->
                            <?php
                            
                                if($logged_user['selected_hero'] == 1)
            				{
        				   ?>
        				            <p class="desc">Асасин</p>
            				   <?php 
            				   
            				}
        				    ?>
        				    
        				    <!-- Mage -->
        				    
                            <?php
                            
                                if($logged_user['selected_hero'] == 2)
            				{
        				   ?>
        				            <p class="desc">Магьосник</p>
            				   <?php 
            				   
            				}
        				    ?>	
        				    
        				    <!-- Fighter -->
        				    
                            <?php
                            
                                if($logged_user['selected_hero'] == 3)
            				{
        				   ?>
        				            <p class="desc">Войн</p>
            				   <?php 
            				   
            				}
        				    ?>	
                        </p>
                        
                    </td>
                </tr>
                
                <tr>
                    <td style="width: 200px;">
                        <p>Точки</p>
                    </td>
                    <td>
                        <p class="desc"><?=$logged_user['user_points']; ?></a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">
                        <p>Координат X</p>
                    </td>
                    <td>
                        <p class="desc"><?=$logged_user['position_x']; ?></a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">
                        <p>Координат Y</p>
                    </td>
                    <td>
                        <p class="desc"><?=$logged_user['position_y']; ?></a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">
                        <p>Координат Z</p>
                    </td>
                    <td>
                        <p class="desc"><?=$logged_user['position_z']; ?></a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">
                        <p>Остров</p>
                    </td>
                    <td>
                        <p class="desc"><?=$logged_user['island']; ?></a>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- User Profile -->
        
        <!-- Left Side -->
        <div class="col-md-3">
          <div class="side-block">
            <h4 class="block-title">За страницата</h4>
              <div class="block-content">
                  <p class="desc">В тази страница вие може да намерите вашата лична информация, като "Местоположение", "Име", "Фамилия", "Имейл".</p>
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
                Адресът може да не е напълно точен, защото местоположението работи по IP и съответно получаваме местоположението на най-близкия рутер на интернет доставчика!
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