<?php



        $user = new EquipoData();//CREAMOS EL OBJETO DEL CUAL SE LLAMARA EL METODO PARA ELIMINAR 
     
     $var=$user->delById($_POST["id"]);//METODO DEL OBJETO DE LA CLASE CLIENTE PARA ELIMINAR PASANDO COMO PARAMETRO EL ID QUE SE TRAE DESDE LA VISTA 
  
     if($var[0]==1){
        core::alert("Eliminado con exito"); //MENSAJE DE CONFIRMACION
        print "<script>window.location='index.php?view=Equipo/View_Equipo';</script>";//NOS LLEVA AL INICIO

     }else{
        core::alert("No se pudo eliminar con exito"); //MENSAJE DE CONFIRMACION
        print "<script>window.location='index.php?view=Equipo/View_Equipo';</script>";//NOS LLEVA AL INICIO

     }



              
?>