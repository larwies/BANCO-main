<?php

    include('includes/conexao.php');
    $id =$_POST['id'];
    $nome =$_POST['nome'];
    $email =$_POST['email'];
    $endereco =$_POST['endereco'];
    $bairro =$_POST['bairro'];
    $cep =$_POST['cep'];
    $cidade =$_POST['cidade'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALterar</title>
</head>
<body>
    <h1>Alteração de Cliente</h1>
    <?php
    echo "<p>ID: $id</p>";
    echo "<p>NOME: $nome</p>";
    echo "<p>ESTADO: $cidade</p>";
        $sql = "UPDATE Pessoa SET 
                    nome  = '$nome',
                    email = '$email',
                    endereco = '$endereco',
                    bairro = '$bairro',
                    cep = '$cep',
                    id_cidade = '$cidade'
                WHERE id = $id ";
        $result = mysqli_query($con,$sql);
        if ($result)
            echo "Dados Atualizados";
        else
            echo "Erro ao Atualizar dados!\n"
            .mysqli_error($con);
    ?>
    <form action="index.html">
    <input type="submit" value="Ir para o Index" />
</body>
</html>