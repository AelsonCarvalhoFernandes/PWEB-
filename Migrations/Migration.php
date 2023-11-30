<?php

require_once '../Services/DatabaseConnection.php';

class Migration{

    function __construct(){

        $connection = new DatabaseConnection;
        $conn = $connection->getConnection();
        $conn->execute_query($this->cliente());
        $conn->execute_query($this->vendedor());
        $conn->execute_query($this->enderecoCliente());
        $conn->execute_query($this->enderecoVendedor());
        $conn->execute_query($this->produto());
        $conn->execute_query($this->venda());

        $conn->close();
        
    }

    function cliente(){
        $sql = '
            create table Cliente(
                id int auto_increment primary key,
                username varchar(20) not null,
                email varchar(100) not null,
                password varchar(30) not null,
                rg varchar(15) not null,
                cpf varchar(15) not null,
                telefone varchar(15) not null,
                foto_url varchar(300),
                type varchar(10) not null
            );
        ';

        return $sql;
    }

    function enderecoCliente(){
        $sql = '
            create table cliente_endereco(
                id int auto_increment primary key, 
                logradouro varchar(100), 
                cidade varchar(50), 
                uf varchar(2), 
                pais varchar(30), 
                n_residencia int, 
                id_cliente int,
                constraint fk_cliente foreign key(id_cliente) references Cliente(id)
            );
        ';
        return $sql;
    }

    function vendedor(){
        $sql = '
            create table Vendedor(
                id int auto_increment primary key,
                username varchar(20) not null,
                email varchar(100) not null,
                password varchar(30) not null,
                cnpj_rg varchar(15) not null,
                cnpj_cpf varchar(15) not null,
                telefone varchar(15) not null,
                carteira float,
                foto_url varchar(300),
                type varchar(10) not null
            );
        ';

        return $sql;
    }

    function enderecoVendedor(){
        $sql = '
            create table cliente_vendedor(
                id int auto_increment primary key, 
                logradouro varchar(100), 
                cidade varchar(50), 
                uf varchar(2), 
                pais varchar(30), 
                n_residencia int, 
                id_vendedor int,
                foreign key(id_vendedor) references Vendedor(id)
            );
        ';
        return $sql;
    }

    function produto(){
        $sql = '
            create table Produto(
                id int auto_increment primary key, 
                nome varchar(100), 
                quant int, 
                categoria varchar(100), 
                preco float, 
                descricao text, 
                dataCriacao date, 
                dataAtualizacao date, 
                id_vendedor int,
                foreign key(id_vendedor) references Vendedor(id)
            );
        ';
        return $sql;
    }

    function venda(){
        $sql = '
            create table Venda(
                id int auto_increment primary key,
                id_cliente int,
                id_vendedor int,
                id_produto int,
                preco float,
                data date,
                foreign key(id_cliente) references Cliente(id),
                foreign key(id_vendedor) references Vendedor(id),
                foreign key(id_produto) references Produto(id)
            );
        ';
        return $sql;
    }
}

new Migration();