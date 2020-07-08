<?php

use App\App;
use App\Views\Forms\Comments\CommentForm;
use App\Views\Navigation;

require_once '../bootloader.php';

$form = new CommentForm();
$nav = new Navigation();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taxi Service</title>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/app.js" type="module"></script>
</head>

<body>
    <?php print $nav->render(); ?>
    <main>
        <h1>Feedback</h1>
        <div class="comments-block"></div>

        <div class="add-comment-block">
            <?php if (App::$session->getUser()) : ?>
                <?php print $form->render(); ?>
            <?php else : ?>
                <span>Want to write a comment? <a href="register.php">Register</a></span>
            <?php endif ?>
        </div>
    </main>
    <footer>
        © 2020. Matas Bžeskis, all rights reserved.
    </footer>
</body>

</html>