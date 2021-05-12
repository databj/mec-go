<?php

$empresa=EmpresaData::getById($_POST["id"]);


        if($empresa->id_dueno!=null){

                        $cliente= ClienteData::getByNitCC($empresa->id_dueno);
                        $var=$empresa->del();
                        $cliente->del();

        }else{
                $cliente= ClienteData::getByNitCC($empresa->id_dueno_conductor);
                $Conductor= ConductorData::getByIdCC($empresa->id_dueno_conductor);
                $var=  $empresa->del();
                
                $conductor->del();
                $cliente->del();
        }






                if($var[0]==1){
                        core::alert("Eliminado con exito"); //MENSAJE DE CONFIRMACION
                        print "<script>window.location='index.php?view=Empresas/View_Empresa';</script>";//NOS LLEVA AL INICIO
                        
                }else{
                        core::alert("La eliminacion no fue Exitosa"); //MENSAJE DE CONFIRMACION
                        print "<script>window.location='index.php?view=Empresas/View_Empresa';</script>";//NOS LLEVA AL INICIO
                        
                }


?>