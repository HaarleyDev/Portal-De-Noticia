<?php
$connect = require_once("../../../database/connect.php");
session_start(); 

$login = $_SESSION['login'];
$senha = $_SESSION['senha'];

function generateDir(int $n): string {
    $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $dir = "";
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $dir .= $characters[$index];
    }
    return $dir;
}

if ($_POST) {
    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    $time = new DateTime('now');
    $data = $time->format('d/m/Y H:i');
    $imagem = $_FILES['imagem'];
    $imagemPath = "assets/noticias/" . generateDir(10) . $imagem['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], "../../../".$imagemPath);
    $id_noticia = $_POST['id_n'];

    $sql = "UPDATE noticia SET titulo = '$titulo', noticia = '$noticia', data = '$data', imagem = '$imagemPath' WHERE id_n = '$id_noticia'";

    if ($connect->query($sql) === TRUE) {
        $_SESSION['InfoEditNoticia'] = '
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
            title: "Notícia cadastrada com sucesso."
          });
          </script>
        ';
        header('location:../ver_noticia.php');
    } else {
        die("Erro: " . $sql . "<br>" . $connect->error);
    }
}
?>