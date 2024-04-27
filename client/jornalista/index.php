<?php
$connect = require_once "../../database/connect.php";
session_start();
if ((!isset($_SESSION['login']) == true) || (!isset($_SESSION['senha']) == true)) {
  header('location:../index.php');
}
$logado = $_SESSION['login'];
$result = $connect->query("SELECT * FROM jornalista WHERE login = '$logado' or email = '$logado'");
if($result->num_rows>0){
  $linha = $result->fetch_assoc();
  $nome_jornalista = $linha['login'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Jornalista</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .welcome-message {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
        }

        .button-container {
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            text-decoration: none;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="welcome-message">Bem-vindo, <?php echo $nome_jornalista; ?>!</h1>
        <?php
        if (isset($_SESSION['alertlogin'])) {
            echo '<div class="alert alert-info" role="alert">' . $_SESSION['alertlogin'] . '</div>';
            unset($_SESSION['alertlogin']);
        }
        ?>
        <div class="button-container">
            <a href="ver_noticia.php" class="button">Ver minhas Notícias</a>
            <a href="c_noticia.php" class="button">Publicar Notícias</a>
            <a href="../../sair.php" class="button">Sair</a>
        </div>
    </div>
</body>
</html>

