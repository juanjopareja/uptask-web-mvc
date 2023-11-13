<?php

namespace Model;

class User extends ActiveRecord {
    protected static $table = 'users';
    protected static $columnsDB = ['id', 'name', 'email', 'password', 'token', 'confirmed'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->passwordRepeat = $args['passwordRepeat'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmed = $args['confirmed'] ?? 0;
    }

    public function validateNewAccount() {
        if(!$this->name) {
            self::$alerts['error'][] = 'El nombre del usuario es obligatorio';
        }

        if(!$this->email) {
            self::$alerts['error'][] = 'El email del usuario es obligatorio';
        }

        if(!$this->password) {
            self::$alerts['error'][] = 'El password del usuario es obligatorio';
        }

        if(strlen($this->password) < 6) {
            self::$alerts['error'][] = 'El password debe contener al menos 6 caracteres';
        }

        if($this->password !== $this->passwordRepeat) {
            self::$alerts['error'][] = 'Los passwords son diferentes';
        }

        return self::$alerts;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function createToken() {
        $this->token = uniqid();
    }
}