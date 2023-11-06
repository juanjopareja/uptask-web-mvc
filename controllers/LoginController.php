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

    public static function forget(Router $router) {  
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        }

        $router->render('auth/forget', [
            'title' => 'Recuperar Contraseña'
        ]);
    }
    
    public static function restore(Router $router) {    
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        }

        $router->render('auth/restore', [
            'title' => 'Restaurar Contraseña'
        ]);
    }

    public static function message(Router $router) {
        $router->render('auth/message', [
            'title' => 'Cuenta Creada'
        ]);
    }

    public static function confirm(Router $router) {
        $router->render('auth/confirm', [
            'title' => 'Cuenta Confirma'
        ]);
    }
}