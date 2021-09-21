<!Doctype html>
<html lang="es">
<head>
<meta charset=utf-8>
<title>coder war</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>
 <body>
 <ul class="nav bg-warning ">
  <li class="nav-item">
    <a class="nav-link active text-white" href="#">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="#">Programa</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white " href="#">Sedes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="#">Nosotros</a>
  </li>
</ul>
 <br>
  <div class="container">
  <div class="row">
         <div class="col-8">
         <div class="card border-warning mb-3" style="max-width: 60rem;">
  <center><div class="card-header bg-warning"><b>INSCRIPCIONES DE PROGRAMAS ACADEMICOS SENA 2021</b></div></center>
  <div class="card-body text-warning">
    <center><h5 class="card-title">INFORMACION</h5></center>
    <center><p class="card-text">Apreciados aspirantes seleccione su programa de interes.</p></center>
  </div>
<form action=""method="post">
<div class="form">
<div class="row">
<div class="col-6">
<label>Fecha Inscripcion</label>
<input type="date" name="fecha" class="form-control"><br>
<label>Nombres</label>
<input type="text" name="nombres" placeholder="Nombre" class="form-control"><br>
<label>Apellidos</label>
<input type="text" name="apellidos" placeholder="Apellidos" class="form-control"><br>
<label>Tipo de documento:</label>
<select name="tipo" class="form-control">
<option>---- seleccione ----</option>
<option>Tarjeta de identidad</option>
<option>Cedula de Ciudadania</option>
<option>Cedula Extranjera</option>
</select><br>
<label>Numero de documento</label>
<input type="number" name="documento" placeholder="Numero" class="form-control"><br>

</div>
<div class="col-6">
<label>Programa</label>
<select name="programas" class="form-control">
<option>---- seleccione ----</option>
<option>Programa de software</option>
<option>Multimedia</option>
<option>Logistica</option>
<option>Archivo</option>
<option>Enfermeria</option>
</select><br>
<label>Sede</label>
<select name="sedes" class="form-control">
<option>---- seleccione ----</option>
<option>Neiva</option>
<option>Campoalegre</option>
<option>Garzon</option>
<option>La Plata</option>
<option>Pitalito</option>
</select><br>
<label>Mail</label>
<input type="text" name="mail" placeholder="mail" class="form-control"><br>
<label>Telefono:</label>
<input type="number" name="tel" placeholder="Numero" class="form-control"><br>
<label>Solicitud</label>
<select name="solicitud" class="form-control">
<option>---- seleccione ----</option>
<option>Inscripcion</option>
<option>Matricula</option>
</select><br>
</div>
</div>
</div>
<center><input type="submit" class="btn btn-warning" name="btn_guardar" value="Guardar"><br></br>

<center><input type="submit" class="btn btn-primary" name="btn_consultar" value="Consultar">

<input type="submit" class="btn btn-dark" name="btn_modificar" value="Actualizar">

<input type="submit" class="btn btn-danger" name="btn_eliminar" value="Eliminar"><br></br>

<?php

/*------guardar*/

include("conexion.php");

if(isset($_POST['btn_guardar']))
{

$fecha=$_POST['fecha'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$tipo=$_POST['tipo'];
$numero=$_POST['documento'];
$programas=$_POST['programas'];
$sedes=$_POST['sedes'];
$mail=$_POST['mail'];
$telefono=$_POST['tel'];
$solicitud=$_POST['solicitud'];

if($fecha==""|| $nombres=="" || $apellidos=="" || $tipo=="" || $numero=="" || $programas=="" ||
$sedes=="" || $mail=="" || $telefono=="" || $solicitud=="")

{ echo "<script> alert ('todos los campos son obligatorios');
location.href = '../INSCRIPCION/index.php';</script>";
}

      else {
        $query = mysqli_query ($conectar, "INSERT INTO datos (Fecha, Nombres, Apellidos, Tipo_Documento, Numero_Documento	, 
       Programas, Sedes, Mail, Telefono, Solicitud) value ('$fecha','$nombres', '$apellidos', '$tipo', '$numero',
      '$programas','$sedes', '$mail', '$telefono', '$solicitud')");
}
if($query){

  echo "<script> alert('Usuario registrado en la base de datos');
     location.href = '../INSCRIPCION/index.php';</script>"; 
}
   else {
  echo "<script> alert('Usuario no registrado en la base de datos');
      location.href = '../INSCRIPCION/index.php';</script>"; 
             
   } 
 }
 /*--------consultar*/

 if(isset($_POST['btn_consultar']))
{
        $documento = $_POST['documento'];
         $existe=0;

  if($documento=="")
  {
  echo"<script> alert('El campo de documento es obligatorio para realizar alguna consulta');
     location.href = '../INSCRIPCION/index.php';</script>"; 
}

else{
  $resultado = mysqli_query($conectar,"SELECT * FROM datos WHERE Numero_Documento = '$documento'");
}

while($consulta = mysqli_fetch_array($resultado))

{
  echo"

  <table width=\"100%\border=\1\">
      <tr>
      <td><center><b>Fecha</b></center></td>
      <td><center><b>Nombres</b></center></td>
      <td><center><b>Apellidos</b></center></td>
      <td><center><b>Tipo_Documento</b></center></td>
      <td><center><b>Numero_Documento</b></center></td>
      <td><center><b>Programas</b></center></td>
      <td><center><b>Sedes</b></center></td>
      <td><center><b>Mail</b></center></td>
      <td><center><b>Telefono</b></center></td>
      <td><center><b>Solicitud</b></center></td>
      </tr>
      <tr>
      <td><center>".$consulta['Fecha']."</center></td>
      <td><center>".$consulta['Nombres']."</center></td>
      <td><center>".$consulta['Apellidos']."</center></td>
      <td><center>".$consulta['Tipo_Documento']."</center></td>
      <td><center>".$consulta['Numero_Documento']."</center></td>
      <td><center>".$consulta['Programas']."</center></td>
      <td><center>".$consulta['Sedes']."</center></td>
      <td><center>".$consulta['Mail']."</center></td>
      <td><center>".$consulta['Telefono']."</center></td>
      <td><center>".$consulta['Solicitud']."</center></td>
      </tr>
      </table>";

  $existe++;
  {
    if($existe==0){

      echo"<script> alert('El numero de documento digitado no existe en la base de datos');
      location.href = '../INSCRIPCION/index.php';</script>"; 
    }
        }
}
}

 /*--------Modificar  - update */

 if(isset($_POST['btn_modificar']))

    {
      $fecha = $_POST['fecha'];
      $nombres=$_POST['nombres'];
      $apellidos=$_POST['apellidos'];
      $tipo=$_POST['tipo'];
      $numero=$_POST['documento'];
      $programas=$_POST['programas'];
      $sedes=$_POST['sedes'];
      $mail=$_POST['mail'];
      $telefono=$_POST['tel'];
      $solicitud=$_POST['solicitud'];

      if($fecha==""|| $nombres=="" || $apellidos=="" || $tipo=="" || $numero=="" || $programas=="" ||
        $sedes=="" || $mail=="" || $telefono=="" || $solicitud=="")


      { echo "<script> alert ('todos los campos son obligatorios');
        location.href = '../INSCRIPCION/index.php';</script>";

      }
          else
      
         {     $existe=0;
          $resultado = mysqli_query($conectar,"SELECT * FROM datos WHERE Numero_Documento = '$numero'");

          while($consulta = mysqli_fetch_array($resultado))
          {
            $existe++;
          }
          if($existe==0)
          {
            echo "<script> alert ('El Documento digitado no existe en la base de datos');
        location.href = '../INSCRIPCION/index.php';</script>";

          }

          else
          {
              $actualizar = "UPDATE datos SET
                Fecha = '$_POST[fecha]',
                Nombres = '$_POST[nombres]',
                Apellidos = '$_POST[apellidos]',
                Tipo_Documento = '$_POST[tipo]',
                Numero_Documento = '$_POST[documento]',
                Programas = '$_POST[programas]',
                Sedes = '$_POST[sedes]',
                Mail = '$_POST[mail]',
                Telefono = '$_POST[tel]',
                Solicitud = '$_POST[solicitud]'

                WhERE Numero_Documento = '$_POST[documento]'";


           mysqli_query($conectar, $actualizar);

           echo "<script> alert ('Datos de usuario se ha modificado y actualizado en la base de datos');
           location.href = '../INSCRIPCION/index.php';</script>";
          }
        }
    }


    /*------Eliminar Registros-----*/

    if(isset($_POST['btn_eliminar']))
    {
      $referencia = $_POST['documento'];
      $existe =0;
      
      if($referencia=="")
    {
    echo "<script> alert ('El campo de documento es obligatorio');
        location.href = '../INSCRIPCION/index.php';</script>";
 
      } 

      else
      {
        $resultado = mysqli_query($conectar, "SELECT * FROM datos WERE Numero_Documento = '$referencia'");
         while($consulta = mysqli_fetch_array($resultado))
         {
           $existe++;
         }
          if($existe==0)
          {
            echo "<script> alert ('El numero de documento ingresado no existe en nuestra base de datos');
            location.href = '../INSCRIPCION/index.php';</script>";
          }
          else
          {
          $eliminar = "DELETE FROM datos WERE Numero_Documento = '$referencia'";

          mysqli_query($conectar, $eliminar);
          echo "<script> alert ('Los registros de este numero de documento han sido eliminado de la base de datos');
            location.href = '../INSCRIPCION/index.php';</script>";
      }
    }
}

?>

</form>

  </div>
</div>  
         <div class="calen col-4">
         <svg width="700" height="600" preserveAspectRatio="xMinYMin meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <svg>
    <rect x="10" y="10" height="377" width="640" style="fill: #e75040;" />
    <rect x="30" y="70" rx="5" ry="5" height="33" width="600" style="fill: #cc3b2d" />
    <text id="month_name" x="300" y="50" fill="#ffffff" style="font-size:22px; font-family: Arial; font-weight:bold;"></text>
    <rect x="45" y="159" rx="5" ry="5" height="33" width="40" style="fill: #cc3b2d" />
    <svg x="10" y="70">
      <g>
        <text x="35" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">MON</text>
        <text x="126" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">TUE</text>
        <text x="216" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">WED</text>
        <text x="304" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">THU</text>
        <text x="396" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">FRI</text>
        <text x="473" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">SAT</text>
        <text x="560" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">SUN</text>
      </g>
    </svg>
    <svg x="10" y="120">
      <g>
        <text x="49" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;"></text>
        <text x="141" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;"></text>
        <text x="230" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">1</text>
        <text x="317" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">2</text>
        <text x="405" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">3</text>
        <text x="482" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">4</text>
        <text x="577" y="24" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">5</text>
      </g>
      <g>
        <text x="50" y="63" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">6</text>
        <text x="141" y="63" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">7</text>
        <text x="229" y="63" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">8</text>
        <text x="315" y="63" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">9</text>
        <text x="398" y="63" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">10</text>
        <text x="477" y="63" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">11</text>
        <text x="570" y="63" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">12</text>
      </g>
      <g>
        <text x="43" y="104" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">13</text>
        <text x="134" y="104" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">14</text>
        <text x="221" y="104" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">15</text>
        <text x="309" y="104" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">16</text>
        <text x="399" y="104" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">17</text>
        <text x="477" y="104" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">18</text>
        <text x="571" y="104" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">19</text>
      </g>
      <g>
        <text x="43" y="145" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">20</text>
        <text x="134" y="145" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">21</text>
        <text x="221" y="145" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">22</text>
        <text x="309" y="145" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">23</text>
        <text x="399" y="145" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">24</text>
        <text x="477" y="145" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">25</text>
        <text x="571" y="145" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">26</text>
      </g>
      <g>
        <text x="43" y="186" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">27</text>
        <text x="134" y="186" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">28</text>
        <text x="221" y="186" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">29</text>
        <text x="309" y="186" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">30</text>
        <text x="399" y="186" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;">31</text>
        <text x="475" y="186" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;"></text>
        <text x="570" y="186" style="fill: #ffffff; font-size:20px; font-family: Arial; font-weight:bold;"></text>
      </g>
    </svg>
  </svg>

</svg>
<script>
    window.onload = function() {
  showMonth();
};

function showMonth() {
  var month = new Array();
  month[0] = "January";
  month[1] = "February";
  month[2] = "March";
  month[3] = "April";
  month[4] = "May";
  month[5] = "June";
  month[6] = "July";
  month[7] = "August";
  month[8] = "September";
  month[9] = "October";
  month[10] = "November";
  month[11] = "December";
  var d = new Date();
  var n = month[d.getMonth()];
  document.getElementById("month_name").innerHTML = n;
}
</script>


  </div>
</div>
</div>

</body>

 </html>