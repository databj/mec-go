<?php 



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
   
    


?>