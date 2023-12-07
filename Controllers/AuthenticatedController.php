<?php

require_once './Services/Engine.php';
require_once './Repositories/UserRepository.php';
require_once './Repositories/ClientRepository.php';
require_once './Repositories/SellerRepository.php';

require_once './Repositories/AddressUserRepository.php';
require_once './Repositories/ProductsRepository.php';
require_once './Repositories/SaleRepository.php';

class AuthenticatedController{

    private $userRepository;
    private $clientRepository;
    private $sellerRepository;
    private $addressUserRepository;
    private $productRepository;
    private $saleRepository;

    function __construct(){
        $this->userRepository = new UserRepository();
        $this->clientRepository = new ClientRepository();
        $this->sellerRepository = new SellerRepository();
        $this->addressUserRepository = new AddressUserRepository();
        $this->productRepository = new ProductRepository();
        $this->saleRepository = new SaleRepository();

    }

    /*
        Pega os dados de perfil do usuário
    */
    function profile() {

        if (isset($_SESSION['user'])) {
            $id = $_SESSION['user']['id'];
    
            $data = $this->userRepository->selectById($id);
            $dataAddress = $this->addressUserRepository->findByIdUser($id);
    
            $viewData = [
                'data' => $data,
                'dataAddress' => $dataAddress,
            ];
    
            return view('Profile', $viewData);
    
        } else {
            header("Location: /login");
            exit();
        }
    }

    /*
        Atualiza os dados de perfil do usuário
    */
    function updateProfile() {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $id = $user['id'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $rg = $_POST['rg'];
            $cpf = $_POST['cpf'];
            $cellphone = $_POST['cellphone'];
            $type = $user['type'];
    
            $street = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $country = $_POST['country'];
            $number = $_POST['number'];
            $cep = $_POST['cep'];
            $neighborhood = $_POST['neighborhood'];
    
            $conn = $this->userRepository->connection->getConnection();
            $conn->autocommit(false); // Desativa o autocommit para começar uma transação
    
            try {
                $updateUser = $this->userRepository->update($username, $email, $rg, $cpf, $cellphone, $type, $id);
                $updateAddress = $this->addressUserRepository->update($cep, $street, $number, $neighborhood, $city, $state, $country, $id);
    
                // Commit apenas se ambas as atualizações forem bem-sucedidas
                if ($updateUser && $updateAddress) {
                    $conn->commit();
                } else {
                    throw new Exception("Erro ao atualizar usuário ou endereço");
                }
    
                $data = $this->userRepository->selectById($id);
                $address = $this->addressUserRepository->findByIdUser($id);
    
                header("Location: /profile");
                return view('Profile', ['data' => $data, 'dataAddress' => $address, 'Success' => 'Perfil atualizado com sucesso']);

            } catch (Exception $e) {
                $conn->rollback(); // Reverte a transação em caso de erro
                header("Location: /profile");
                return view('Profile', ['Error' => 'Erro ao atualizar perfil']);

            } finally {
                $conn->autocommit(true); // Restaura o autocommit para o estado original
                $conn->close();
            }
        } else {
            header("Location: /login");
            exit();
        }
    }
    
    function library() {

        if (isset($_SESSION['user'])) {
            
            if ($_SESSION['user']['type'] == 'client') {
                $this->libraryClient();
            } else {
                $this->librarySeller();
            }
    
        } else {
            header("Location: /login");
            exit();
        }
    }    

    function libraryClient() {
        $id_user = $_SESSION['user']['id'];
        $userResult = $this->clientRepository->selectById($id_user);

        if ($userResult) {
            $userData = $userResult->fetch_assoc();
            $id_client = $userData['id'];

            $dataProducts = $this->productRepository->selectProductsByIdClient($id_client);

            $viewData = [
                'dataProducts' => $dataProducts,
            ];

            return view('Library', $viewData);

        } else {
            echo "Erro ao buscar usuário";
        }
    }

    function librarySeller() {
        $id_user = $_SESSION['user']['id'];
        $userResult = $this->sellerRepository->selectById($id_user);

        if ($userResult) {
            $userData = $userResult->fetch_assoc();
            $id_seller = $userData['id'];

            $dataProducts = $this->productRepository->selectProductoFromSeller($id_seller);

            $viewData = [
                'dataProducts' => $dataProducts,
            ];

            return view('Library', $viewData);

        } else {
            echo "Erro ao buscar usuário";
        }
    }




    /*
    function updateProfile() {

        if(isset($_SESSION['user'])){

            $user = $_SESSION['user'];

            $id = $user['id'];   
            $username = $_POST['username'];
            $email = $_POST['email'];
            //$password = $_POST['password'];
            $rg = $_POST['rg'];
            $cpf = $_POST['cpf'];
            $cellphone = $_POST['cellphone'];
            $type = $user['type'];

            $street = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $country = $_POST['country'];
            $number = $_POST['number'];
            $cep = $_POST['cep'];
            $neighborhood = $_POST['neighborhood'];

            $data = $this->userRepository->update($id, $username, $email, $rg, $cpf, $cellphone, $type)->fetch_assoc() ;
            $address =  $this->addressUserRepository->update($id, $cep, $street, $number, $neighborhood, $city, $state)->fetch_assoc();

            return view('Profile', ['data' => $data, 'dataAddress' => $address, 'Success' => 'Perfil atualizado com sucesso']);

        }else{
            header("Location: /login");
            exit();
        }
    }*/

    /*
    function library() {
        if (isset($_SESSION['user'])) {
            $id = $_SESSION['user']['id'];
    
            if ($_SESSION['user']['type'] == 'cliente') {
                $dataProducts = $this->productRepository->selectProductsByIdCliente($id);
            } else {
                $dataProducts = $this->productRepository->selectProductsByIdCliente($id);
            }
    
            // Crie um array associativo com uma chave para os dados
            $viewData = [
                'dataProducts' => $dataProducts,
            ];
    
            return view('Library', $viewData);
    
        } else {
            header("Location: /login");
            exit();
        }
    }    
    */
}