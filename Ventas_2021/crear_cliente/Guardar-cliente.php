<?php
 $nombre = $_REQUEST["nombre"];
 $telefono =$_REQUEST["telefono"];


  $host = "localhost";
  $dbname = "venta_2021";
  $username = "root";
  $password = "";

  $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

  $sql = "INSERT INTO clientes (cliente_id, nombre, telefono) 
  VALUES(NULL, '$nombre', '$telefono')";
  $q = $cnx->prepare($sql);
  $result = $q->execute();

  if($result){
    echo "Cliente nuevo guardado correctamente";
  }
else{
    echo "error cliente no guardado $nombre";
}
 
?>