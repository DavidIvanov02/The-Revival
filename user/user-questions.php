<?php 
include "user-header.php";

$user_id = $logged_user['user_id'];

$missions = $db->getMissionsDone($user_id);

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
					<li class="active">
						<a href="<?php echo Base_url();?>user/user-questions/">Мисии</a>
					</li>
					<li>
						<a href="<?php echo Base_url();?>user/user-items/">Редки предмети</a>
					</li>
				</ul>
                    
			</div>
            
            </div>
            
    
           <?php 
            if(!$missions) 
            {
            ?>
                <div class="col-md-9">
                    <h4>Вие още не сте изпълнили мисия в играта.</h4>    
                    <hr>
                    <h4><b>Какво представлява изпълняването на мисия в играта?</b></h4>
                    
                    <div class="image">
                        <img src="<?php echo Base_url();?>layout/images/missions/mission_1.png">
                    </div>
                    
                    <p class="description-user">
                              <p>Както виждате от снимката, когато тръгнем да изпълняваме някоя мисия от играта имаме панел за мисии, които съдържа описание за мисията, какви награди включва тя и какво трябва да направим, за да изпълним.</p>
                    </p>
                </div>
                
                <?php
                }
                ?>
                
                <?php 
                if($missions)
                {
                ?>
                 <h4>Вашите изпълнени мисии: </h4>
             <div class="col-md-9">
                     <?php foreach($missions as $mission): ?>
                         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                               <div class="panel-heading" role="tab" id="<?php echo $mission['heading']; ?>">
                                  <h4 class="panel-title">
                                     <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $mission['collapse']; ?>" aria-expanded="true" aria-controls="<?php echo $mission['collapse']; ?>">
                                     <?php echo $mission['mission_name'];?><span class="icon-plus"></span>
                                     </a>
                                  </h4>
                               </div>
                               <div id="<?php echo $mission['collapse']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $mission['heading']; ?>">
                                  <div class="panel-body desc">
                                     <?php echo $mission['mission_desc'];?>
                                  </div>
                                  
                                  <div class="img">
                                    <img src="<?php echo Base_url(); ?>layout/images/missions/<?php echo $mission['mission_img']; ?>" alt="Mission" />
                                  </div>
                               </div>
                            </div>
                         </div>
                     <?php endforeach;?>
        
             </div>
             <?php 
                }
            ?>

            <!-- Left Side -->
            <div class="col-md-3">
               <div class="side-block">
                  <h4 class="block-title">За страницата</h4>
                   <div class="block-content">
                       <p class="desc">В тази страница вие може да намерите вашите мисии, като те се делят на два вида: "Изпълнени мисии" и "Неизпълнени мисии", но те се определят от това кои от тях сте изпълнили в играт и кои от тях не.</p>
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