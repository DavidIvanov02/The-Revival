<?php
include ("core/init.php");

if ( isset($_SESSION['user']) != "" ) 
{
    header("Location: https://revival.noit.eu/index/");
}

$first_name = '';
$last_name = '';
$email = '';
$password = '';

$first_nameError = '';
$last_nameError = '';
$emailError = '';
$passwordError = '';

$first_nameErrorLen = '';
$last_nameErrorLen = '';
$emailErrorLen = '';
$passwordErrorLen = '';

$error = false;

if ( isset( $_POST[ 'submit' ] ) ) 
{
	$first_name = trim( $_POST[ 'first_name' ] );
	$first_name = strip_tags( $first_name );
	$first_name = htmlspecialchars( $first_name );

	$last_name = trim( $_POST[ 'last_name' ] );
	$last_name = strip_tags( $last_name );
	$last_name = htmlspecialchars( $last_name );

	$email = trim( $_POST[ 'email' ] );
	$email = strip_tags( $email );
	$email = htmlspecialchars( $email );

	$password = trim( $_POST[ 'password' ] );
	$password = strip_tags( $password );
	$password = htmlspecialchars( $password );

	if ( empty( $first_name ) ) 
	{
		$error = true;
		$first_nameError = "Въведете име.";
	} 

	else if(strlen($first_name) < 3)
    {
        $error = true;
        $first_nameErrorLen = "Вашето име не трябва да е по-късо от три символа.";
    }

	if ( empty( $last_name ) )
	{
		$error = true;
		$last_nameError = "Въведете фамилия.";
	} 

	else if( strlen($last_name) < 5)
    {
        $error = true;
        $last_nameErrorLen = "Вашата фамилия не трябва да е по-къса от пет символа. ";
    }

	if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) 
	{
		$error = true;
		$emailError = "Въведете имейл.";
		
	}

    else
    {
        $user = $db->checkEmail($email);

        if($user != false)
        {
            $error = true;
            $emailError = 'Имейлът, който сте посочили вече се използва.';
        }

    }
    
	if ( empty( $password ) ) 
	{
		$error = true;
		$passwordError = "Въведете парола.";
	} 

    else if (strlen($password) < 6)
    {
        $error = true;
        $passwordErrorLen = "Вашата парола не трябва да бъде по-къса от шест символа.";
    }
    
	if( !$error ) 
	{
    	$password = hash('sha256', $password);
    	
    	$length = 100;
        $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        
	    $user = $db->insertUser($first_name,$last_name,$email,$password,$token);
         
         if($user != false)
         {
            $errTyp = "success";
            $errMSG = "<p style='color: #76EE00';>Успешна регистрация. Сега можете да влезете в профила си</p>";
            
            $first_name = '';
            $last_name = '';
            $email = '';
            $password = '';
        }
        
        else 
        {
            $errTyp = "danger";
            $errMSG = "<p style='color: red;'>Нещо се обърка. Опитайте отново...</p>";
        }

    }


}

include 'template/header.php';
include 'template/navbar.php';
?>

<!-- Main Content -->
<section class="content-wrap full youplay-login">

	<!-- Banner -->
	<div class="youplay-banner banner-top">
		<div class="image" style="background-image: url(&#39;<?php echo Base_url();?>layout/images/city/city_4.jpg&#39;)"></div>

		<div class="info">
			<div>
				<div class="container align-center">
					<div id="form-fixed" class="youplay-form">
						<h2 id="fixed">Регистрация</h2>

						<!-- Registration Form -->
						<form method="POST" action="<?php echo Base_url();?>register/" autocomplete="off">

							<?php if(isset($errMSG)): ?>
							<p class="youplay-input">
								<p class="youplay-input-<?php echo ($errTyp == " success ") ? "success " : $errTyp; ?>">
									<?php echo $errMSG; ?>
								</p>
							</p>
							<?php endif; ?>


							<!-- Username -->
							<div class="youplay-input">
								<div class="youplay-input">
									<input type="text" name="first_name" placeholder="Име" maxlength="50" value="<?php echo $first_name ?>"/>
								</div>
								<span class="text-danger">
									<?php echo $first_nameError; ?>
                                    <?php echo $first_nameErrorLen?>
								</span>
							</div>

							<!-- Family -->
							<div class="youplay-input">
								<div class="youplay-input">
									<input type="text" name="last_name" placeholder="Фамилия" maxlength="50" value="<?php echo $last_name ?>"/>
								</div>
								<span class="text-danger">
									<?php echo $last_nameError; ?>
                                    <?php echo $last_nameErrorLen;?>
								</span>
							</div>

							<!-- Email -->
							<div class="youplay-input">
								<div class="youplay-input">
									<input type="email" name="email" placeholder="Имейл" maxlength="40" value="<?php echo $email ?>"/>
								</div>
								<span class="text-danger">
									<?php echo $emailError; ?>
								</span>
							</div>

							<!-- Password-->
							<div class="youplay-input">
								<div class="youplay-input">

									<input type="password" name="password" placeholder="Парола"/>
								</div>

								<span class="text-danger">
									<?php echo $passwordError; ?>
                                    <?php echo $passwordErrorLen; ?>
								</span>
							</div>

							<br>
							
							<!-- Registration button -->
							<div class="youplay-input">
								<button type="submit" class="btn btn-primary" name="submit">Потвърди</button>
							</div>

							<hr/>

							<!-- Login -->
							<div class="panel-login">
								<a class="panel-login-a" href="<?php echo Base_url();?>login/">Влез в профила си от тук...</a>
							</div>
					</div>
					</form>
				</div>
			</div>
		</div>



<?php 
include 'template/js.php';
?>