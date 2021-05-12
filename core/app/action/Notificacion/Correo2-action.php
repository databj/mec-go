<?php


$user = ProcesoData::getById($var[1]);
$placa=EquipoData::getById($user->id_equipo);
$tempario=TemparioData::getById($user->tipo_trabajo);
$img=ImageData::getImg($var[1]); 
  $id=$var[1];

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/src/Exception.php';
require 'assets/src/PHPMailer.php';
require 'assets/src/SMTP.php';

// Replace sender@example.com with your "From" address.
// This address must be verified with Amazon SES.
$sender = 'dataprogamer@gmail.com';
$senderName = 'MCI - SERVICE';

// Replace recipient@example.com with a "To" address. If your account
// is still in the sandbox, this address must be verified.
$recipient = 'benjiable21@gmail.com';

// Replace smtp_username with your Amazon SES SMTP user name.
$usernameSmtp = 'AKIA2ZA7HDSCJZKTT46Y';

// Replace smtp_password with your Amazon SES SMTP password.
$passwordSmtp = 'BPJYL57U0s8HYb3X/GqIrdZiCRre92N9ySIxuAN0+EFh';

// Specify a configuration set. If you do not want to use a configuration
// set, comment or remove the next line.
//$configurationSet = 'ConfigSet';

// If you're using Amazon SES in a region other than US West (Oregon),
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
// endpoint in the appropriate region.
$host = 'email-smtp.us-east-2.amazonaws.com';
$port = 587;

// The subject line of the email
$subject = 'MCI SERVICE';

// The plain-text body of the email
$bodyText =  'Alerta De Proceso Entrante'.'<br>';

// The HTML-formatted body of the email
$bodyHtml = 'Alerta De Proceso Entrante'.'<br>';

$mail = new PHPMailer(true);

try {

    $contenido="ID PROCESO: ".$user->id."<br>"."<br>";
    $contenido.="PLACA: ".$placa->placa."<br>"."<br>";
    $contenido.="DESCRIPCION: ".$tempario->descripcion.'<br>';



    // Specify the SMTP settings.
    $mail->isSMTP();
    $mail->setFrom($sender, $senderName);
    $mail->Username   = $usernameSmtp;
    $mail->Password   = $passwordSmtp;
    $mail->Host       = $host;
    $mail->Port       = $port;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
  //  $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);
    // Specify the message recipients.
    $mail->addAddress($recipient, "benjamin jimenez");
    // You can also add CC, BCC, and additional To recipients here.
    // Specify the content of the message.
    $mail->isHTML(true);
    $mail->Subject    = $subject;
     $mail->Body= 'Alerta De Proceso Entrante'.'<br>';
    $mail->Body.=$contenido.'<br>';
    $mail->AltBody    = $bodyText;
    $mail->Send();
    
    Core::alert("Mensaje Enviado");
 
    include("core/app/action/Notificacion/SendMessage-action.php");
  //print "<script>window.location='index.php?action=SendMessage&id=".$var[1]."';</script>";//redireccion al index
   // print "<script>window.location='index.php?view=View_Procesos';</script>";//redireccion al index
      

} catch (phpmailerException $e) {
    Core::alert("An error occurred. {$e->errorMessage()}"); //Catch errors from PHPMailer.
    print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
} catch (Exception $e) {
  Core::alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}"); //Catch errors from Amazon SES.
  print "<script>window.location='index.php?view=Card';</script>";//redireccion al index
}

?>