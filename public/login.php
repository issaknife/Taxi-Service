<?php

use App\Users\Model;
use App\Views\Forms\Auth\Login;
use App\Views\Navigation;

require_once '../bootloader.php';

if (App\App::$session->getUser()) {
	header('Location: index.php');
};

function form_success(&$form, $input)
{
	$userData = Model::getWhere([
		'email' => $input['email']
	]);

	$user = $userData[0];
	App\App::$session->login($user->email, $user->password);

	header('Location: index.php');
}

function form_fail(&$form, $input)
{
	$form['message'] = 'Failed to log in';
}

$form = new Login();
$form->validate();
$nav = new Navigation;
?>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Taxi Service</title>
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<?php print $nav->render(); ?>
	<h1>Login</h1>
	<main>
		<?php print $form->render(); ?>
	</main>
	<footer>
        © 2020. Matas Bžeskis, all rights reserved.
    </footer>
</body>

</html>