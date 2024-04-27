<?php 
function protecaosql($connect, $textopuro){
    $texto = mysqli_real_escape_string($connect, $textopuro);
    $texto = htmlentities($texto);
    return $texto;
} 
?>