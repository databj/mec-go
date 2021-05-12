<?php

date_default_timezone_set("America/Bogota");

//tenemos 2 para evaluar 

// juridijo y Natural, en caso de que sea juridico se crea el objeto empresa, pero solo llenamos el campo de id_dueno haciendo referencia que es un cliente 
//en caso de que sea natural, se asume que es un conductor y solo se añade el id al campo de id_dueno_conductor 
   $user = new EjecucionData();
       $user->id_diagnostico=$_POST["id"];
        $diagnostico=DiagnosticoData::getById($_POST["id"]);
        $tempario=TemparioData::getById($diagnostico->tipo_diagnostico);
        $proceso=ProcesoData::getById($diagnostico->id_proceso);
        $empresa =EmpresaData::getById($proceso->id_empresa);
        $chat_api=$empresa->chat_api;
        $equipo=EquipoData::getById($proceso->id_equipo);
        $diagnostico->estado="En Proceso";
        $user->start_date=date("y-m-d");
        $user->start_hour=date('H:i:s')."<br>";

       $var=  $user->add();
       $diagnostico->ConfirmEstado();

      $notificacion=new NotificacionData();
        $notificacion->id_ejecucion=$var[1];
        $notificacion->add();
        
     
        


        if($_POST["view"]=="Diagnostico/View_Diagnostico"){
            core::alert("Iniciado Con Exito");// alerta de confirmacion
            print "<script>window.location='index.php?view=Diagnostico/View_Diagnostico';</script>";//redireccion al index

        }else{
            print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
 
        }
        

?>