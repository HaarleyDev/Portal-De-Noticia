<?php 

$connect = require_once "../database/connect.php";
require_once "protecao.php";

if($_POST){
    $usuario_jornalista = protecaosql($connect, $_POST['user']);
    $email_jornalista = protecaosql($connect, $_POST['email']);
    $senha_jornalista = password_hash(protecaosql($connect, $_POST['senha']), PASSWORD_DEFAULT);
    $contato_jornalista = protecaosql($connect, $_POST['contato']);

    $select_jornalista = "SELECT * FROM jornalista WHERE email = '$email_jornalista'";
    $result = $connect->query($select_jornalista);
    if($result->num_rows>0){
        while($linha = $result->fetch_assoc()){
            echo "Esse email já existe";
        }
    }else{
        $insert_jornalista = "INSERT INTO jornalista VALUES(0,'$usuario_jornalista','$contato_jornalista','$email_jornalista','$senha_jornalista')";
        if($connect->query($insert_jornalista) ===  true){
            echo "Cadastro feito com sucesso";
        }
    }
}

?>