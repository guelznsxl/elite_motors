<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contato - Elite Motors</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Elite Motors</h1>
        <nav>
            <a href="../index.html">Início</a> | 
            <a href="contato.php">Contato</a> | 
            <a href="mensagens.php">Ver Mensagens</a>
        </nav>
    </header>

    <main>
        <h2>Fale Conosco</h2>

        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] === 'sucesso'): ?>
                <p style="color: green;">Mensagem enviada com sucesso!</p>
            <?php elseif ($_GET['status'] === 'erro'): ?>
                <p style="color: red;">Erro ao enviar a mensagem. Tente novamente.</p>
            <?php elseif ($_GET['status'] === 'vazio'): ?>
                <p style="color: orange;">Por favor, preencha todos os campos.</p>
            <?php endif; ?>
        <?php endif; ?>

        <form action="processa_contato.php" method="POST">
            <div>
                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome" required>
            </div>
            <br>
            <div>
                <label for="email">E-mail:</label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <br>
            <div>
                <label for="mensagem">Mensagem:</label><br>
                <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
            </div>
            <br>
            <button type="submit">Enviar Mensagem</button>
        </form>
    </main>
</body>
</html>