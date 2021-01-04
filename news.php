<?php
   include 'core/init.php';
   include 'template/header.php';
   include 'template/navbar.php';
   
   $per_page = 3;
   
   $current_page = 1;
   
   if(isset($_GET['page'])){
       if(is_numeric($_GET['page'])){
           $current_page = (int) $_GET['page'];
       }}
   
   $starting_point = ($current_page - 1) * $per_page;
   
   $news = $db->getAllNewsLimited($starting_point, $per_page);
   
   $overall = $db->getCount();
   $number_pages = ceil($overall/$per_page);
   
   ?>
   
<!-- Main Content -->
<section class="content-wrap">
   <!-- Preorder -->
   <section class="youplay-banner">
      <div class="image" style="background-image: url(&#39;<?php echo Base_url();?>layout/images/pages/news.png&#39;);">
      </div>
      <div class="info container align-center">
         <div>
            <h1>Новини</h1>
            <br>
            <p class="desc">Тук можете да следите за минали, сегашни и бъдещи новини.</p>
         </div>
      </div>
   </section>
   
   <!-- /Preorder -->
   <div class="container youplay-news">
      <!-- News List -->
      <div class="col-md-9">
          
         <!-- Single News Block -->
         <?php if($news) : ?>
         <?php foreach($news as $new): ?>
         <div class="news-one">
            <div class="row vertical-gutter">
               <div class="col-md-4">
                  <a class="angled-img">
                     <div class="img">
                        <img src="<?php echo Base_url(); ?>layout/images/news/<?php echo $new['news_img']; ?>" width="150" height="150" alt="New" />
                     </div>
                  </a>
               </div>
               <div class="col-md-8">
                  <div class="clearfix">
                     <h3 class="h2 pull-left m-0"><?php echo $new['news_name'];?></h3>
                  </div>
                  <div class="desc">
                     <?php echo $new['news_shortDesc'];?>
                  </div>
                  
                  <br />
                  
                  <div class="col-xs-6">
						    <div class="price">
								 <a  class="btn btn-sm btn btn-primary" href="<?php echo Base_url();?>view/?id=<?php echo $new['news_id']; ?>">Прочети</a>
							</div>
					</div>
					
               </div>
            </div>
         </div>
         <?php endforeach;?>
         
         <?php else: ?>
         <h4 class="title-color">Няма намерени новини.</h4>
         <?php endif; ?>
         
         <!-- /Single News Block -->
         
        <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if($current_page > 1): ?>
                        <li class="page-item"><a class="page-link" href="<?php echo Base_url();?>news?page=<?php echo $current_page-1; ?>">Предишна</a></li>
                    <?php endif; ?>

                    <?php for ($x = 1; $x <= $number_pages; $x++): ?>
                        <li class="page-item <?php echo $x==$current_page ? 'active' : '' ?>"><a class="page-link" href="<?php echo Base_url();?>news?page=<?php echo $x ?>"><?php echo $x ?></a></li>
                    <?php endfor; ?>
                    <?php if($current_page < $number_pages): ?>
                        <li class="page-item"><a class="page-link" href="<?php echo Base_url();?>news?page=<?php echo $current_page+1; ?>">Следваща</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
         
      </div>
   </div>
</section>

<?php 
    include ("template/js.php");
    include ("template/footer.php");
?>