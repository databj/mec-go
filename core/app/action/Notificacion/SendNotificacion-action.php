<?php 

$proceso=ProcesoData::getAll();


foreach ($proceso as $proceso) {
    if($proceso->estado!="FINALIZADO"){
        
        $diagnosticos=DiagnosticoData::getByIdProceso($proceso->id);

            foreach ($diagnosticos as $diagnostico) {
                if($diagnostico->estado!="Finalizado"){
                    $ejecucion=EjecucionData::getByIdDiag($diagnostico->id);
                        
                    if($ejecucion!=null){

                      
                    
                                    $notificacion=NotificacionData::getById($ejecucion->id);

                                   

                                    if($notificacion!=null){
                                        if($notificacion->estado==0){


                                            if($notificacion->n1 == 0 ){
                                                if(diferencia($ejecucion->start_date." ".$ejecucion->start_hour)->days == 1){
                                                    echo $proceso->id."-- "."primera notificacion"."<br>";
                                                    $notificacion->update1n();
                                                }

                                            }

                                            if($notificacion->n2==0){
                                                if(diferencia($ejecucion->start_date." ".$ejecucion->start_hour)->days ==2){
                                                    echo $proceso->id."-- "."segunda notificacion"."<br>";
                                                    $notificacion->update2n();
                                                }

                                            }

                                            if($notificacion->n3==0){
                                                if(diferencia($ejecucion->start_date." ".$ejecucion->start_hour)->days ==3){
                                                    echo $proceso->id."-- "."3era notificacion"."<br>";
                                                    $notificacion->update3n();
                                                }

                                            }
                                        }
                                    }
                    }
                }
            

            }
    
            
    }
    

            
}


function diferencia($date1){
    $date_add = new DateTime($date1);
$date_upd = new DateTime(date('Y-m-d H:i:s'));
$diff = $date_add->diff($date_upd);
return $diff;
}



?>