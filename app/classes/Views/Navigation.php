<?php

namespace App\Views;

use App\App;
use Core\View;

class Navigation extends View
{
    public function __construct($data = [])
    {
        parent::__construct($data);
        $user = App::$session->getUser();

        $this->addLink('left', '/index.php', 'Home');
        $this->addLink('left', '/feedback.php', 'Feedback');
        if ($user) {
            $this->addLink('right', '/logout.php', "Logout [$user->name]");
        } else {
            $this->addLink('right', '/login.php', 'Login');
            $this->addLink('right', '/register.php', 'Register');
        }
    }

    public function addLink($section, $url, $title)
    {
        $link = ['url' => $url, 'title' => $title];

        if ($_SERVER['REQUEST_URI'] === $link['url']) {
            $link['active'] = true;
        }

        $this->data[$section][] = $link;
    }

    public function render(string $template_path = ROOT . '/core/templates/navigation.tpl.php')
    {
        return parent::render($template_path);
    }
}
