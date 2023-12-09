<?php

require_once '../Services/DatabaseConnection.php';

class Migration{

    function __construct(){

        $connection = new DatabaseConnection;
        $conn = $connection->getConnection();

        $conn->execute_query($this->users());
        $conn->execute_query($this->client());
        $conn->execute_query($this->seller());
        $conn->execute_query($this->addressUser());
        $conn->execute_query($this->product());
        $conn->execute_query($this->sale());

        $conn->close();
        
    }

    function users() {
        $sql = '
            create table if not exists users (
                id int auto_increment primary key,
                username varchar(20) not null,
                email varchar(100) not null,
                password varchar(30) not null,
                rg varchar(13) not null,
                cpf varchar(14) not null,
                cellphone varchar(15) not null,
                type varchar(10) not null,
                url_profile_picture varchar(300),
                money decimal(10,2)
            );
        ';

        return $sql;
    }

    function client() {
        $sql = '
            create table if not exists client (
                id int auto_increment primary key,
                id_user int,
                foreign key(id_user) references users(id)
            );
        ';

        return $sql;
    }

    function seller() {
        $sql = '
            create table if not exists seller (
                id int auto_increment primary key,
                id_user int,
                foreign key(id_user) references users(id)
            );
        ';

        return $sql;
    }

    function addressUser() {
        $sql = '
            create table if not exists address_user (
                id int auto_increment primary key,
                street varchar(100),
                neighborhood varchar(100),
                city varchar(50),
                state varchar(2),
                country varchar(30),
                number int,
                id_user int,
                cep varchar(9),
                foreign key(id_user) references users(id)
            );
        ';

        return $sql;
    }

    function product() {
        $sql = '
            create table if not exists product (
                id int auto_increment primary key,
                name varchar(100) not null,
                quantity int not null,
                category varchar(100) not null,
                price decimal(10,2) not null,
                description text not null,
                creation_date date not null,
                update_date date not null,
                url_image varchar(300) not null,
                id_seller int,
                foreign key(id_seller) references seller(id)
            );
        ';

        return $sql;
    }

    function sale() {
        $sql = '
            create table if not exists sale (
                id int auto_increment primary key,
                id_client int not null,
                id_seller int not null,
                id_product int not null,
                price decimal(10,2) not null,
                date date not null,
                foreign key(id_client) references client(id),
                foreign key(id_seller) references seller(id),
                foreign key(id_product) references product(id)
            );
        ';
        return $sql;
    }
}

new Migration();