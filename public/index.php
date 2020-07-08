<?php

use App\Views\Navigation;

require_once '../bootloader.php';

$navigation_view = new Navigation();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taxi Service</title>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php print $navigation_view->render(); ?>
    <main>
        <div class="hero"></div>
        <div class="services">
            <div class="services__card">
                <div class="services__img"><img src="assets/images/services-1.jpg" alt="yellow cab service picture"></div>
                <div class="services__name">Yellow Cab</div>
                <div class="services__description">There are many yellow cab taxicab operators around the world (some with common heritage, some without). The original Yellow Cab Company, based in Chicago, Illinois, was one of the largest taxicab companies in the United States.</div>
            </div>
            <div class="services__card">
                <div class="services__img"><img src="assets/images/services-2.jpg" alt="uber service picture"></div>
                <div class="services__name">Uber Service</div>
                <div class="services__description">Uber, is an American multinational ride-hailing company offering services that include peer-to-peer ridesharing, ride service hailing, food delivery, and a micromobility system with electric bikes and scooters.</div>
            </div>
            <div class="services__card">
                <div class="services__img"><img src="assets/images/services-3.jpg" alt="vintage cab service picture"></div>
                <div class="services__name">Classic Cab</div>
                <div class="services__description">Call our professional vintage cab service in Marco Island, FL, today to experience the difference that quality service makes</div>
            </div>
        </div>
        <div class="iframe--block">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.219602278376!2d25.33569661589081!3d54.72335198029069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0xdd7887e198efd4c7!2sSaul%C4%97tekio%20al.%2015%2C%20Vilnius%2010221!5e0!3m2!1sen!2slt!4v1594110097896!5m2!1sen!2slt" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </main>
    <footer>
        © 2020. Matas Bžeskis, all rights reserved.
    </footer>
</body>

</html>