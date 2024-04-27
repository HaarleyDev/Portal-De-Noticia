<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas Notícias - Jornal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #343a40;
            color: #fff;
            border-bottom: none;
            padding: 10px 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .card-text {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
            padding: 10px 20px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .btn-editar,
        .btn-excluir {
            margin-right: 10px;
        }

        .btn {
            font-size: 16px;
            padding: 8px 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['infodelete'])) {
        echo $_SESSION['infodelete'];
        unset($_SESSION['infodelete']);
    }
    $connect = require_once "../../database/connect.php";
    $user = $_SESSION['login'];
    $pass = $_SESSION['senha'];
    if ((!isset($_SESSION['login']) == true) || (!isset($_SESSION['senha']) == true)) {
        header('location:../../index.php');
    }
    $logado = $_SESSION['login'];

    $result = $connect->query("SELECT * FROM jornalista WHERE email = '$logado' or login = '$logado'");
    if ($result->num_rows > 0) {
        while ($linha = $result->fetch_assoc()) {
            $id_jornalista = $linha['id'];
        }
    }
    ?>
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Suas Notícias</li>
            </ol>
        </nav>
        <?php
        $sql = "SELECT n.id_n, n.titulo, n.noticia, n.data, n.id_jorn, j.login, j.id, n.imagem
        FROM noticia AS n, jornalista AS j 
        WHERE j.id = $id_jornalista and j.id = n.id_jorn";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            while ($linha = $result->fetch_assoc()) {
        ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $linha['titulo']; ?></h4>
                    </div>
                    <div class="card-body">
                    <p class="card-text"><img src="../../<?php echo $linha['imagem'] ?>" class="img-fluid" alt=""></p>
                        <p class="card-text"><?php echo nl2br($linha['noticia']); ?></p>
                        Data: <?php echo $linha['data']; ?><br>
                        Autor: <?php echo $linha['login']; ?><br><br>
                        <?php echo "<a href=editar_noticia.php?id=".$linha['id_n']." class='btn btn-primary btn-editar'>Editar</a>" ?>
                        <button type="button" class="btn btn-danger btn-excluir" data-bs-toggle="modal" data-bs-target="#confirmarExclusao_<?php echo $linha['id_n']; ?>">
                            Excluir
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="confirmarExclusao_<?php echo $linha['id_n']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Exclusão</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza de que deseja excluir esta notícia?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <form action="src/excluir_noticia.php" method="post">
                                            <input type="hidden" name="id_n" value="<?php echo $linha['id_n']; ?>" />
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<h3>Nenhuma notícia cadastrada.</h3>";
        }
        ?>
        <a href="c_noticia.php" class="btn btn-primary me-2">Cadastrar Nova Notícia</a>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>