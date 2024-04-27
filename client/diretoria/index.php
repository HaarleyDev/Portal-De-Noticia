<?php 
$connect = require_once("../../database/connect.php");
session_start();
if((!isset($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
  header('location:../../index.php');
  }else{}

  $login = $_SESSION['login'];

$sql = "SELECT * FROM `diretoria` WHERE `email_dir` = '$login'";
$result = $connect->query($sql);
if($result -> num_rows > 0){
  while($linha = $result -> fetch_assoc()){
    $logado=$linha['nome_dir'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Diretoria</title>
</head>
<body>
<?php
    if (isset($_SESSION['alertlogin'])) {
        echo $_SESSION['alertlogin'];
        unset($_SESSION['alertlogin']);
    }
    ?>
    <h2>Tela Diretoria</h2>
    <h4>Bem vindo <?php echo $logado; ?></h4>
    <a href="cadastrar_jornalista.php"><button>Cadastrar Jornalista</button></a>
    <table border="1px">
      <thead>
        <tr>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Contat</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $sql = "SELECT * FROM jornalista";
        $result = $connect->query($sql);
        if($result -> num_rows > 0){
          while($linha = $result -> fetch_assoc()){
            echo '<tr>
                  <td>'.$linha['login'].'</td>
                  <td>'.$linha['email'].'</td>
                  <td>'.$linha['contato'].'</td>
                  <td>
                  <a href="#"><button type="button">Olhar Noticias</button></a>
                  <a href="#"><button type="button">Excluir</button></a>
                  </td>
                  </tr>';
          }
        }
        
        ?>
      </tbody>
    </table>
    <a href="../../sair.php"><button>Sair</button></a>
</body>
</html>