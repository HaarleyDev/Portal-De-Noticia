<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "noticia";

//criar minha conexão
return new mysqli($localhost, $username, $password, $dbname);
