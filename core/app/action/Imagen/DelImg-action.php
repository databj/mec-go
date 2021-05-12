<?php
$img=ImageData::getAll(); 
  

       

   $img[intval($_POST['id'])]->del(); 

   core::alert("Eliminada con exito");//mensaje de confirmacion
   print "<script>window.location='index.php?view=Imagen/View_Img_All';</script>";//redireccion al index


                     
?>
