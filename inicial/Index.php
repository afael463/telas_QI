<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Noteday</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="logo">Noteday</div>
        <nav>
            <a href="#">Início</a>
            <a href="#">Sobre</a>
            <a href="#">Contato</a>
            <?php if (isset($_SESSION['user_role'])): ?>
                <a href="#">Meu Perfil</a>
                <?php if ($_SESSION['user_role'] === 'admin'): ?>
                    <a href="#admin-panel">Painel Admin</a>
                <?php endif; ?>
                <a href="#">Sair</a>
            <?php else: ?>
                <a href="#">Login</a>
                <a href="#">Cadastro</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <section id="user-area">
            <h1>Bem-vindo à Página Inicial!</h1>
            <p>Explore nossos conteúdos e serviços!</p>
            <button class="cta-button">Explore Já!</button>
        </section>

        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
            <section id="admin-panel">
                <hr>
                <h2>Painel do Administrador</h2>
                <p>Aqui você pode gerenciar o conteúdo e os usuários do seu site :).</p>
                <ul>
                    <li><a href="#">Gerenciar Usuários</a></li>
                    <li><a href="#">Publicar Novos Posts</a></li>
                    <li><a href="#">Ver Relatórios</a></li>
                </ul>
            </section>
        <?php endif; ?>

    </main>

    <footer>
        <p>&copy; 2025 Noteday. Todos os direitos reservados.</p>
    </footer>
</body>

</html>