<?php

class HomeController{
    function home(){
        readfile('./Pages/Home.php');
    }

    function contact(){
        echo 'contact';
    }

    function register(){

    }
}