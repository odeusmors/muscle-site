<?php
$servername = "localhost";
$username = "root";
$password = ""; // Use a senha do seu MySQL
$dbname = "clientes_db";

// Conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber dados do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];

// Inserir dados na tabela
$sql = "INSERT INTO clientes (nome, telefone) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nome, $telefone);

if ($stmt->execute()) {
    echo "Cliente registrado com sucesso!";
} else {
    echo "Erro ao registrar cliente: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
