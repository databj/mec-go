<?php



$user = new TecnicoData();//CREAMOS EL OBJETO DEL CUAL SE LLAMARA EL METODO PARA ELIMINAR 
     
$var=$user->delById($_POST["id"]);//METODO DEL OBJETO DE LA CLASE TECNICO PARA ELIMINAR PASANDO COMO PARAMETRO EL ID QUE SE TRAE DESDE LA VISTA 

            if($var[0]==1){

                core::alert("Añadido con exito"); //MENSAJE DE CONFIRMACION
                print "<script>window.location='index.php?view=Tecnico/View_Tecnico';</script>";//NOS LLEVA AL INICIO
                

            }else{
                core::alert("Error al eliminar"); //MENSAJE DE CONFIRMACION
                print "<script>window.location='index.php?view=Tecnico/View_Tecnico';</script>";//NOS LLEVA AL INICIO
                
            }



?>