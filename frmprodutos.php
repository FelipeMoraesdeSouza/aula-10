<?php
    include('conexao.php');

    try {
      $sql = "insert into tblProdutos (produto,preco,estoque) values (:produto,:preco,:estoque)";
      $stmt = $con->prepare($sql);

      $stmt->bindValue(":produto",$_POST["produto"]);
      $stmt->bindValue(":preco",$_POST["preco"]);
      $stmt->bindValue(":estoque",$_POST["estoque"]);
      $stmt->execute();

    } catch(PDOException $e){
        echo "Não Cadastrou. ".$e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    
</head>

<body>
    
    <h1>Cadastro de Produtos</h1>
    <!-- método de envio são 2 
        * method="GET" - Enviar sem segurança pois exibe os dados na url - mais rápido
        * method="POST" - Oculta os dados da url - mais lento
    -->

    <form method="post">
        Produto <input type="text" name="produto"><br>
        <br>
        Preco  <input type="text" name="preco"><br>
        <br>
        Estoque <input type="text" name="estoque"><br>
        <br>
        <input type="submit" value="Cadastrar">
    </form>

</body>

</html>