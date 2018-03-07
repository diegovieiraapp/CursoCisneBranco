<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Erro!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Create the email and send the message
$to = 'seuemail@seusite.com'; // Troque pelo seu email
$email_subject = "Contato:  $name";
$email_body = "Você recebeu uma mensagem de contato.\n\n"."Detalhes:\n\nNome: $name\n\nEmail: $email_address\n\nFone: $phone\n\nMensagem:\n$message";
$headers = "From: noreply@seusite.com\n"; // Email para retorno. Recomendamos o uso de algo como noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
