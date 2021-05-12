<?php

date_default_timezone_set("America/Bogota");




      $procesos=ProcesoData::getById($_POST["id"]);
      $placa=EquipoData::getById($procesos->id_equipo);
      $tempario=TemparioData::getById($procesos->tipo_trabajo);
      $conductoraux=ConductorData::getByIdCC($procesos->id_conductor);
      $empresa =EmpresaData::getById($procesos->id_empresa);
     



        if($procesos->id_trailer!=null){
          $placa_trailer=EquipoData::getById($procesos->id_trailer);

        }else{
          $placa_trailer=null;
        }
        
         $chat_api=$empresa->chat_api;

  


        //creamos un objeto de la clase Cliente para poder pasa los parametros que vienen de la vista 
        $user =ProcesoData::getById($_POST["id"]);

        //AÑADIMOS LOS POST DE LA VISTA A LOS ATRIBUTOS DEL OBJETO CREADO 

        $user->estado="FINALIZADO";  
        $user->end_date=date("y-m-d");
        $user->end_hour=date('H:i:s');

    

        //MENSAJE PARA TODOS
                  if($chat_api!=null){
          

                      $texto="";
                      $texto="ID PROCESO: ".$procesos->id."\n"."\n";
                      $texto.="HORA DE OPERATIVIDAD: ".$user->end_date." - ".$user->end_hour."\n";
                      $texto.="PLACA: ".$placa->placa."\n";

                              if($procesos->id_trailer != 0){ 
                                  $placaTrailer=EquipoData::getById($procesos->id_trailer);

                                  $texto.="TRAILER: ".$placaTrailer->placa."\n";
                                  
                              }else{ 
                                $texto.="TRAILER:"."\n";
                              }
            
                      $texto.="KILOMETRAJE: ".$procesos->kilometraje."\n";
                      $texto.="CONDUCTOR: ".$conductoraux->nombre." CC: ".$conductoraux->cc."\n";
                      $texto.="TELEFONO: ".$conductoraux->contacto."\n"."\n";
                      $texto.="VEHICULO OPERATIVO";
                      
                      
                               

                                $api=new ApiData();
                                $api->SendMessage($texto,$chat_api);
              
                    
                  }



    $user->update();//llamamamos al metodo de la clase "Proceso" para ejecutar el Sql que envia a la BD 




////////////////////////////para ejecuciones activas ///////////////////////////////////////////


$proceso=ProcesoData::getById($_POST["id"]);


    $diagnostico=DiagnosticoData::getByIdProceso($proceso->id);
    
    foreach ($diagnostico as $key => $diagnostico) {
      
        $ejecucion=EjecucionData::getByIdDiag($diagnostico->id);

                if($ejecucion!=null && $ejecucion->end_date==null){
                
                    $tecnico=AddTecnicoData::getByDiag($diagnostico->id);
                    
            
                            
                                foreach($tecnico as $tecnico){
                                    echo "tecnico".$tecnico->id."<br>";

                                    $tec=TecnicoData::getById($tecnico->id_tecnico);
                                    $tec->estado=0;
                                    $tec->updateEstado();
                                    $tecnico->estado=1;
                                    $tecnico->updateEstado();
                                

                                    $diagnostico->estado="Finalizado";
                                    $ejecucion->end_date=date("y-m-d");
                                    $ejecucion->end_hour=date('H:i:s');
                            
                                    $ejecucion->end();
                                    $diagnostico->ConfirmEstado();

                                }
    
                }                            
    }
   
    






if($_POST["view"]=="Proceso/View_Procesos_General"){
  core::alert("Finalizado con exito");//mensaje de confirmacion
  print "<script>window.location='index.php?view=Proceso/View_Procesos_General';</script>";//redireccion al index


}

if($_POST["view"]=="Proceso/View_Procesos_All"){
  core::alert("Finalizado con exito");//mensaje de confirmacion
  print "<script>window.location='index.php?view=Proceso/View_Procesos_All';</script>";//redireccion al index


}else{
  print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
}

    











/*     $arr=json_encode(array(
                                  
                                    "chatId"=>$chat_api,
                                    
                                    "body"=>$texto,

                                ));
                                
                                $url="https://api.chat-api.com/instance267918/message?token=khwh8h3uujdoaksf";
                             
                              
                                        
                                
                                
                                $ch=curl_init();
                                curl_setopt($ch,CURLOPT_URL,$url);
                                curl_setopt($ch,CURLOPT_POST,true);
                                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                                curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
                                curl_setopt($ch,CURLOPT_HTTPHEADER,array(
                                  'Content-type:application/json',
                                  'Content-length:'.strlen($arr)
                                ));
                                $result=curl_exec($ch);
                                curl_close($ch);
                              */
?>