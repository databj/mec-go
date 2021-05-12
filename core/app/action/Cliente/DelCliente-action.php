<?php



$cliente= ClienteData::getById($_POST["id"]);


        if($cliente->tipo=="Juridico"){ 
           //eliminar empresa y cliente en caso tal sea juridico 

              $empresa= EmpresaData::getByNit($cliente->nit_ced);
              
              $empresa->del();
              $var=  $cliente->del();
        }else{
           //eliminar conductor en caso tal sea natural conductor 
              $empresa=EmpresaData::getByCC($cliente->nit_ced);
              $conductor=ConductorData::getByIdCC($cliente->nit_ced);

              $empresa->del();
              $conductor->del();
              $var= $cliente->del();

              


        }




  

     if($var[0]==1){
        core::alert("Eliminado con exito"); //MENSAJE DE CONFIRMACION
        print "<script>window.location='index.php?view=Cliente/View_Cliente';</script>";//NOS LLEVA AL INICIO
        
     }
     else{
        core::alert("No fue Eliminado con exito");// alerta de confirmacion
        print "<script>window.location='index.php?view=Cliente/View_Cliente';</script>";//NOS LLEVA AL INICIO
        
     }



?>