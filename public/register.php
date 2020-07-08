<?php

require_once '../bootloader.php';

use \App\App;
use App\Users\Model;
use App\Users\User;
use App\Views\Forms\Auth\Register;
use App\Views\Navigation;

if (App::$session->getUser()) {
	header('Location: index.php');
};

function form_success(&$form, $input)
{
	$input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);

	$user = new User($input);
	Model::insert($user);

	$form['message'] = 'Registration successful, please login';
}

function form_fail(&$form, $input)
{
	$form['message'] = 'Failed to Register';
}

$form = new Register();
$form->validate();
$nav = new Navigation();
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
	<h1>Register</h1>
	<main>
		<?php print $form->render(); ?>
	</main>
	<footer>
        © 2020. Matas Bžeskis, all rights reserved.
    </footer>
</body>

</html>