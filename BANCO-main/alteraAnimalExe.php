<?php

    include('includes/conexao.php');

    if(file_exists($_FILES['foto']['tmp_name'])){
        $pasta_destino = 'fotos/';
        $extensao = strtolower(substr($_FILES['foto']['name'],-4));
        $nome_foto = $pasta_destino . date('Ymd-His').$extensao;
        move_uploaded_file($_FILES['foto']['tmp_name'],$nome_foto);

    }

    $id =$_POST['id'];
    $nome =$_POST['nome'];
    $especie =$_POST['especie'];
    $raca =$_POST['raca'];
    $data_nascimento =$_POST['data_nascimento'];
    $castrado=$_POST['castrado'];
    $pessoa =$_POST['pessoa'];
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
    <h1>Alteração de Animal</h1>
    <?php
    echo "Nome: $nome<br>";
    echo "Especie: $especie<br>";
    echo "Raça: $raca<br>";
    echo "Data de Nascimento: $data_nascimento<br>";
    echo "Castrado: $castrado<br>";
    echo "ID pessoa: $pessoa<br>"; 
    $sql = "";
    if($nome_foto == "")
    {
        $sql = "UPDATE Animal SET 
                    nome  = '$nome',
                    especie = '$especie',
                    raca = '$raca',
                    data_nascimento = '$data_nascimento',
                    castrado = '$castrado',
                    id_pessoa = '$pessoa'
                WHERE id = $id ";
    }
    else{
        $sql = "UPDATE Animal SET 
                    foto = '$nome_foto',
                    nome  = '$nome',
                    especie = '$especie',
                    raca = '$raca',
                    data_nascimento = '$data_nascimento',
                    castrado = '$castrado',
                    id_pessoa = '$pessoa'
                WHERE id = $id ";
    }
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