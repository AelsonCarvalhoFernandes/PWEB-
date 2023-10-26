<?php

class SessionManager{
    
    function setSession($user){
        $_SESSION["UserSession"] = $user;
    }

    function removerSession(){
        $_SESSION["UserSession"] = null;
    }
}