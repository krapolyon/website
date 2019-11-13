<?php

if(isset($_POST['email'])) {
  // EDIT THE 2 LINES BELOW AS REQUIRED
  $email_to = "fanfare.krapo@gmail.com";
  $email_subject = "Contact depuis le site";

  function died($error) {
    // your error code can go here
    echo '<meta charset="utf-8">';
    echo '<link rel="stylesheet" href="css/style_global.css">';
    echo "<h1>".$error."</h1><br/>";
    echo "<a href='contact.html' style='text-decoration:none;'>Retentez vorte chance</a>";
    die();
  }

  // validation expected data exists
  if( !isset($_POST['email']) ||
    !isset($_POST['comments'])) {
    died('Veuillez au moins les champs mail et message !');       
  }

  $first_name = $_POST['first_name']; //not required
  $last_name = $_POST['last_name']; //not required
  $email_from = $_POST['email']; // required
  $telephone = $_POST['telephone']; // not required
  $comments = $_POST['comments']; // required
  $error_message = "";
  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= "L'adresse e-mail n'est pas valide, on ne pourra pas vous répondre !<br /><br/>";
  }

  $string_exp = "/^[A-Za-z .'-]+$/";
  if(strlen($comments) < 2) {
    $error_message .= 'Ecrivez au moins un vrai message.<br /><br/>';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

  $email_message = "Message suivant envoyé depuis le site.\n\n";

  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  $email_message .= "First Name: ".clean_string($first_name)."\n";
  $email_message .= "Last Name: ".clean_string($last_name)."\n";
  $email_message .= "Email: ".clean_string($email_from)."\n";
  $email_message .= "Telephone: ".clean_string($telephone)."\n";
  $email_message .= "Comments: ".clean_string($comments)."\n";

  // create email headers
  $headers = 'From: '.$email_from."\n".
    'Reply-To: '.$email_from."\n";

  mail($email_to, $email_subject, $email_message, $headers);  
  mail($email_from, "Merci Pour votre petit mot !", "Un grand merci pour votre mail, vous recevrez très vite une réponse de notre part ! Au plaisir de vous rencontrer ! Les Krapos", $headers); 
?>



<!-- include your own success html here -->

<link rel="stylesheet" href="css/style_global.css">
<h1>Merci beaucoup <?php echo $first_name ?>, vous recevrez une réponse très prochainement à <?php echo $email_from ?>!</h1>
<h2>Ou un coup de fil au <?php echo $telephone ?></h2>

<a href="index.html">Retour à la page d'accueil</a>

<?php
}
?>
