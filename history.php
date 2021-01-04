<?php
include 'core/init.php';
include 'template/header.php';
include 'template/navbar.php';
?>

    <!-- Main Content -->
    <section class="content-wrap">

        <!-- Banner -->
        <div class="youplay-banner banner-top youplay-banner-parallax small" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
            <div class="image" style="background-image: url(&quot;<?php echo Base_url(); ?>layout/images/city/city_9.jpg&quot;); transform: translate3d(0px, 0px, 0px);">
            </div>

            <div class="info" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
                <div>
                    <div class="container">
                        <h1 class="container">История на играта</h1>
                    </div>
                </div>
            </div>

            <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100; transform: translateX(0px) translateY(0px);">
                <div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;); position: absolute; top: 0px; left: 0px; width: 1262.81px; height: 1262.81px; overflow: hidden; pointer-events: none; margin-left: -0.09375px; margin-top: -406.406px; visibility: visible;"></div>
            </div>

        </div>
        <!-- /Banner -->

        <div class="container youplay-news youplay-post">
            <!-- Post Text -->
            <div class="row">

                <div id="emergance">
                    <div class="title">
                        <h3>Възникването</h3>
                    </div>

                    <div class="desc">
                        <p class="desc">Войните са нещо неизбежно, хиляди са се провеждали, без значение победи или загуби, за много от тях знаем, за други все още не сме узнали, но тепърва ще черпим знания за тях. Два мистични древни народа са на прага на война готова да погребе хиляди живи същества зад гърба си. Изходът от войната е ясен, още преди тя да е започнала. Пролята кръв, руини навсякъде и агония гонеща всеки безучастно гледащ бойното поле.
                        </p>
                    </div>

                    <div class="img">
                        <img src="<?php echo Base_url(); ?>layout/images/city/city_10.jpg" />
                    </div>

                </div>
            </div>

            <div class="row">

                <div id="thepast">

                    <div class="title">
                        <h3>Миналото</h3>
                    </div>

                    <div class="desc">
                        <p class="desc">
                            Макар войната да се смята за непредотвратима, все още има 3-ма герои, готови да жертват живота си, славата си и дори хармонията в своите сърца, за да спасят света. В далечното минало над света властвали седемте велики камъка на дарението, всеки от тях поддържал живота на една раса, като се грижел тя да е в безопасност.
                        </p>
                    </div>

                    <div class="img">
                        <img src="<?php echo Base_url(); ?>layout/images/city/city_20.jpg" alt="">
                    </div>

                </div>
            </div>

            <div class="row">
                <div id="therulers">

                    <div class="title">
                        <h3>Владетелите на расите</h3>
                    </div>

                    <div class="desc">
                        <p class="desc">
                            Носели се слухове и легенди, че камъните имали физически тела и че който ги докоснел би могъл да запечата силата им дълбоко в себе си. Тази легенда набирала все повече и повече популярност сред младите откриватели. Не след дълго всички знаели за този мит, но в техните глави това не било просто мит, започнали да стават все повече и повече схватки за това кой пръв ще открие камъка, започнали да се пишат закони за забрана да се споменава дори и на шега за камъните, но и това не помогнало. Самите владетели на расите започнали да копнеят за силата на седемте камъка, за това какво биха могли да постигнат със силата на всичките седем. Жаждата за сила винаги е пораждала научност и винаги ще продължава да го прави, кралете не се задоволявали с богатствата си вече. Започнали да се предприемат военни действия, да се превземат земи, не отнело много на владетелите да се самоизбият, докато не останали два народа.
                        </p>
                    </div>

                    <div class="img">
                        <img src="<?php echo Base_url(); ?>layout/images/heroes/the_rulers.png" alt="">
                    </div>

                </div>
            </div>

            <div class="row">
                <div id="brokenpeace">

                    <div class="title">
                        <h3>Разбитият мир</h3>
                    </div>

                    <div class="desc">
                        <p class="desc">
                            Двата народа живеели в мир и хармония дълги години, докато един ден магията не проговорила и не пробудила хората с писъците от войната. Старейшините имали видения за този ден, но не предполагали, че той ще бъде толкова ужасяващ, Океаните проговорили, огньовете се надигнали като живи, драконите започнали да вият, ледовете се топели, когато на всички им станало ясно, че камъните отново са се пробудили и макар техните народи да не са сред живите, те притежават сили по-страховити и от преди. Въпрос на време е кой крал пръв ще направи първата крачка към войната!
                        </p>
                    </div>

                    <div class="img">
                        <img src="<?php echo Base_url(); ?>layout/images/city/city_14.jpg" alt="">
                    </div>

                </div>
            </div>
        </div>
        <!-- /Post Text -->

    </section>
    <!-- /Main Content -->

<?php 
    include ("template/js.php");
    include ("template/footer.php");
?>