<body>

	<!-- Preloader -->
		
	<!-- /Preloader -->
	

	<!-- Navbar -->
	<nav class="navbar-youplay navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="off-canvas" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
			
				<a class="navbar-brand" href="<?php echo Base_url();?>index/">
                <img src="<?php echo Base_url(); ?>layout/images/icons/logos/TheRevivalLogo.png" alt="">
              </a>
			
			</div>
			<?php 
	if(isset($logged_user['access_token'])){ ?>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo Base_url(); ?>news/">Новини</a></li>
				<li><a href="<?php echo Base_url(); ?>store/">Магазин</a></li>
				<li><a href="<?php echo Base_url(); ?>missions/">Мисии</a></li>
				<li><a href="<?php echo Base_url(); ?>heroes/">Герои</a></li>
				<li><a href="<?php echo Base_url(); ?>history/">История</a></li>
				<li><a href="<?php echo Base_url(); ?>about_game/">За играта</a></li>
				<li><a href="<?php echo Base_url(); ?>download/">Играй сега</a></li>
				
          <li class="dropdown dropdown-hover">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Точки: <?=$logged_user['user_points']; ?>
            </a>
            <div class="dropdown-menu">
              <ul role="menu">
                <p class="desc" style="font-size: 13px;margin-left: 5px;color: #F5F5F5;"><span style="color: #76EE00">Подсказка: </span>С тези точки вие можете да закупите редки предмети от магазина.</p>
                <hr>
                <p class="desc" style="font-size: 13px;margin-left: 5px;color: #F5F5F5;"><span style="color: red">Забележка: </span>За да получите точки вие трябва да изпълните някоя мисия или да победите някой враг в играта.</p>
                
              </ul>
            </div>
          </li>
        
	<!-- Start of the user profile -->
		<ul id="navbar-dropdown" class="nav navbar-nav navbar-right">
          <li class="dropdown dropdown-hover">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                     Здравей, <?=$logged_user['first_name']; ?><span class="caret"></span> <span class="label">Виж своя профил!</span>
                    </a>
            <div class="dropdown-menu">
              <ul role="menu">

                <li><a href="<?php echo Base_url(); ?>user/user-profile/">Профил</a>
                </li>
                <li><a href="<?php echo Base_url(); ?>user/user-character/">Герои</a></li>
                <li><a href="<?php echo Base_url(); ?>user/user-questions/">Мисии</a></li>
                <li><a href="<?php echo Base_url(); ?>user/user-items/">Редки предмети</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo Base_url(); ?>logout/">Изход</a></li>	
              </ul>
            </div>
          </li>
        </ul>
    <!-- End of the user profile -->
    
			</ul>
		</div>
		
	<?php } else if(isset($logged_admin['access_token'])) { ?>
       			<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo Base_url(); ?>news/">Новини</a></li>
				<li><a href="<?php echo Base_url(); ?>store/">Магазин</a></li>
				<li><a href="<?php echo Base_url(); ?>missions/">Мисии</a></li>
				<li><a href="<?php echo Base_url(); ?>heroes/">Герои</a></li>
				<li><a href="<?php echo Base_url(); ?>history/">История</a></li>
				<li><a href="<?php echo Base_url(); ?>about_game/">За играта</a></li>
				<li><a href="<?php echo Base_url(); ?>download/">Играй сега</a></li>
				
	<!-- Start of the admin profile -->
		<ul id="navbar-dropdown" class="nav navbar-nav navbar-right">
          <li class="dropdown dropdown-hover">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: #1E90FF;">
                     Здравей, <?=$logged_admin['first_name']; ?>
                    </a>
            <div class="dropdown-menu">
              <ul role="menu">
                  
                <li><a href="<?php echo Base_url(); ?>admin/admin_profile/">Профил</a>
                </li>
                <li><a href="<?php echo Base_url(); ?>admin/admin_statistics.php">Статистики</a></li>
                <li><a href="<?php echo Base_url(); ?>admin/admin_news.php">Новини</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo Base_url(); ?>logout/">Изход</a></li>	
              </ul>
            </div>
          </li>
        </ul>
    <!-- End of the admin profile -->
				
        
	<?php } else {?>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo Base_url(); ?>news/">Новини</a></li>
				<li><a href="<?php echo Base_url(); ?>store/">Магазин</a></li>
				<li><a href="<?php echo Base_url(); ?>missions/">Мисии</a></li>
				<li><a href="<?php echo Base_url(); ?>heroes/">Герои</a></li>
				<li><a href="<?php echo Base_url(); ?>history/">История</a></li>
				<li><a href="<?php echo Base_url(); ?>about_game/">За играта</a></li>
                <li><a href="<?php echo Base_url(); ?>login/">Вход</a></li>
                <li><a href="<?php echo Base_url(); ?>register/">Регистрация</a></li>
                <!--<div class="vl"></div></li>-->
                <li><a href="<?php echo Base_url(); ?>download/">Играй сега</a></li>
            </ul>
        </div> 
    <?php } ?>
    

			</div>
		</div>
	</nav>
	<!-- /Navbar -->
