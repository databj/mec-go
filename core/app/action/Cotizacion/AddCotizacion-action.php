<?php

date_default_timezone_set("America/Bogota");

    $cotizacion= new CotizacionData();
    //tenemos 2 para evaluar 

    // juridijo y Natural, en caso de que sea juridico se crea el objeto empresa, pero solo llenamos el campo de id_dueno haciendo referencia que es un cliente 
    //en caso de que sea natural, se asume que es un conductor y solo se añade el id al campo de id_dueno_conductor 
      $cotizacion->id_proceso=$_POST["id_proceso"]."<br>";
      $cotizacion->fuente= $_POST["fuente"]."<br>";
      $cotizacion->numero_remision=$_POST["remision"]."<br>";
      $cotizacion->id_user=$_SESSION["user_id"]."<br>";
      $cotizacion->start_date=date("y-m-d")."<br>";
      $cotizacion->start_hour=date('H:i:s')."<br>";
      $var=  $cotizacion->add();


    if($var[0]==1){

        core::alert("Añadido con exito");//mensaje de confirmacion
        print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
        
    }else{
        core::alert("Error al añadir el proceso");//mensaje de confirmacion
        print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
        
    }
  
?>