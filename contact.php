<?php
include 'core/init.php';
include 'template/header.php';
include 'template/navbar.php';
?>

    <!-- Main Content -->
    <section class="content-wrap">

        <!-- Banner -->
        <div class="youplay-banner youplay-banner-parallax banner-top small" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
            <div class="image" style="background-image: url(&quot;<?php echo Base_url();?>layout/images/city/city_11.jpg&quot;); transform: translate3d(0px, 0px, 0px);">
            </div>

            <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
                <div>
                    <div class="container">
                        <h1>Контакти</h1>
                    </div>
                </div>
            </div>
            <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100; transform: translateX(0px) translateY(0px);">
                <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 1262.81px; height: 1262.81px; overflow: hidden; pointer-events: none; margin-left: -0.09375px; margin-top: -406.406px; visibility: visible;"></div>
            </div>
        </div>
        <!-- /Banner -->

        <div class="container youplay-content">

            <div class="row">
                <div class="col-md-9 col-md-push-3">

                    <!-- Contact Form -->
                    <div class="youplay-form p-0">
                        <h2 class="mt-0" align="center">Контактна форма</h2>
                        <form method="post" action="" id="contactForm" name="contactForm" class="ccform">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="youplay-input form-group">
                                        <input type="text" id="first_name" name="first_name" placeholder="Име" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="youplay-input form-group">
                                        <input type="text" id="last_name" name="last_name" placeholder="Фамилия" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="youplay-input form-group">
                                        <input type="email"  id="email" name="email" placeholder="Имейл" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="youplay-input form-group">
                                        <input type="text" id="subject" name="subject" placeholder="Предмет на запитване" required>
                                    </div>
                                </div>

                            </div>

                            <div class="youplay-textarea form-group">
                                <textarea id="message" name="message" rows="8" placeholder="Съобщение" required></textarea>
                            </div>

                            <button type="submit" name="action" class="btn btn-primary">Потвърди</button>

                        </form>
                    </div>
                    <!-- /Contact Form -->

                </div>
                <div class="col-md-3 col-md-pull-9">
                    <br>Имейл за връзка: therevivalpgi@gmail.com
                    <hr>
                    <br>Телефонни номера за връзка: 0896239867 / 0893740464
                </div>
            </div>

        </div>

    </section>
    <!-- /Main Content -->
<?php

$siteOwnersEmail = 'therevivalpgi@gmail.com';


if($_POST) {

    $name = trim(stripslashes($_POST['first_name']));
    $family = trim(stripslashes($_POST['last_name']));
    $email = trim(stripslashes($_POST['email']));
    $subject = trim(stripslashes($_POST['subject']));
    $contact_message = trim(stripslashes($_POST['message']));


    if (strlen($name) < 3) {
        $error['name'] = "Въведете име.";
    }

    if (strlen($family) < 3) {
        $error['family'] = "Въведете фамилия.";
    }

    if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
        $error['email'] = "Въведете валиден имейл адрес.";
    }

    if (strlen($contact_message) < 1) {
        $error['message'] = "Моля въведете вашето съобщение. То не трябва да бъде повече от 100 символа.";
    }

    if ($subject == '') {
        $subject = "Contact Form Submission";
    }



    $message .= "Имейл от: " . $name . "<br />";
    $message .= "Имейл адрес: " . $email . "<br />";
    $message .= "Съобщение: <br />";
    $message .= $contact_message;
    $message .= "<br /> ----- <br /> Този имейл беше изпратен от вашият сайт 'Възраждането - Влез в играта!'. <br />";


    $from =  $name . " <" . $email . ">";


    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


    if (!$error) {

        ini_set("sendmail_from", $siteOwnersEmail); // for windows server
        $mail = mail($siteOwnersEmail, $subject, $message, $headers);

        if ($mail) { echo "<p style='color: lightgreen;'>Вашето съобщение е изпратено.</p>"; }
        else { echo "<p style='color: red'>Възникна грешка, моля опитайте отново по-късно!</p>"; }

    }

    else {

        $response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
        $response = (isset($error['family'])) ? $error['family'] . "<br /> \n" : null;
        $response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
        $response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;

        echo $response;

    }

}

?>

<?php
include 'template/js.php';
?>