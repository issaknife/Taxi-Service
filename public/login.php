<?php

use App\Users\Model;
use App\Views\Forms\Auth\Login;
use App\Views\Navigation;
use Core\Views\Header;

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
$header = new Header();

?>
<html>

<head>
	<?php print $header->render(); ?>
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