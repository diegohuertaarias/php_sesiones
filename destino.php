<html>
<body>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <input type="text" name="email">
    <input type="number" name="contraseña">
    <input type="submit" name="enviar">

</form>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    $nombre=$_POST['nombre'];
    $creditos=$_POST['creditos'];
    $fecha=$_POST['fecha'];
    $conexion=new mysqli("localhost","root","","");
    $insertar="insert into test.asignaturas (id, nombre, creditos, fecha_de_inicio) values (null, '$nombre', $creditos, '$fecha');";