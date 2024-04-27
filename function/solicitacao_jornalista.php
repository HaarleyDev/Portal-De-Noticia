<?php 
$connect = require_once "../database/connect.php";
require_once "protecao.php";

if($_POST){
    $nome_soli = protecaosql($connect, $_POST['nome']);
    $contato_soli = protecaosql($connect, $_POST['contato']);
    $email_soli = protecaosql($connect, $_POST['email']);
    $senha_soli = protecaosql($connect, $_POST['senha']);

    $select_soli = "SELECT * FROM solicitacao WHERE email_soli = '$email_soli'";
    $result = $connect->query($select_soli);
    if($result->num_rows>0){
        while($linha = $result->fetch_assoc()){
            echo "Esse email já foi cadastro";
        }
    }else{
        $insert_soli = "INSERT INTO solicitacao VALUES(0, '$nome_soli','$email_soli','$senha_soli','$contato_soli')";
        if($connect->query($insert_soli) === TRUE){
            echo "Cadastro feito com sucesso";
        }
    }
}
?>