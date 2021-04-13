<?php
    $cliente = $_REQUEST["clientes"];
    $articulo =$_REQUEST["articulo"];
    $unidades =$_REQUEST["unidades"];


  $host = "localhost";
  $dbname = "venta_2021";
  $username = "root";
  $password = "";

  $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  
  $sql = "INSERT INTO pedidos (id_pedido, cliente_id, articulo_id, unidades) 
  VALUES(NULL, '$cliente', '$articulo', '$unidades')";
  $q = $cnx->prepare($sql);
  $result = $q->execute();

  if($result){
      echo "Pedido registrado correctamente";
  }
  else{
      echo "error al registrar pedido";
  }
   
?>