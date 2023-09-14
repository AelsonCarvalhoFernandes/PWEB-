<?php

require_once './Services/DatabaseConnection.php';

class Migration{

    function __construct(){

        $connection = new DatabaseConnection;
        $conn = $connection->getConnection();
        $conn->execute_query($this->cliente());
        
    }

    function cliente(){
        $sql = '
            create table CLiente(
                id int auto_increment primary key,
                username varchar(20) not null,
                email varchar(100) not null,
                password varchar(30) not null,
                rg varchar(15) not null,
                cpf varchar(15) not null,
                telefone varchar(15) not null,
                foto_url varchar(300)
            );
        ';

        return $sql;
    }
}

new Migration();