<?php

namespace Models;
require ("vendor/autoload.php");
use Connections\connection;
use PDO;

class UserModel {

    private $pdo;
    public function __construct() {
        $connect = new connection();
        $this->pdo = $connect->getConnection();
    }

    public function api($method, $objetivo, $data = NULL) {
        switch ($method) {
            case 'POST':
                if($objetivo === 'postagens'){
                return $this->CreateUser($data);
             }
            case 'GET':
               if($objetivo === 'postagens'){
                return $this->getUser();
            }
            default:
                return ["error" => "Método não suportado"];
        }
    }

    private function createUser($data) {
        $decodedData = $data;

        if (isset($decodedData)) {
            $conteudo = $decodedData;

            $sql = "INSERT INTO usuarios (nome) VALUES (:conteudo)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':conteudo', $conteudo, PDO::PARAM_STR);

            if ($stmt->execute()) {
                return ["message" => "Postagem criada com sucesso"];
            } else {
                return ["error" => "Erro ao criar postagem"];
            }
        } else {
            return ["error" => "Dados de entrada inválidos"];
        }
    }

    private function getUser() {   

            $sql = $this->pdo->query("SELECT * FROM usuarios");
            $posts = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $posts;
    }
}

?>