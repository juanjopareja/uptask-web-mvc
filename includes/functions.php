<?php

function debug($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// HTML sanitizer
function s($html) : string {
    $sanitizer = htmlspecialchars($html);
    return $sanitizer;
}

// User authentication check
function isAuth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}