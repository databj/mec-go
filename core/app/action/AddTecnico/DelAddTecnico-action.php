<?php



        
    $var= AddTecnicoData::delById($_GET["id"]);//METODO DEL OBJETO DE LA CLASE TECNICOS ADICIONALES PARA ELIMINAR PASANDO COMO PARAMETRO EL ID QUE SE TRAE DESDE LA VISTA 


        if($var[0]==1){
            core::alert("Eliminado con exito");// alerta de confirmacion
            print "<script>window.location='index.php?view=TecDiag/View_Tecnicos_Diag';</script>";//redireccion al inicio
            
        }else{
            core::alert("No fue Eliminado con exito");// alerta de confirmacion
            print "<script>window.location='index.php?view=TecDiag/View_Tecnicos_Diag';</script>";//redireccion al inicio
        
        

        }

        
?>