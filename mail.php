<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
header('Content-Type: application/json');
if ($name === ''){
print json_encode(array('message' => 'Veuillez mettre un nom', 'code' => 0));
exit();
}
if ($email === ''){
print json_encode(array('message' => 'Veuillez mettre un email valide', 'code' => 0));
exit();
} else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
print json_encode(array('message' => "Format d'e-mail invalide." , 'code' => 0));
exit();
}
}
if ($subject === ''){
print json_encode(array('message' => 'Veuillez mettre un sujet.', 'code' => 0));
exit();
}
if ($message === ''){
print json_encode(array('message' => 'Veuillez écrire un message', 'code' => 0));
exit();
}
$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "lelarhaz@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Email envoyé!', 'code' => 1));
exit();
?>