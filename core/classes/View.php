<?php

namespace Core;

class View
{
    protected $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function &getData()
    {
        return $this->data;
    }

    public function render(string $template_path)
    {
        $data = $this->data;

        ob_start();

        require $template_path;

        return ob_get_clean();
    }
}
