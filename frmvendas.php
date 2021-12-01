<?php
    include('conexao.php');

    try {
      $sql = "insert into tblvendas (idvendedor,idproduto,qnt) values (:idvendedor,:idproduto,:qnt)";
      $stmt = $con->prepare($sql);

      $stmt->bindValue(":idvendedor",$_POST["idvendedor"]);
      $stmt->bindValue(":idproduto",$_POST["idproduto"]);
      $stmt->bindValue(":qnt",$_POST["qnt"]);
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
    <title>Vendas</title>
    
</head>

<body>
    
    <h1>Cadastro de Vendas</h1>
    <!-- método de envio são 2 
        * method="GET" - Enviar sem segurança pois exibe os dados na url - mais rápido
        * method="POST" - Oculta os dados da url - mais lento
    -->

    <form method="post">
        vendedor <input type="text" name="idvendedor"><br>
        <br>
        produto   <input type="text" name="idproduto"><br>
        <br>
        quantidade <input type="text" name="qnt"><br>
        <br>
        <input type="submit" value="Cadastrar">
    </form>

</body>

</html>