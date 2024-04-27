<?php
session_start();
$connect = require_once '../../../database/connect.php';
if ($_POST) {
    $id = $_POST['id_n'];
    $sql = "DELETE FROM noticia WHERE id_n = $id";
    if ($connect->query($sql) === TRUE) {
        $_SESSION['infodelete'] = '
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
            title: "Notícia deletada com sucesso."
          });
          </script>
        ';
        header('location:../ver_noticia.php');
    } else {
        echo "Erro ao excluir o registro: " . $connect->error;
    }
    $connect->close();
}