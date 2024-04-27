<?php 
$connect = require_once("../../../database/connect.php");
session_start(); 

$login = $_SESSION['login'];
$senha = $_SESSION['senha'];

$sql = "SELECT * FROM jornalista WHERE `login` = '$login' or `email` = '$login'";
$result = $connect->query($sql);
if($result -> num_rows > 0){
    while($linha = $result -> fetch_assoc()){
        $id_f = $linha['id'];
    }
}

function generateDir(int $n): string {
    $characters="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
   $dir = "";
   for($i = 0; $i<$n; $i++){
       $index = rand(0, strlen($characters)-1);
       $dir .= $characters[$index];
   }
   return $dir;
}
if($_POST){
    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    $time = new datetime('now');
    $data = $time->format('d/m/Y H:i');
    $imagem = $_FILES['imagem'];
    $imagem = "assets/noticias/".generateDir(10).$imagem['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], "../../../".$imagem);

    $sql = "INSERT INTO noticia VALUES (0,'$titulo','$noticia','$data','$id_f', '$imagem')";
    if($connect ->query($sql) === TRUE){
        $_SESSION['InfoCadNoticia'] = '
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
        header('location:../c_noticia.php');
    }else{
        die("Erro".$sql.$connect -> connect_error);
    }
}
?>