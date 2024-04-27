<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Moderno</title>
    <link rel="stylesheet" href="shared/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['alertlogin'])) {
        echo $_SESSION['alertlogin'];
        unset($_SESSION['alertlogin']);
    }
    ?>
    <div class="login-container">
        <div class="login-card">
            <h1>Login</h1>
            <form action="function/login.php" method="POST">
                <div class="input-wrapper">
                    <input type="text" name="login" id="username" placeholder="Nome ou E-mail" required>
                </div>
                <div class="input-wrapper">
                    <input type="password" name="senha" id="password" placeholder="Senha" required>
                </div>
                <button type="submit" class="login-button">Entrar</button>
            </form>
            <div class="footer">
                <a href="index.php" class="link-button">Voltar</a>
            </div>
        </div>
    </div>
</body>

</html>
