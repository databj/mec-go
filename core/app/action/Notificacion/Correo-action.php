<?php


$user = ProcesoData::getById($_GET["id"]);
$placa=EquipoData::getById($user->id_equipo);
$tempario=TemparioData::getById($user->tipo_trabajo);
$img=ImageData::getImg($_GET['id']); 
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/src/Exception.php';
require 'assets/src/PHPMailer.php';
require 'assets/src/SMTP.php';


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'dataprogamer@gmail.com';                     // SMTP username
    $mail->Password   = 'databenjito000';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('dataprogamer@gmail.com', 'MCI-SERVICE');
    $mail->addAddress("datamciservice@gmail.com", "benjamin jimenez"); 
    $mail->addAddress("awspruebadata@gmail.com", "benjamin jimenez");      // Add a recipient
   

    $contenido="ID PROCESO: ".$user->id."<br>"."<br>";
    $contenido.="PLACA: ".$placa->placa."<br>"."<br>";
    $contenido.="DESCRIPCION: ".$tempario->descripcion.'<br>';


/*
if(count($users)>0){
	

foreach($users as $user){
                $placa=EquipoData::getById($user->id_equipo);
                $tempario=TemparioData::getById($user->tipo_trabajo);
$contenido.="--------------------- ".'<br>';
$contenido.="ID PROCESO:  ".$user->id.'<br>';
$contenido.="PLACA:  ".$placa->placa.'<br>';
$contenido.="DESCRIPCION: ".$tempario->descripcion.'<br>';
$contenido.="--------------------- ".'<br>'.'<br>';


}

}
*/

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'MCI - Service';
    $mail->Body    = 'Alerta De Proceso Entrante'.'<br>';
    $mail->Body.=$contenido.'<br>';
   
    $mail->send();
  
    Core::alert("Mensaje Enviado");
  //  print "<script>window.location='index.php?view=View_Procesos';</script>";//redireccion al index
      
} catch (Exception $e) {
   Core::alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
}




/*

echo'<script src="assets/js/push.min.js" type="text/javascript"></script>  <script type="text/javascript">
  Push.create("correo enviado exitosamente ", {

    body: "FastService",
    icon: "",
    timeout: 4000,
    onClick: function () {

        this.close();
    }
});

  
</script>';

print "<script>window.location='index.php?view=indexlamina';</script>";
*/




?>