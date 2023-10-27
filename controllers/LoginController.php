<?php

namespace Controllers;

class LoginController {
    public static function login() {
        echo "Desde login...";

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }
    }
    
    public static function logout() {
        echo "Desde logout...";
    }

    public static function create() {
        echo "Desde crear...";
    
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        }
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