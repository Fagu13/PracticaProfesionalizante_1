<?php
// Revisar si los campos están vacíos
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Crear el mensaje que va a enviar
$to = 'fede.gu.com'; // //Aagrego su dirección de correo electrónico reemplazando suNombre@suDominio.com - Aquí es donde el formulario enviará un mensaje. Puede ser @gmail.com
$email_subject = "formulario web enviado por:  $name";
$email_body = "Ha recibido un nuevo mensaje de su formulario de contacto del sitio web.\n\n"."Aquí están los detalles:\n\nNombre: $name\n\nEmail: $email_address\n\n\Mensaje:\n$message";
$headers = "From: noresponder@suDominio.com\n";// Esta es la dirección de correo electrónico de la que se generará el mensaje. DEBE TENER EL DOMINIO DONDE ESTÁ ALOJADA LA WEB
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>