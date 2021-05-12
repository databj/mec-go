<?php
 $image = $_FILES['file']['tmp_name'];
 $imgContenido = addslashes(file_get_contents($image));
 $img=ImageData::add($imgContenido,$_GET['id']);
 
/*
foreach($_FILES['file']['name'] as $key=>$val):
  
  
$image= $_FILES['file']['tmp_name'][$key];
$imgContenido = addslashes(file_get_contents($image));
$img=ImageData::add($imgContenido,166);

endforeach;

/*
for($x=0; $x<count($_FILES["image"]); $x++)
{
  $file = $_FILES["image"];
  $nombre = $file["name"][$x];
  $tipo = $file["type"][$x];
  $ruta_provisional = $file["tmp_name"][$x];
  $dimensiones = getimagesize($ruta_provisional);
 

}


/*
$revisar = getimagesize($_FILES["image"]["tmp_name"]);
    
$image = $_FILES['image']['tmp_name'];
 $imgContenido = addslashes(file_get_contents($image));
   



        
        $img=ImageData::add($imgContenido,$_POST['proceso']);

        if($img[0]==1){

          core::alert("Añadido con exito");//mensaje de confirmacion
          print "<script>window.location='index.php?view=View_Procesos';</script>";//redireccion al index
    
        }else{
          core::alert("Error al añadir imagen");//mensaje de confirmacion
          print "<script>window.location='index.php?view=View_Procesos';</script>";//redireccion al index
          
        }
        */
  
?>
