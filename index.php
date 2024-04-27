<?php
$connect = require_once("database/connect.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Últimas Notícias - DIARIOGH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="shared/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="logo">Notícia News</h2>
                <nav>
                    <ul class="nav">
                        <li class="nav-item"><a href="login.php" class="nav-link btn btn-light" role="button"><i class='bx bx-user-plus'></i> Entrar</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="container my-2">
        <form method="GET" class="mb-2">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar notícias..." name="consul_noticia">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </form>
    </main>
    <main class="container my-5">
        <h1 class="mb-4">Últimas Notícias</h1>
        <?php
        @$termoPesquisa = $_GET['consul_noticia'];
        $sql = "SELECT n.id_n, n.noticia, n.titulo, j.login, n.data, n.imagem  
        FROM noticia AS n, jornalista AS j 
        WHERE n.id_jorn = j.id and n.noticia LIKE '%$termoPesquisa%'
        ORDER BY n.data DESC";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";
            while ($linha = $result->fetch_assoc()) {
                $imagemCaminho = $linha['imagem'];
                if (file_exists($imagemCaminho)) {
                    $imagemURL = $imagemCaminho;
                } else {
                    $imagemURL = "assets/default.png";
                }
                echo "<div class='col'>";
                echo "<div class='card h-100'>";
                echo "<img src='" . $imagemURL . "' class='card-img-top'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $linha['titulo'] . "</h5>";
                echo "<p class='card-text'>" . substr($linha['noticia'], 0, 50) . "...</p>";
                echo "<button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalNoticia" . $linha['id_n'] . "'>Ver notícia</button>";
                echo "</div>";
                echo "<div class='card-footer'>";
                echo "<small class='text-muted'>Autor(a): " . $linha['login'] . "</small><br>";
                echo "<small class='text-muted'>Data publicação: " . $linha['data'] . "</small>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "<div class='modal fade' id='modalNoticia" . $linha['id_n'] . "' tabindex='-1' aria-labelledby='modalNoticiaLabel" . $linha['id_n'] . "' aria-hidden='true'>";
                echo "<div class='modal-dialog modal-dialog-centered modal-lg'>";
                echo "<div class='modal-content'>";
                echo "<div class='modal-header'>";
                echo "<h5 class='modal-title' id='modalNoticiaLabel" . $linha['id_n'] . "'>" . $linha['titulo'] . "</h5>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                echo "</div>";
                echo "<div class='modal-body'>";
                echo "<img src='" . $imagemURL . "' class='img-fluid mb-3' alt='Imagem da Notícia'>";
                echo "<p>" . $linha['noticia'] . "</p>";
                echo "</div>";
                echo "<div class='modal-footer'>";
                echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<div class='alert alert-warning' role='alert'>Nenhuma notícia encontrada.</div>";
        }
        ?>
    </main>
    <footer class="">
        <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Desenvolvido por:
            <a class="text-reset fw-bold" href="https://github.com/HaarleyDev" target="_blank">HaarleyDev</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>