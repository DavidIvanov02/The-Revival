<?php 
include "user-header.php";

?>

	<div class="container youplay-content">

		<div class="row">

			<div class="col-md-9">

				<ul class="pagination pagination-sm mt-0">
					<li>
						<a href="<?php echo Base_url();?>user/user-profile/">Профил</a>
					</li>
					<li class="active">
						<a href="<?php echo Base_url();?>user/user-character/">Герои</a>
					</li>
					<li>
						<a href="<?php echo Base_url();?>user/user-questions/">Мисии</a>
					</li>
					<li>
						<a href="<?php echo Base_url();?>user/user-items/">Редки предмети</a>
					</li>
				</ul>
                    
			</div>
            

	        <div class="col-md-9">
	            <h2>
	                
                    <?php
        				if($logged_user['selected_hero'] == 0)
        				{
        				   ?>
        				    <h4>Още не сте избрали герой в играта.</h4>
        				    
        				    <hr>
        				    
                            <h4 class="mt-0"><b>Как да изберем герой в играта?</b></h4>
                                
                             <p class="desc">Когато кликнем върху бутонът "Нова игра" ни се показва едно меню, в което можем да изберем героя си.</p>
                             
                                <div class="image">
                                    <img src="<?php echo Base_url();?>layout/images/about_game/hero_selector.png">
                                </div>
        				   
        				   <?php 
        				   
        				}
        				if($logged_user['selected_hero'] == 1)
        				{
        				    ?>
		    	            <h3>Вашият герой е:</h3>
		    	            
        				    <div class="img">
                                <img src="<?php echo Base_url(); ?>layout/images/heroes/Assasin.png" alt="Hero"/>
                             </div>
                     
        				  <p class="clearfix">
                             <h4>Име на героя: Асасин</h4>
                          </p>
                          
                          <p class="description-user">
                              <p>Описание на героя: Асасинът е бърз и ловък, способен да обезкоражи опонентите си за секунди и също така може да се промъкне на всяко едно място без никой да го забележи, но дори и да го видят за него не е проблем, защото неговите атаки са бързи и фатални!</p>
                          </p>
        				    <?php
        				}
        				if($logged_user['selected_hero'] == 2)
        				{
        				    ?>
        				    
        				    <h3>Вашият герой е:</h3>
        				    
        				     <div class="img">
                                <img src="<?php echo Base_url(); ?>layout/images/heroes/Mage.png" alt="Hero"/>
                             </div>
                     
        				  <p class="clearfix">
                             <h4>Име на героя: Магьосник</h4>
                          </p>
                          
                          
                          <p class="description-user">
                              <p>Описание на героя: Магьосникът, не е добър в близките схватки, но е ненадминат в боят от разстояние, способен да призовава силите на природата и да си играе с тях, всеки контакт с него би завършил зле за опонентите му!</p>
                          </p>
        				    <?php
        				}
        				if($logged_user['selected_hero'] == 3)
        				{
        				    ?>
        				    
        				    <h3>Вашият герой е:</h3>
        				    
        				      <div class="img">
                                <img src="<?php echo Base_url(); ?>layout/images/heroes/Fighter.png" alt="Hero"/>
                             </div>
                     
        				  <p class="clearfix">
                             <h4>Име на героя: Войн</h4>
                          </p>
                          
                          
                          <p class="description-user">
                              <p>Описание на героя: Войнът обвит с мускули, гъмжащи от сила би бил един от най-големите проблеми на враговете дръзнали да се изправят срещу него, подлгайки се на много болка и страдание от неговите нетактични подходи в боевете!</p>
                          </p>
                          

        				    <?php
        				}
        				?>
        				
	            </h2>
	        </div>
            <!-- Left Side -->
            <div class="col-md-3">
               <div class="side-block">
                  <h4 class="block-title">За страницата</h4>
                   <div class="block-content">
                       <p class="desc">В тази страница вие може да намерите вашият герои, който сте избрали в играта и кратка информация за него.</p>
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