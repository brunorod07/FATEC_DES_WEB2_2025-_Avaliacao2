<?php
/**
 * Classe responsável por gerenciar dados no MySQL via PDO.
 */
class DB {
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=artesanato_db", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    public function __destruct() {
        $this->conn = null;
    }

    // Cadastrar produto
    public function addProduct($nome, $preco, $descricao, $categoria) {
        $sql = "INSERT INTO produtos_artesanais (nome_produto, preco, descricao, categoria)
                VALUES (:nome, :preco, :descricao, :categoria)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->execute();
    }

    // Listar todos os produtos
    public function getAllProducts() {
        $sql = "SELECT * FROM produtos_artesanais ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Remover produto por ID
    public function deleteProduct($id) {
        $sql = "DELETE FROM produtos_artesanais WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>
