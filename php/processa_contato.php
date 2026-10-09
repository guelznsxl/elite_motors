<?php
require_once __DIR__ . '/../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    if (!empty($nome) && !empty($email) && !empty($mensagem)) {
        try {
            // Uso de prepared statements sem concatenação[cite: 1]
            $stmt = $conexao->prepare("INSERT INTO mensagens (nome, email, mensagem) VALUES (?, ?, ?)");
            $stmt->execute([$nome, $email, $mensagem]);

            header("Location: contato.php?status=sucesso");
            exit;
        } catch (PDOException $e) {
            header("Location: contato.php?status=erro");
            exit;
        }
    } else {
        header("Location: contato.php?status=vazio");
        exit;
    }
} else {
    header("Location: contato.php");
    exit;
}
?>