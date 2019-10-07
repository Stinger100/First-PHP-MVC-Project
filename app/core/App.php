<?php

namespace App\Foundation;

use App\Controllers\Home;

class App
{
    /**
     * @var string $controller
     */
    protected $controller = 'home';
    /**
     * @var string $index
     */
    protected $method = 'index';
    /**
     * @var array $params
     */
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        //check if controller exists
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        $controllers = [
            'home' => Home::class,
        ];
    
        require_once '../app/controllers/' . $this->controller . '.php';

        //create new instance
        $this->controller = new $controllers[$this->controller];

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //check if url has content
        $this->params = $url ? array_values($url) :[];

        //call the controlller and method 
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * @return array|null
     */
    public function parseUrl(): ?array
    {
        if (!isset($_GET['url'])) {
            return null;
        }
        
        return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
}