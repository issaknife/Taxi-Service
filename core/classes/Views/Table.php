<?php

namespace Core\Views;

use Core\View;

class Table extends View
{
    public function render($path = ROOT . '/core/templates/table.tpl.php')
    {
        return parent::render($path);
    }
}
