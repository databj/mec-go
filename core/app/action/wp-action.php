<?php
                         /*       
                                $procesos = ProcesoData::getAll(); 
                               $count=0;
                                 foreach($procesos as $proceso):

                                   $count++;
                                 endforeach;
                             
                               
                                 function saber_mes($nombredia) {
                                    $dias = array('','ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic');
                                    $fecha = $dias[date('n', strtotime($nombredia))];
                               return $fecha;
                                }


                                $events=ProcesoData::getAll();
                                     foreach($events as $event){
                                                    $MANUAL=$event->start_date." ".$event->start_hour;
                                                  echo  $fecha=saber_mes($MANUAL);
                                                    
                                            

                                     }

*/

        $contador= ProcesoData::contador();
        $aux=0;

        foreach($contador as $contador){
            $vect[$aux]=$contador->counted_leads;
            echo $vect[$aux]."<br>";
             $aux++;
        }





                              ?>