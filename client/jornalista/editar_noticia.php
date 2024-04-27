<?php
session_start();
$connect = require_once '../../database/connect.php';
$user = $_SESSION['login'];
$pass = $_SESSION['senha'];

if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('location:index.php');
}
?>
<?php
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM noticia WHERE id_n = $id";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    $connect->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Notícia</title>
    <style>
                body {
            font-family: Arial, sans-serif;
            background-color: #f0f5f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            position: relative;
            overflow: hidden;
        }

        label {
            display: block;
            margin-bottom: 20px;
            font-weight: bold;
            color: #317bf2;
            font-size: 18px;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: calc(100% - 20px);
            padding: 15px;
            margin-bottom: 30px;
            border: none;
            border-radius: 8px;
            background-color: #f0f5f9;
            color: #333;
            font-size: 16px;
            box-sizing: border-box;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="file"]:focus,
        textarea:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(49, 123, 242, 0.4);
        }

        textarea {
            min-height: 150px;
            resize: none;
        }

        button {
            width: 100%;
            background-color: #317bf2;
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
            margin-bottom: 15px;
        }

        button:hover {
            background-color: #2659c5;
        }

        .button-container {
            margin-top: 30px;
            text-align: center; /* Centraliza o botão */
        }

        .button-container a {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            color: #317bf2;
            font-size: 16px;
            margin-right: 10px;
            border: 2px solid #317bf2;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;

        }

        .button-container a:hover {
            background-color: #317bf2;
            color: #fff;
        }

        .shape1,
        .shape2 {
            position: absolute;
            width: 200px;
            height: 200px;
            background-color: #317bf2;
            border-radius: 50%;
            z-index: -1;
        }

        .shape1 {
            top: -100px;
            right: -100px;
        }

        .shape2 {
            bottom: -100px;
            left: -100px;
        }

        @media screen and (max-width: 600px) {
            form {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <?php 
    if (isset($_SESSION['InfoEditNoticia'])) {
        echo $_SESSION['InfoEditNoticia'];
        unset($_SESSION['InfoEditNoticia']);
    }
    ?>
    <form action="src/editar_noticia.php" method="post" enctype="multipart/form-data">

        <div class="shape1"></div>
        <div className="shape2"></div>

        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $data['titulo']; ?>" required>

        <label for="noticia">Notícia</label>
        <textarea name="noticia" id="noticia" required><?php echo $data['noticia']; ?></textarea>

        <label for="imagem">Imagem</label>
        <input type="file" name="imagem" id="imagem" accept="image/*" required>
        
        <input type="hidden" name="id_n" value="<?php echo $data['id_n']; ?>">

        <div class="button-container">
            <button type="submit">Atualizar Notícia</button>
            <a href="index.php">Voltar</a>
        </div>
    </form>
</body>
</html>

<?php
}
?>