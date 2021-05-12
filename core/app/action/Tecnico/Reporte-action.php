<?php

$tecnico=TecnicoData::getByIdMany(20);

foreach ($tecnico as $key => $tecnico) {
    # code...
  

        echo $tecnico->nombre." --------------------><br>","<br>";

            $addTec=AddTecnicoData::getByTec($tecnico->id);
                    foreach ($addTec as $key => $addTec) {

                 //    echo  "id en addtecnico ". $addTec->id."<br>"."<br>";


                        $ejecucion=EjecucionData::getByIdDiag($addTec->id_diag);

                            if($ejecucion){

                            
                                if($ejecucion->end_date!=null){

                            
                                    //echo  $ejecucion->start_date." ".$ejecucion->start_hour."<br>";
   //                                 echo $ejecucion->end_date." ".$ejecucion->end_hour."<br>";
                                        $fecha1 = new DateTime($ejecucion->start_date." ".$ejecucion->start_hour);//fecha inicial
                                        $fecha2 = new DateTime($ejecucion->end_date." ".$ejecucion->end_hour);//fecha de cierre
                                 //   echo "<br>"."<br>";
                                    $diff=$fecha1->diff($fecha2);
                                   
                                  //  echo  ( ($diff->days * 24 ) * 60 ) + ( $diff->i ) . ' minutes';
                                  //  echo ($diff->days * 24)." dias ".$diff->h."  hora ".$diff->i." minutos ". "<br>"  ;


                                        $intervalo = $fecha2->getTimestamp()-$fecha1->getTimestamp() ;

                                

                                    $date = new DateTime(); 
                                    $date->setTimestamp($intervalo);  
                                    $date->modify('-1 hours'); 
                                    $variable = $date->format('H:i:s'); 
                                 //    echo  $variable."<br>"."<br>";
                                    
                                    
                             

                                    

                                    $pendiente=PendienteData::getByIdEjec($ejecucion->id);

                                    $sumapendientes=0;
                                    echo  $ejecucion->id."<br> tiempo total de ejecucion ".$variable."<br>"."<br>";

                                    foreach ($pendiente as $key => $pendiente) {
                                    
                                        # code...
                                        $fecha3 = new DateTime($pendiente->start_date." ".$pendiente->start_hour);//fecha inicial
                                        $fecha4 = new DateTime($pendiente->end_date." ".$pendiente->end_hour);//fecha de cierre
                                   
                                        $intervalo2 = $fecha4->getTimestamp()-$fecha3->getTimestamp() ;

                                      // echo "id de pendiente".$pendiente->id."<br>";

                                       $date2 = new DateTime(); 
                                       $date2->setTimestamp($intervalo2);  
                                       $date2->modify('-1 hours'); 
                                       $variable2 = $date2->format('H:i:s'); 
                                      

                                       $sumapendientes= $sumapendientes+ $intervalo2;

                                  

                                    }
                                    if($sumapendientes!=0){

                                        $date3 = new DateTime(); 
                                       $date3->setTimestamp($sumapendientes);  
                                       $date3->modify('-1 hours'); 
                                       
                                       $variable3 = $date3->format('H:i:s'); 
                                       echo  "tiempo en busca de repuesto ".$variable3."<br>"."<br>";
                                    }


                                    if($sumapendientes!=0){

                                   
                                  $definitivo=$intervalo-$sumapendientes;

                                  $date3 = new DateTime(); 
                                  $date3->setTimestamp($definitivo);  
                                  $date3->modify('-1 hours'); 
                                  
                                  $total = $date3->format('H:i:s'); 
                                  echo "tiempo TOTAL ". $total."<br>"."<br>";
                                    
                                }


                                
                                }
                            }       


                    }

                    echo $tecnico->nombre." --------------------><br>","<br>";

}



?>