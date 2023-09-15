<?php

require_once './Routes/Routes.php';

if(array_key_exists($_SERVER['REQUEST_METHOD'], $route)){
    if(array_key_exists($_SERVER['REQUEST_URI'], $route[$_SERVER['REQUEST_METHOD']])){
        call_user_func($route[$_SERVER['REQUEST_METHOD']][$_SERVER['REQUEST_URI']]);
    }else{
        echo 'Rota não encontrada';
    }

}else{
    echo 'Metodo de requisição não suportado';
}