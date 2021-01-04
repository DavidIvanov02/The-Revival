<?php
include ("core/init.php");

if ( isset($_SESSION['user']) != "" ) 
{
    header("Location: https://revival.noit.eu/index/");
}
    
$email = '';
$passwordError = '';
$emailError = '';

$error = false;

if ( isset( $_POST[ 'btn-login' ] ) ) {
    
	$email = trim( $_POST[ 'email' ] );
	$email = strip_tags( $email );
	$email = htmlspecialchars( $email );

	$password = trim( $_POST[ 'password' ] );
	$password = strip_tags( $password );
	$password = htmlspecialchars( $password );

	if ( empty( $email ) ) 
	{
		$error = true;
		$emailError = "Въведете имейл.";
	} 
	
	if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) 
	{
		$error = true;
		$emailError = "Въведете имейл.";
	}

	if ( empty( $password ) ) {
		$error = true;
		$passwordError = "Въведете парола.";
	}
	
	if ( !$error) {

        $password = hash('sha256',$password);
        $user = $db->getUser($email, $password);
       
        if ($user != false)
        {
            $_SESSION['user'] = $user['access_token']; 
            header("Location: https://revival.noit.eu/index/");
            exit;
        }
        
        else 
        { 
            $errMSG = "<p style='color: red;'>Въвели сте грешни данни, моля опитайте отново.</p>";
        }
    }
}

include ("template/header.php");
include ("template/navbar.php");
?>

<!-- Main Content -->
<section class="content-wrap full youplay-login">

	<!-- Banner -->
	<div class="youplay-banner banner-top">
		<div class="image" style="background-image: url(&#39;<?php echo Base_url();?>layout/images/city/city_4.jpg&#39;)"></div>

		<div class="info">
			<div>
				<div class="container align-center">
					<div class="youplay-form">
						<h2>Вход</h2>

						<!-- Login Form -->
						<form method="POST" action="<?php echo Base_url();?>login/" autocomplete="off">

							<?php if(isset($errMSG)): ?>
							<p class="youplay-input">
								<p class="youplay-input-<?php echo ($errTyp == " success ") ? "success " : $errTyp; ?>">
									<?php echo $errMSG; ?>
								</p>
							</p>
							<?php endif; ?>

							<!-- Email -->
							<div class="youplay-input">
								<div class="youplay-input">
									<input type="email" name="email" placeholder="Имейл" maxlength="40" value="<?php echo $email ?>"/>
								</div>
								<span class="text-danger">
									<?php echo $emailError; ?>
								</span>
							</div>


							<!-- Password -->
							<div class="youplay-input">
								<div class="youplay-input">

									<input type="password" name="password" placeholder="Парола"/>
								</div>

								<span class="text-danger">
									<?php echo $passwordError; ?>
								</span>
							</div>


							<br>
							
							<button type="submit" name="btn-login" class="btn btn-primary">Влезте</button>

							<hr/>
							
							<div>
								<div class="panel-login-a">
									<a href="<?php echo Base_url();?>register/" class="panel-login-a">Създайте профил?</a>
								</div>
								
								<div class="panel-login-a">
									<a href="<?php echo Base_url();?>admin/admin_login.php" class="panel-login-a">Администраторски профил</a>
								</div>
								
							</div>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
		
<?php 
include 'template/js.php';
?>