<?php



$user = new EquiposFlotaData();//CREAMOS EL OBJETO DEL CUAL SE LLAMARA EL METODO PARA ELIMINAR 
     
$var=$user->delById($_GET["id"]);//METODO DEL OBJETO DE LA CLASE TECNICO PARA ELIMINAR PASANDO COMO PARAMETRO EL ID QUE SE TRAE DESDE LA VISTA 




//core::alert("Añadido con exito"); //MENSAJE DE CONFIRMACION
//print "<script>window.location='index.php?view=View_Flota';</script>";//NOS LLEVA AL INICIO



    if($var[0]==1){
        core::alert("Eliminado con exito");// alerta de confirmacion
        print "<script>window.location='index.php?view=View_Flota';</script>";//redireccion al inicio
        
    }else{
        core::alert("No fue Eliminado con exito");// alerta de confirmacion
        print "<script>window.location='index.php?view=View_Flota';</script>";//redireccion al inicio
    
    

    }

?>