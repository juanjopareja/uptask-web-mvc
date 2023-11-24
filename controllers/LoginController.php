<?php

namespace Controllers;

use Classes\Email;
use Model\User;
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
        $alerts = [];
        $user = new User();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->synchro($_POST);
            $alerts = $user->validateNewAccount();

            if(empty($alerts)) {
                $userExists = User::where('email', $user->email);
    
                if($userExists) {
                    User::setAlert('error', 'El usuario ya está registrado');
                    $alerts = User::getAlerts();
                } else {
                    $user->hashPassword();
                    unset($user->passwordRepeat);
                    $user->createToken();

                    $result = $user->save();

                    $email = new Email($user->email, $user->name, $user->token);
                    $email->sendConfirmation();
                    if($result) {
                        header('Location: /message');
                    }
                }
            }
        }

        $router->render('auth/create', [
            'title' => 'Crea tu cuenta en UpTask',
            'user' => $user,
            'alerts' => $alerts
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
        $token = s($_GET['token']);

        if(!$token) header('Location: /');

        $user = User::where('token', $token);

        if(empty($user)) {
            User::setAlert('error', 'Token no válido');
        } else {
            $user->confirmed = 1;
            $user->token = null;
            unset($user->passwordRepeat);
            
            $user->save();
            
            User::setAlert('success', 'Cuenta creada correctamente');
        }

        $alerts = User::getAlerts();

        $router->render('auth/confirm', [
            'title' => 'Cuenta Confirmada',
            'alerts' => $alerts
        ]);
    }
}