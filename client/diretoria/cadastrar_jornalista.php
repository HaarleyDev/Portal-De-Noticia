<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar jornalista</title>
</head>
<body>
    <h2>Cadastrar Jornalista</h2>
    <form action="../../function/cadastrar_jornalista.php" method="post">
        <input type="text" name="user" placeholder="Usuario">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="senha" id="" placeholder="Senha">
        <input type="number" name="contato" placeholder="Contato">

        <button type="submit">Cadastrar Jornalista</button>
    </form>
</body>
</html>