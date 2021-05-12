<?php

date_default_timezone_set("America/Bogota");



        $user = new EjecucionData();// un objeto de ejecucion

        $user->id_diagnostico=$_POST["id_diag"]; //añadimos el id del diagnostico a ejecutar 


        $diagnostico=DiagnosticoData::getById($_POST["id_diag"]);// Se obtiene el diagnostico


        $tempario=TemparioData::getById($diagnostico->tipo_diagnostico); //se obtiene la informacion del tempario 

        $proceso=ProcesoData::getById($diagnostico->id_proceso); //se obtiene el proceso asociado 


        $empresa =EmpresaData::getById($proceso->id_empresa);// se obtiene la empresa asociada


        $chat_api=$empresa->chat_api;// se obtiene el numero de telefono 


        $equipo=EquipoData::getById($proceso->id_equipo);// obtener equipo y placa 


        $diagnostico->estado="En Proceso";// se coloca el estado del diagnostico en procesos

        $user->start_date=date("y-m-d");  //hora y fecha actual de la ejecucion
        $user->start_hour=date('H:i:s')."<br>";// hora y fecha actual de la ejecucion

        $var=  $user->add(); /// se crea la ejecucion

        $diagnostico->ConfirmEstado();// se confirma el estado del diagnostico y su hora de inicio 


        $notificacion=new NotificacionData();// para crear records de notificaciones 

        $notificacion->id_ejecucion=$var[1];//notificaciones
        $notificacion->add();//notificacion
        
     


   
            core::alert("Iniciado Con Exito");// alerta de confirmacion
            print "<script>window.location='index.php?view=Diagnostico/View_DiagOutTec';</script>";//redireccion al index

      
        

?>