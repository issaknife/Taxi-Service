<?php

namespace Core\Views;

use Core\View;

class Header extends View
{
    public function render($path = ROOT . '/core/templates/header.tpl.php')
    {
        return parent::render($path);
    }
}
