<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}function showErr($errName){
    $err = $errName."Error";
    if(isset($_SESSION[$err])){
        echo <<<HTML
        <span class="error">{$_SESSION[$err]}</span>
        HTML;
        unset($_SESSION[$err]);
    }
}