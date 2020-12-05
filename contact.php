<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecontact.css">
    <title>Document</title>
</head>
<body lass ="loggedin">
    <nav class="navtop">
        <div>
            <h1>Freedomaine</h1>
         <a href="home.php">Home</a>
         <a href="domaine.html">Domaine</a>
         <a href="about.html">About me</a>
         <a href="contact.php">Contact us</a>
         <a href="lougout.php">Login out</a>
        </div>
      </nav>
      <div class="box">
        <div class="from">
        <form name="contact_form" method="post" action="">  
            <h2>Contact us</h2>
              <div class="inputBx">
              <input  type="text" name="nom" palcaholdder="" maxlength="50" size="30" value="<?php if (
               isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']);?>">
              </div>
              <div class="inputBx">
              <input  type="text" name="prenom" maxlength="50" size="30" value="<?php if
              (isset($_POST['prenom'])) echo htmlspecialchars($_POST['prenom']);?>"> 
            </div>
              <div class ="inputBx">
              <input  type="text" name="email" maxlength="80" size="30" value="<?php if 
                (isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>">
              </div>
              <div class="message">
              <textarea  name="commentaire" cols="28" rows="10"><?php if (isset($_POST[
                'commentaire'])) echo htmlspecialchars($_POST['commentaire']);?></textarea>
              </div>
              <div class="inputBx">
                <input type="submit" value="Send message">
              </div>
              </form>
        </div>
       </div>
    
    

<?php
if(isset($_POST['email'])) {
    $email_to = "hichamoubari09@gmail.com";
    $email_subject = "Le sujet de votre email";
 
    function died($error) {
        echo 
"Nous sommes désolés, mais des erreurs ont été détectées dans le" .
" formulaire que vous avez envoyé. ";
        echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
        echo $error."<br /><br />";
        echo "Merci de corriger ces erreurs.<br /><br />";
        die();
    }
     if(!isset($_POST['nom']) ||
        !isset($_POST['prenom']) ||
        !isset($_POST['email']) ||
        !isset($_POST['commentaire'])) {
        died(
'Nous sommes désolés, mais le formulaire que vous avez soumis semble poser' .
' problème.');
    }
 
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom']; 
    $email = $_POST['email'];
    $commentaire = $_POST['commentaire'];
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email)) {
      $error_message .= 
'L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
    }
      $string_exp = "/^[A-Za-z0-9 .'-]+$/";
   
    if(!preg_match($string_exp,$nom)) {
      $error_message .= 
'Le nom que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(!preg_match($string_exp,$prenom)) {
      $error_message .= 
'Le prénom que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($commentaire) < 2) {
      $error_message .= 
'Le commentaire que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($error_message) > 0) {
      died($error_message);
    }
 
    $email_message = "Détail.\n\n";
    $email_message .= "Nom: ".$nom."\n";
    $email_message .= "Prenom: ".$prenom."\n";
    $email_message .= "Email: ".$email."\n";
    $email_message .= "Commentaire: ".$commentaire."\n";

    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);
    
}
    ?>

     
    <!-- mettez ici votre propre message de succès en html -->
</body>
</html>