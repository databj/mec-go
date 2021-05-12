<?php
/*
    //Credenciales de conexion
    $Host = 'localhost';
    $Username = 'root';
    $Password = '';
    $dbName = 'mcidb';
    
    //Crear conexion mysql
    $db = new mysqli($Host, $Username, $Password, $dbName);
    
    //revisar conexion
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Extraer imagen de la BD mediante GET
    $result = $db->query("select imagenes from images_tabla where id_proceso ='169'");
    
    if($result->num_rows > 0){
        $imgDatos = $result->fetch_assoc();
        
        //Mostrar Imagen
        header("Content-type: image/jpg"); 
        echo $imgDatos['imagenes']; 
    }else{
        echo 'Imagen no existe...';
    }*/
            $img=ImageData::getById($_GET['id']); 
  

       

            header("Content-type: image/jpg"); 
            echo $img->imagenes; 

       

?>