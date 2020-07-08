<?php

require_once '../bootloader.php';

use \App\App;
use App\Users\Model;
use App\Users\User;
use App\Views\Forms\Auth\Register;
use App\Views\Navigation;
use Core\Views\Header;

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
$header = new Header();

?>
<html>

<head>
	<?php print $header->render(); ?>
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