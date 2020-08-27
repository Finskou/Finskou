<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
header('Content-Type: application/json');
if($name === '') {
  print json_encode(array('message' => 'Veuillez mettre un nom', 'code' => 0));
  exit();
}
if($email === '') {
  print json_encode(array('message' => 'Veuillez mettre un e-mail', 'code' => 0));
  exit();
}
if($subject === '') {
  print json_encode(array('message' => 'Veuillez mettre un sujet', 'code' => 0));
  exit();
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  print json_encode(array('message' => 'Format invalide.', 'code' => 0));
  exit();
}
if($message === '') {
  print json_encode(array('message' => 'Veuillez écrire un message', 'code' => 0));
  exit();
}

$content="From: $name \n Email: $email \n Message: $message";
$recipient = "lelarhaz@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Email envoyé!', 'code' => 1));
exit();



// if(isset( $_POST['name']))
// $name = $_POST['name'];
// if(isset( $_POST['email']))
// $email = $_POST['email'];
// if(isset( $_POST['message']))
// $message = $_POST['message'];
// if(isset( $_POST['subject']))
// $subject = $_POST['subject'];

// if ($name == '') {
//   echo "Veuillez donner un nom";
//   die(); 
// }
// if ($email == '') {
//   echo "Veuillez mettre un email valide";
//   die();
// } else {
//   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     echo "Format d'e-mail invalide.";
//     die();
//   }
// }

// if ($subject ==  '') {
//   echo "Le sujet doit être rempli.";
//   die();
// }

// if ($message == '') {
//   echo "Le message ne peut pas être vide.";
//   die();
// }

// $content="From: $name \n Email: $email \n Message: $message";
// $recipient = "lelarhaz@gmail.com";
// $mailheader = "From: $email \r\n";
// mail($recipient, $subject, $content, $mailheader) or die("Error!");
// echo "Message envoyé!";
?>