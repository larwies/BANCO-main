<?php
    include('includes/conexao.php');
    $id = $_GET['id'];
    $sql ="SELECT * FROM Animal WHERE id=$id";
    $result =  mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Altera Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            padding-top: 56px; /* Espaçamento para a navbar fixa */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #007bff; /* Cor de fundo da navbar */
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff !important; /* Cor do texto da navbar */
        }
        .navbar-nav .nav-link.active {
            font-weight: bold; /* Destaca o item ativo */
        }
        .form-container {
            max-width: 600px;
            width: 100%;
        }
        .form-container fieldset {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 20px;
            background-color: #ffffff;
        }
        .form-container legend {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-container .form-control, .form-container .form-select {
            border-radius: 0.375rem;
        }
        .form-container .btn-submit {
            background-color: #007bff;
            color: #ffffff;
            border: none;
        }
        .form-container .btn-submit:hover {
            background-color: #0056b3;
        }
        .form-container .form-check {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Alterar Animal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Ínício</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastroCidade.php">Cadastro Cidade</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastroCliente.php">Cadastro Cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastroAnimal.php">Cadastro Animal</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Listar
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="listarCidade.php">Cidade</a></li>
                            <li><a class="dropdown-item" href="listarCliente.php">Cliente</a></li>
                            <li><a class="dropdown-item" href="listarAnimal.php">Animal</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="form-container d-flex flex-column justify-content-center align-items-center">
        <form action="alteraAnimalExe.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Alterar Animal</legend>
                <div class="row g-3 align-items-center m-1">
                    <div class="col-auto">
                        <label for="foto" class="col-form-label">Foto do Animal:</label>
                        <?php
                         if($row['foto'] != ""){
                            echo "<td><img src='./".$row['foto']."' width='80' height='80'/></td>";
                         }
                        ?>
                    </div>
                    <div class="col-auto">
                        <input type="file" name="foto" id="foto"  accept="image/*"class="form-control" aria-describedby="NomeAnimal" required><!-- multiple permite mais de um arquivo -->
                    </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="nome" class="col-form-label">Nome do Animal:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="nome" id="nome" class="form-control" aria-describedby="NomeAnimal" <?php echo $row['nome']?>required>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="especie" class="col-form-label">Espécie do Animal:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="especie" id="especie" class="form-control" aria-describedby="EspecieAnimal"<?php echo $row['especie']?> required>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="raca" class="col-form-label">Raça do Animal:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="raca" id="raca" class="form-control" aria-describedby="RacaAnimal" <?php echo $row ['raca']?>required>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="data_nascimento" class="col-form-label">Data de Nascimento:</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" aria-describedby="DataNascimentoAnimal" value="<?php echo $row['data_nascimento']?>"required>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="castrado" name="castrado" value="1" class="form-check-input" checked>
                    <label for="castrado" class="form-check-label" value="<?php echo $row['castrado']?>">Castrado</label>
                </div>
                <div>
                  <input type="hidden" name='id' value="<?php echo $row['id']?>">;
                </div>
                <div class="mb-3">
                    <label for="pessoa" class="form-label">Dono</label>
                    <select class="form-select" name="pessoa" id="pessoa">
                        <?php 
                            include('includes/conexao.php');
                            $sql = "SELECT * FROM Pessoa";
                            $result = mysqli_query($con, $sql);
                            while ($rowCliente = mysqli_fetch_array($result)) {
                                echo "<option value='".$rowCliente['id']."' ". ($rowCliente['id'] == $row['id_pessoa'] ? "selected" : "" ).">".$rowCliente['nome']."/".$rowCliente['email']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-submit">Atualizar</button>
                </div>
            </fieldset>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
