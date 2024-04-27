<?php
session_start();

$connect = require_once "../database/connect.php";
require_once "protecao.php";

$login = protecaosql($connect, $_POST['login']);
$senha = protecaosql($connect, $_POST['senha']);

$result = $connect->query("SELECT * FROM `jornalista` WHERE `login` = '$login' or `email` = '$login' LIMIT 1");
$linha = $result->fetch_assoc();
if (password_verify($_POST['senha'], $linha['senha'])) {
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['alertlogin'] = '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 7000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            }
          });
          Toast.fire({
            icon: "success",
            title: "Login efetuado com sucesso, seja bem-vindo ao seu painel."
          });
          </script>
        ';
        header('location:../client/jornalista/index.php');
        exit();
    }
} 

$result = $connect->query("SELECT * FROM `diretoria` WHERE `email_dir` = '$login' and `senha_dir` = '$senha'");
$linha = $result->fetch_assoc();
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['alertlogin'] = '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 7000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            }
          });
          Toast.fire({
            icon: "success",
            title: "Login efetuado com sucesso, seja bem-vindo ao seu painel."
          });
          </script>
        ';
        header('location:../client/diretoria/index.php');
        exit();
    }

unset($_SESSION['login']);
unset($_SESSION['senha']);
$_SESSION['alertlogin'] = '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 7000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            }
          });
          Toast.fire({
            icon: "error",
            title: "Erro ao efetuar login, e-mail ou senha incorreta!"
          });
          </script>
        ';
header('location:../login.php');
?>
