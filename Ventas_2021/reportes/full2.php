<?php
 
  $where = '';
  $host = "localhost";
  $dbname = "venta_2021";
  $username = "root";
  $password = "";

  $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

  $sql = "SELECT c.nombre, p.unidades, a.descripcion, a.precio FROM clientes as c 
  JOIN pedidos p ON c.cliente_id = p.cliente_id JOIN articulo a ON p.articulo_id = a.articulo_id $where ORDER BY c.nombre ASC";
  
  $q = $cnx->prepare($sql);
  $result = $q->execute();
  
  $relacion = $q->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Relacion list</title>
</head>
<body background="fondo.jpg">

    <a href="http://localhost/pro4/licorera/"> Ir al inicio </a>
    
    <h1>LISTA CLIENTES LICORERA LA 19</h1>

    <h2>
    <table border="1">
        <tr>
           <td>
               NOMBRE DEL CLIENTE
           </td>

           <td>
               UNIDADES
           </td>

           <td>
               DESCRIPCION DEL PRODUCTO
           </td>

           <td>
               PRECIO
           </td>

           <td>
               TOTAL A PAGAR
           </td>

           
        </tr>
<?php
        
        $su = 0;
        for($i=0; $i<count($relacion); $i++)  {
?>
        <tr>
           <td>
               <?php echo $relacion[$i]["nombre"] ?>
           </td>

           <td>
                <?php echo $relacion[$i]["unidades"] ?>
           </td>

           <td>
                <?php echo $relacion[$i]["descripcion"] ?>
           </td>

           <td>
               <?php echo $relacion[$i]["precio"] ?>
           </td>  

           <td>
               <?php echo $relacion[$i]["precio"]* $relacion[$i]["unidades"]; $su+=$relacion[$i]["precio"]* $relacion[$i]["unidades"]; ?>
           </td>  
       
        </tr>

        </h2>
<?php

      }

?>
    </table>
  
</body>
</html>