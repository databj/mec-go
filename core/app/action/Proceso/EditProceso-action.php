<?php

date_default_timezone_set("America/Bogota");

//$user = new ProcesoData();
/*
echo $user->id_user=$_SESSION["user_id"]."<br />";  
echo $user->id_equipo = $_POST["placa"]."<br />";
echo $user->kilometraje= $_POST["kilometraje"]."<br />";
echo $user->tipo_trabajo =$_POST["tipo"]."<br />";
echo $user->id_conductor =$_POST["conductor"]."<br />";
echo $user->id_empresa =$_POST["empresa"]."<br />";
echo $user->tipo_pago =$_POST["tipo_pago"]."<br />";
echo $user->garantia =$_POST["garantia"]."<br />";
*/

//creamos un objeto de la clase Cliente para poder pasa los parametros que vienen de la vista 
        $user =  ProcesoData::getById($_POST["id"]);

        //AÑADIMOS LOS POST DE LA VISTA A LOS ATRIBUTOS DEL OBJETO CREADO 
          $user->id=$_POST["id"]; 
          $user->id_user=$_SESSION["user_id"];  
          $user->id_equipo = $_POST["placa"];
          $user->kilometraje= $_POST["kilometraje"];
          $user->tipo_trabajo =$_POST["tipo"];
          $user->tipo_pago =$_POST["tipo_pago"];
          $user->garantia =$_POST["garantia"];
          $user->id_conductor =$_POST["conductor"];
          $user->id_empresa =$_POST["empresa"];
          $user->start_date=$_POST["date_at"];
          $user->start_hour= $_POST["time_at"];
           //   $user->created_at=date("Y-m-d H:i:s");
           //   $user->start_date=date("yy-m-d");
           //   $user->start_hour=date('H:i:s');
        
 
          $user->update();//llamamamos al metodo de la clase "Proceso" para ejecutar el Sql que envia a la BD 



          core::alert("Añadido con exito");//mensaje de confirmacion
          print "<script>window.location='index.php?view=Card';</script>";//redireccion al index

?>