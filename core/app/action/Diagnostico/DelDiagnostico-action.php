<?php



        $user = new DiagnosticoData();//CREAMOS EL OBJETO DEL CUAL SE LLAMARA EL METODO PARA ELIMINAR 
         $tecs=AddTecnicoData::getByDiag($_POST["id"]);
        $ejec=EjecucionData::getByIdDiag($_POST["id"]);

        if($ejec!=null){
                $notificacion=NotificacionData::getById($ejec->id);
                if($notificacion!=null){
                     $notificacion->del();
                }

                
                $pendiente=PendienteData::getByIdEjec($ejec->id);
                                foreach($pendiente as $pendiente):
                                    $pendiente->del();
                                endforeach;
               
               $ejec->del();
        }
             
                        foreach($tecs as$tec):


                                $tec->del();
                        endforeach;


                        $var= $user->delById($_POST["id"]);//METODO DEL OBJETO DE LA CLASE CONDUCTOR PARA ELIMINAR PASANDO COMO PARAMETRO EL ID QUE SE TRAE DESDE LA VISTA 
                        
                        echo $var[0];


        if($var[0]==1){
                core::alert("Eliminado con exito");// alerta de confirmacion
                print "<script>window.location='index.php?view=Card';</script>";//redireccion al inicio
                
        }else{
            core::alert("No fue Eliminado con exito");// alerta de confirmacion
                print "<script>window.location='index.php?view=Card';</script>";//redireccion al inicio
        
        

        }

        
?>