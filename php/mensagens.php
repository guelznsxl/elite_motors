<?php
require_once __DIR__ . '/../config/conexao.php';

try {
    $stmt = $conexao->prepare("SELECT nome, email, mensagem, data_envio FROM mensagens ORDER BY id DESC");
    $stmt->execute();
    $mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar mensagens: " . htmlspecialchars($e->getMessage()));
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mensagens Recebidas - Elite Motors</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Elite Motors - Painel de Mensagens</h1>
        <nav>
            <a href="../index.html">Início</a> | 
            <a href="contato.php">Voltar ao Contato</a>
        </nav>
    </header>

    <main>
        <h2>Mensagens Recebidas</h2>

        <?php if (empty($mensagens)): ?>
            <p>Nenhuma mensagem cadastrada até o momento.</p>
        <?php else: ?>
            <table border="1" cellpadding="8" cellspacing="0">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Mensagem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mensagens as $msg): ?>
                        <tr>
                            <!-- Todas as saídas são protegidas com htmlspecialchars()[cite: 1] -->
                            <td><?= htmlspecialchars(date('d/m/Y H:i', strtotime($msg['data_envio']))) ?></td>
                            <td><?= htmlspecialchars($msg['nome']) ?></td>
                            <td><?= htmlspecialchars($msg['email']) ?></td>
                            <td><?= nl2br(htmlspecialchars($msg['mensagem'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
</body>
</html>