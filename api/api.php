<?php
$connect = require_once "../database/connect.php";
@$acao = $_REQUEST['acao'];

if(!isset($acao)){
    header('Location:consultar_api.php');
}
$return = array();
if ($acao === "noticias") {
    $select_noticias = "SELECT n.id_n, n.titulo, n.noticia, n.data, n.id_jorn, j.login, j.id FROM jornalista as j, noticia as n WHERE n.id_jorn = j.id;";
    $result = $connect->query($select_noticias);
    if ($result->num_rows > 0) {
        while ($linha = $result->fetch_assoc()) {
            $return[] = array(
                "id_noticia" => $linha['id_n'],
                "id_jornalista" => $linha['id_jorn'],
                "nome_jornalista" => $linha['login'],
                "titulo_noticia" => $linha['titulo'],
                "noticia" => $linha['noticia'],
                "data_noticia" => $linha['data'],
            );
        }
    } else {
        echo responseJSON(array("message" => "Notícia"));
    }
} else if ($acao === "jornalista") {
    $select_jornalista = "SELECT * FROM jornalista";
    $result = $connect->query($select_jornalista);
    if ($result->num_rows > 0) {
        while ($linha = $result->fetch_assoc()) {
            $return[] = array(
                "id_jornalista" => $linha['id'],
                "nome_jornalista" => $linha['login'],
                "email_jornalista" => $linha['email'],
                "contato_jornalista" => $linha['contato']
            );
        }
        } else {
        echo responseJSON(array("message" => "Notícia"));
    }
}


function responseJSON(array $arr, $filename = 'data.json')
{
    $jsondata = json_encode($arr, JSON_PRETTY_PRINT);
    file_put_contents($filename, $jsondata);
    header('Content-Type: application/json');
    echo $jsondata;
}

responseJSON($return);

?>