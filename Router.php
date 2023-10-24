<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $function)
    {
        $this->getRoutes[$url] = $function;
    }

    public function post($url, $function)
    {
        $this->postRoutes[$url] = $function;
    }

    public function checkRoutes()
    {

        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $function = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $function = $this->postRoutes[$currentUrl] ?? null;
        }


        if ( $function ) {
            call_user_func($function, $this);
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    public function render($view, $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value; 
        }

        ob_start();

        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__ . '/views/layout.php';
    }
}
