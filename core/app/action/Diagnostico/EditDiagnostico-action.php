<?php

date_default_timezone_set("America/Bogota");

//tenemos 2 para evaluar 

// juridijo y Natural, en caso de que sea juridico se crea el objeto empresa, pero solo llenamos el campo de id_dueno haciendo referencia que es un cliente 
//en caso de que sea natural, se asume que es un conductor y solo se añade el id al campo de id_dueno_conductor 
   $user =DiagnosticoData::getById($_POST["id"]);
      //  $user->id_proceso=$_POST["id_proceso"];
        //$user->placa=$_POST["placa"];
       // $user->tipo_diagnostico=$_POST["tipo_diagnostico"];
        $user->tiempo_e=$_POST["tiempo_e"];
        $user->novedades=nl2br($_POST["novedades"]);
       // $user->id_user=$_POST["tecnico_encargado"];
      



        $var=  $user->update();//metodo de la clase Empresa para Enviar a la BD
         
        


    if($var[0]==1){
        core::alert("Añadido con exito");// alerta de confirmacion
        print "<script>window.location='index.php?view=Diagnostico/View_Diagnostico';</script>";//redireccion al inicio

    }else{
        core::alert("No fue Añadido con exito");// alerta de confirmacion
        print "<script>window.location='index.php?view=Card';</script>";//redireccion al inicio


    }


?>