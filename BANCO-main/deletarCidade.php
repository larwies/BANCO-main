<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecidade.css">
    <title>Deletar Cidade</title>
</head>
<body>
      <h1>Deletar Cidade</h1>
      <?php
        include('includes/conexao.php');
        $id = $_GET['id'];
        $sql = "DELETE FROM Cidade WHERE id = $id";
        $result = mysqli_query($con,$sql);
        if($result)
        {
          echo "<h2>Dados Deletados</h2>";
        }
        else
        {
          echo "<h2> Erro ao Deletar!</h2>";
          echo"<h2>".mysqli_error($con)."</h2>";
        }
      ?>
      <form action="index.html">
    <input type="submit" value="Ir para o Index" />
</body>
</html>