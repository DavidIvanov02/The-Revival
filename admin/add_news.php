<?php
    include ("admin_header.php");
?>

<?php
    $news_name = "";
    $news_shortDesc = "";
    $news_longDesc = "";
    $news_img = "";
    
    $error = false;
    
    $news_nameError = "";
    $news_shortDescError = "";
    $news_longDescError = "";
    $news_imgError = "";
    
    if(isset($_POST['add']))
    {
        $news_name = trim( $_POST[ 'news_name' ] );
    	$news_name = strip_tags( $news_name );
    	$news_name = htmlspecialchars( $news_name );
    	
    	$news_shortDesc = trim( $_POST[ 'news_shortDesc' ] );
    	$news_shortDesc = strip_tags( $news_shortDesc );
    	$news_shortDesc = htmlspecialchars( $news_shortDesc );
    	
    	$news_longDesc = trim( $_POST[ 'news_longDesc' ] );
    	$news_longDesc = strip_tags( $news_longDesc );
    	$news_longDesc = htmlspecialchars( $news_longDesc );
    	
    	$news_img = trim( $_POST[ 'news_img' ] );
    	$news_img = strip_tags( $news_img );
    	$news_img = htmlspecialchars( $news_img );
    	
    	
    	if(empty($news_name))
    	{
    	    $error = true;
    	    $news_nameError = "Въведете име на новината!";
    	}
    	
    	if(empty($news_shortDesc))
    	{
    	    $error = true;
    	    $news_shortDescError = "Въведете кратко описание на новината!";    
    	}
    	
    	if(empty($news_longDesc))
    	{
    	    $error = true;
    	    $news_longDescError = "Въведете дълго описание на новината!";    
    	}
    	
    	if(empty($news_img))
    	{
    	    $error = true;
    	    $news_imgError = "Добави снимка на новината!";    
    	}
    	
    	
    	if(!$error)
    	{
    	    $news = $db->insertNews($news_name,$news_shortDesc,$news_longDesc, $news_img);    
    	    
    	    if($news != false)
    	    {
    	        $errTyp = "success";
                $errMSG = "<p style='color: #76EE00';>Успешно добавихте новина!</p>";
                
                $news_name = '';
                $news_shortDesc = '';
                $news_longDesc = '';
                $news_img = '';
    	    }
    	    
    	}
    	
    	else
    	{
    	    $errTyp = "danger";
            $errMSG = "<p style='color: red;'>Нещо се обърка. Опитайте отново...</p>";
    	}
    	
    }
        
    
    
?>
			<div>
				<div class="container align-center">
					<div id="form-fixed" class="youplay-form">
						<h2 id="fixed">Добавяне на новина</h2>

						<!-- Registration Form -->
						<form method="POST" action="<?php echo Base_url();?>admin/add_news.php" autocomplete="off">

							<?php if(isset($errMSG)): ?>
							<p class="youplay-input">
								<p class="youplay-input-<?php echo ($errTyp == " success ") ? "success " : $errTyp; ?>">
									<?php echo $errMSG; ?>
								</p>
							</p>
							<?php endif; ?>


							<!-- Name -->
							<div class="youplay-input">
								<div class="youplay-input">
									<input type="text" name="news_name" placeholder="Име на новината" value="<?php echo $news_name ?>"/>
								</div>
								
								<span class="text-danger">
									<?php echo $news_nameError; ?>
								</span>
								
							</div>
                            
                            <!-- ShortDesc -->
							<div class="youplay-input">
								<div class="youplay-input">
									<input type="text" name="news_shortDesc" placeholder="Кратко описание на новината" value="<?php echo $news_shortDesc ?>"/>
								</div>
								
								<span class="text-danger">
									<?php echo $news_shortDescError; ?>
								</span>
								
							</div>
                            
                             <!-- LongDesc -->
							<div class="youplay-input">
								<div class="youplay-input">
									<input type="text" name="news_longDesc" placeholder="Дълго описание на новината" value="<?php echo $news_longDesc ?>"/>
								</div>
								
								<span class="text-danger">
									<?php echo $news_longDescError; ?>
								</span>
								
							</div>
							
							 <!-- Img -->
							<div class="youplay-input">
								<div class="youplay-input">
                                    	<input type="text" name="news_img" placeholder="Снимката на новината (Име)" value="<?php echo $news_img ?>"/>
								</div>
								
								<span class="text-danger">
									<?php echo $news_imgError; ?>
								</span>
								
							</div>
							
							<br>
							
							<button type="submit" class="btn btn-primary" name="add">Добави</button>
							
							<hr/>

					</div>
					</form>
				</div>


<?php
    include ("../template/js.php");
    include ("../template/footer.php");
?>

