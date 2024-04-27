<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta API</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="api.php" method="get" class="bg-light p-4 shadow">
                    <h4 class="mb-4">Consultar API</h4>
                    <div class="form-group">
                        <label for="acao">Consultar api:</label>
                        <select name="acao" class="form-control">
                            <option value="noticias">Notícias</option>
                            <option value="jornalista">Jornalista</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Consultar</button>
                    <a href="#"><button type="button" class="btn btn-warning">Voltar</button></a>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
