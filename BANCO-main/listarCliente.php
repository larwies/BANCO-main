<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listar Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            padding-top: 56px; /* Espaçamento para a navbar fixa */
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
        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            color: #343a40;
        }
        .table-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .table {
            background-color: #ffffff;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            text-align: center;
        }
        .table th {
            background-color: #007bff;
            color: #ffffff;
        }
        .table a {
            color: #007bff;
            text-decoration: none;
        }
        .table a:hover {
            text-decoration: underline;
        }
        .btn-custom {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Listar Cliente</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Ínicio</a>
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

    <?php
    include('includes/conexao.php');
    $sql = "SELECT pes.id, pes.nome  nomepessoa ,pes.email,pes.endereco,pes.bairro,pes.cep,
    cid.nome nomecidade,cid.estado FROM pessoa pes
     LEFT JOIN cidade cid on cid.id = pes.id_cidade ";
    $result = mysqli_query($con, $sql);
    ?>

    <div class="container table-container">
        <h1>Consulta de Clientes</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>CEP</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['nomepessoa']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['nomecidade']."</td>";
                    echo "<td>".$row['estado']."</td>";
                    echo "<td>".$row['endereco']."</td>";
                    echo "<td>".$row['bairro']."</td>";
                    echo "<td>".$row['cep']."</td>";
                    echo "<td><a href='alteraCliente.php?id=".$row['id']."' class='btn btn-warning btn-sm btn-custom'>Alterar</a></td>";
                    echo "<td><a href='deletarCliente.php?id=".$row['id']."' class='btn btn-danger btn-sm btn-custom'>Deletar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
