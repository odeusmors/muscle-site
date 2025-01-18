<?php
$servername = "localhost";
$username = "root";
$password = ""; // Use a senha do seu MySQL
$dbname = "clientes_db";

// Conexão
$conn = new mysqli($servername, $username, $password);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Criar banco de dados
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso!";
} else {
    echo "Erro ao criar o banco de dados: " . $conn->error;
}

// Selecionar banco de dados
$conn->select_db($dbname);

// Criar tabela
$sql = "CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabela criada com sucesso!";
} else {
    echo "Erro ao criar a tabela: " . $conn->error;
}

$conn->close();
?>
