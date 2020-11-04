<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['telefon']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$telefon = $_POST['telefon'];
	
// Create the email and send the message
$recipients = array{
"meiltest@taritvo.ee",
"jari@taritvo.ee"};

$to = implode(',' $recipients); // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Kodulehe kontaktvorm  $name";
$email_body = "Uus sõnum kodulehe kontaktvormilt.\n\n"."Kontakti info:\n\nNimi: $name\n\nE-mail: $email_address\n\nTelefon: $telefon\n\nMessage:\n$message";
$headers = "From: Koduleht@taritvo.ee\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Vasta: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>