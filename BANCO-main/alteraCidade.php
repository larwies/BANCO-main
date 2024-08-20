<?php
    include('includes/conexao.php');
    $id = $_GET['id'];
    $sql ="SELECT * FROM Cidade WHERE id=$id";
    $result =  mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Altera Cidade</title>
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Alterar Cidade</a>
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
        <form action="alteraCidadeExe.php" method="post">
            <fieldset>
                <legend>Alterar Cidade</legend>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="nome" class="col-form-label">Nome da Cidade:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="nome" id="nome" class="form-control" aria-describedby="NomeCidade" value="<?php echo $row['nome']?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Sigla do Estado:</label>
                    <label for="estado">Sigla do Estado:</label>
                    <select class="form-select" name="estado" id="estado">
                    <option value="AC"<?php echo $row['estado'] == "AC" ? " selected" : ""; ?>>AC</option>
                    <option value="AL"<?php echo $row['estado'] == "AL" ? " selected" : ""; ?>>AL</option>
                    <option value="AP"<?php echo $row['estado'] == "AP" ? " selected" : ""; ?>>AP</option>
                    <option value="AM"<?php echo $row['estado'] == "AM" ? " selected" : ""; ?>>AM</option>
                    <option value="BA"<?php echo $row['estado'] == "BA" ? " selected" : ""; ?>>BA</option>
                    <option value="CE"<?php echo $row['estado'] == "CE" ? " selected" : ""; ?>>CE</option>
                    <option value="ES"<?php echo $row['estado'] == "ES" ? " selected" : ""; ?>>ES</option>
                    <option value="GO"<?php echo $row['estado'] == "GO" ? " selected" : ""; ?>>GO</option>
                    <option value="MA"<?php echo $row['estado'] == "MA" ? " selected" : ""; ?>>MA</option>
                    <option value="MT"<?php echo $row['estado'] == "MT" ? " selected" : ""; ?>>MT</option>
                    <option value="MS"<?php echo $row['estado'] == "MS" ? " selected" : ""; ?>>MS</option>
                    <option value="MG"<?php echo $row['estado'] == "MG" ? " selected" : ""; ?>>MG</option>
                    <option value="PA"<?php echo $row['estado'] == "PA" ? " selected" : ""; ?>>PA</option>
                    <option value="PB"<?php echo $row['estado'] == "PB" ? " selected" : ""; ?>>PB</option>
                    <option value="PE"<?php echo $row['estado'] == "PE" ? " selected" : ""; ?>>PE</option>
                    <option value="PI"<?php echo $row['estado'] == "PI" ? " selected" : ""; ?>>PI</option>
                    <option value="RJ"<?php echo $row['estado'] == "RJ" ? " selected" : ""; ?>>RJ</option>
                    <option value="RN"<?php echo $row['estado'] == "RN" ? " selected" : ""; ?>>RN</option>
                    <option value="RS"<?php echo $row['estado'] == "RS" ? " selected" : ""; ?>>RS</option>
                    <option value="RO"<?php echo $row['estado'] == "RO" ? " selected" : ""; ?>>RO</option>
                    <option value="RR"<?php echo $row['estado'] == "RR" ? " selected" : ""; ?>>RR</option>
                    <option value="SC"<?php echo $row['estado'] == "SC" ? " selected" : ""; ?>>SC</option>
                    <option value="SP"<?php echo $row['estado'] == "SP" ? " selected" : ""; ?>>SP</option>
                    <option value="SE"<?php echo $row['estado'] == "SE" ? " selected" : ""; ?>>SE</option>
                    <option value="TO"<?php echo $row['estado'] == "TO" ? " selected" : ""; ?>>TO</option>
                    </select>
                </div>
                <div>
                  <input type="hidden" name='id' value="<?php echo $row['id']?>">;
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
