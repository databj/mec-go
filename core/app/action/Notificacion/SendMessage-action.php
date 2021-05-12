<?php



$procesos=ProcesoData::getById($id);
$placa=EquipoData::getById($procesos->id_equipo);
$tempario=TemparioData::getById($procesos->tipo_trabajo);
$conductoraux=ConductorData::getByIdCC($procesos->id_conductor);
$empresa =EmpresaData::getById($procesos->id_empresa);



$chat_api=$empresa->chat_api;

//MENSAJE PARA TODOS
          if($chat_api!=null){


          

                    $texto="";
                    $texto="ID PROCESO: ".$procesos->id."\n"."\n";
                    $texto.="HORA: ".$hora."\n";
                    $texto.="PLACA: ".$placa->placa."\n";

                        if($procesos->id_trailer != 0){ 
                            $placaTrailer=EquipoData::getById($procesos->id_trailer);

                            $texto.="TRAILER: ".$placaTrailer->placa."\n";
                            
                        }else{ 
                          $texto.="TRAILER:"."\n";
                        }

                      $texto.="KILOMETRAJE: ".$procesos->kilometraje."\n";
                      $texto.="CONDUCTOR: ".$conductoraux->nombre." CC: ".$conductoraux->cc."\n";
                      $texto.="TELEFONO: ".$conductoraux->contacto."\n";
                      $texto.="DIAGNOSTICO: ".$tempario->descripcion."\n"."\n";
                      
                      if($masTrabajos!=""){
                        $texto.=$masTrabajos;
                      }

                      $texto.="Novedades: "."\n".$novedades."\n";
                         //$texto.="redireccionar a Proceso: http://3.131.109.241/MCISERVICE/index.php?view=Like_Proceso&id=".$procesos->id."\n";
                    

                        //mensaje para co-diesel
                        $api=new ApiData();
                        $api->SendMessage($texto,$chat_api);
      
            
              
          }



         // general


         
         $texto="";
         $texto="ID PROCESO: ".$procesos->id."\n"."\n";
         $texto.="HORA: ".$hora."\n";
         $texto.="PLACA: ".$placa->placa."\n";

                          if($procesos->id_trailer != 0){ 
                              $placaTrailer=EquipoData::getById($procesos->id_trailer);

                              $texto.="TRAILER: ".$placaTrailer->placa."\n";
                              
                          }else{ 
                            $texto.="TRAILER:"."\n";
                          }
                      
         $texto.="KILOMETRAJE: ".$procesos->kilometraje."\n";
         $texto.="CONDUCTOR: ".$conductoraux->nombre." CC: ".$conductoraux->cc."\n";
         $texto.="TELEFONO: ".$conductoraux->contacto."\n";
         $texto.="DESCRIPCION: ".$tempario->descripcion."\n"."\n";

          if($masTrabajos!=""){
            $texto.=$masTrabajos;
          }

         $texto.="Novedades: "."\n".$novedades."\n";
                
         $api=new ApiData();
         $api->SendMessage($texto,"573015256417-1609341542@g.us");


         

           $files=$_FILES['image'];
       
        include("core/app/action/Notificacion/s3_subida-action.php");
       
              

// echo $result;
print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
?>