<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'administracion@briccancun.org'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formulario de Contacto:  $name";
$email_body = "Recibiste un nuevo mensaje del formulario de contacto del sitio web.\n\n"."Nombre: $name\n\nEmail: $email_address\n\nTelefono: $phone\n\nMensaje:\n$message";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/plain; charset=UTF-8' . "\r\n";
$headers .= "From: noreply@briccancun.org" . "\r\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);


// Email to Person
$título = 'Gracias por su interés';
// mensaje
$mensaje = '
<html>
    <body>
        <div style="width:100%; height:60px; background: #212121 url(http://briccancun.org/resources/favicon.png) no-repeat center left; font-size:20px; color:#ffffff; padding: 30px 0 0 80px; ">
            Brigada de Rescate Internacional Canc&uacute;n, A.C.
        </div>
        <div style="width:100%; height:5px; background: #e80909;"></div>
        <div style="width:100%; margin: 20px 0;">
            <h2>Gracias por su inter&eacute;s.</h2>
            <p style="font-family:Georgia; font-size:16px;">
            Se ha enviado su consulta a la persona correspondiente; se pondr&aacute;n en contacto con usted lo antes posible.</p>
        </div>
        
    </body>
</html>
';
// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$cabeceras .= 'From: noreply@briccancun.org';
// Enviarlo
//mail('conomia_alfredo@hotmail.com', $título, $mensaje, $cabeceras);
mail($email_address, $título, $mensaje, $cabeceras);




return true;         
?>
