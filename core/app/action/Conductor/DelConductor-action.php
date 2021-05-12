<?php



        $conductor =ConductorData::getById($_POST["id"]);//CREAMOS EL OBJETO DEL CUAL SE LLAMARA EL METODO PARA ELIMINAR 
  
     
  

        if($conductor->is_dueno==1){
        
                $empresa= EmpresaData::getByCC($conductor->cc);
        
        
                $cliente=ClienteData::getByNitCC($conductor->cc);

                echo $conductor->is_dueno; 
        
                echo $empresa->nombre;
                echo $cliente->nombre;
                
                $empresa->del();
                $cliente->del();
                $var= $conductor->del();
                


        }else{

                $var=$conductor->del();
        }
        
  
   
        if($var[0]==1){
                core::alert("Eliminacion exitosa"); //MENSAJE DE CONFIRMACION
                print "<script>window.location='index.php?view=Card';</script>";//NOS LLEVA AL INICIO
       
        }else{
                core::alert("No se pudo eliminar el Conductor"); //MENSAJE DE CONFIRMACION
                print "<script>window.location='index.php?view=Card';</script>";//NOS LLEVA AL INICIO
       
        }


         
?>