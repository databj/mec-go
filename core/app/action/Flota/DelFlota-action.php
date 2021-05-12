<?php



$user = new FlotaData();//CREAMOS EL OBJETO DEL CUAL SE LLAMARA EL METODO PARA ELIMINAR 
     
$var=$user->delById($_POST["id"]);//METODO DEL OBJETO DE LA CLASE TECNICO PARA ELIMINAR PASANDO COMO PARAMETRO EL ID QUE SE TRAE DESDE LA VISTA 




//core::alert("Añadido con exito"); //MENSAJE DE CONFIRMACION
//print "<script>window.location='index.php?view=View_Flota';</script>";//NOS LLEVA AL INICIO



    if($var[0]==1){
        core::alert("Eliminado con exito");// alerta de confirmacion

        if($_POST["view"]=="Empresa/Flota/View_Flota"){
            print "<script>window.location='index.php?view=Empresa/Flota/View_Flota';</script>";//redireccion al index
    
          }
    
          if($_POST["view"]=="View_Flota"){
            print "<script>window.location='index.php?view=Flota/View_Flota';</script>";//redireccion al index
    
          }else{
            print "<script>window.location='index.php?';</script>";//redireccion al index
    
          }
        
    }else{
        core::alert("No fue Eliminado con exito");// alerta de confirmacion
        if($_POST["view"]=="Empresa/Flota/View_Flota"){
            print "<script>window.location='index.php?view=Empresa/Flota/View_Flota';</script>";//redireccion al index
    
          }
    
          if($_POST["view"]=="View_Flota"){
            print "<script>window.location='index.php?view=Flota/View_Flota';</script>";//redireccion al index
    
          }else{
            print "<script>window.location='index.php?';</script>";//redireccion al index
    
          }
    

    }

?>