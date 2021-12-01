<?php
    include('conexao.php');

    try {
      $sql = "insert into tblclientes (cliente,email) values (:cliente,:email)";
      $stmt = $con->prepare($sql);

      $stmt->bindValue(":cliente",$_POST["cliente"]);
      $stmt->bindValue(":email",$_POST["email"]);
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
    <title>Clientes</title>
    
</head>

<body>
    
    <h1>Cadastro de Clientes</h1>
    <!-- método de envio são 2 
        * method="GET" - Enviar sem segurança pois exibe os dados na url - mais rápido
        * method="POST" - Oculta os dados da url - mais lento
    -->

    <form method="post">
        Cliente <input type="text" name="cliente"><br>
        <br>
        Email   <input type="email" name="email"><br>
        <br>
        <input type="submit" value="Cadastrar">
    </form>

</body>

</html>