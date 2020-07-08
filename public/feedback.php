<?php

use App\App;
use App\Views\Forms\Comments\CommentForm;
use App\Views\Navigation;
use Core\Views\Header;

require_once '../bootloader.php';

$form = new CommentForm();
$nav = new Navigation();
$header = new Header();

?>
<html lang="en">

<head>
    <?php print $header->render(); ?>
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