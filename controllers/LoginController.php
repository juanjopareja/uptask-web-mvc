<?php

namespace Controllers;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }

        $router->render('auth/login', [
            'title' => 'Iniciar Sesión'
        ]);
    }
    
    public static function logout() {
        echo "Desde logout...";
    }

    public static function create(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        }

        $router->render('auth/create', [
            'title' => 'Crea tu cuenta en UpTask'
        ]);
    }

    public static function forget() {
        echo "Desde olvidé...";
    
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        }
    }
    
    public static function restore() {
        echo "Desde restaurar contraseña...";
    
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        }
    }

    public static function message() {
        echo "Desde mensaje...";
    }

    public static function confirm() {
        echo "Desde confirmar...";
    }
}