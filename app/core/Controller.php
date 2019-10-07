<?php

namespace App\Foundation;

class Controller 
{
    /**
     * @var string $model
     * @var array $data
     * @return void
     */
    public function view(string $view, array $data = []): void
    {
        require_once sprintf('../app/views/%s.php', $view);
    }
}