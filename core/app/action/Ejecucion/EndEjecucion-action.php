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
      
        $equipo=EquipoData::getById($proceso->id_equipo);


        $diagnostico->estado="Finalizado";
        $user->end_date=date("y-m-d");
        $user->end_hour=date('H:i:s');

      $var=  $user->end();
      $diagnostico->ConfirmEstado();

      $ejecucion=EjecucionData::getByIdDiag($_POST["id"]);

      $notificacion=new NotificacionData();
      $notificacion->id_ejecucion=$ejecucion->id;
      $notificacion->updateEstado();

      $tecnico=AddTecnicoData::getByDiag($_POST["id"]);
      

      foreach($tecnico as $tecnico){
        $tec=TecnicoData::getById($tecnico->id_tecnico);
        $tec->estado=0;
        $tec->updateEstado();
        $tecnico->estado=1;
        $tecnico->updateEstado();
      }
    
      


      

     // print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
     if($_POST["view"]=="Diagnostico/View_Diagnostico"){
      core::alert("Finalizado Con Exito");// alerta de confirmacion
     print "<script>window.location='index.php?view=Diagnostico/View_Diagnostico';</script>";//redireccion al index

  }else{
      print "<script>window.location='index.php?view=Card';</script>";//redireccion al index

  }
?>