<?php 

$firstName = $name = $email = $phone = $message = "";
$firstNameError= $nameError= $emailError=$phoneError = $messageError = "";
$isSuccess = false;
$emailTo = "ale_rafart@hotmail.com";

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $firstName= verifyInput($_POST["firstname"]) ;
    $name= verifyInput($_POST["name"]);
    $email= verifyInput($_POST["email"]);
    $phone= verifyInput($_POST["phone"]);
    $message= verifyInput($_POST["message"]);
    $isSuccess = true;
    $emailText = "";

    if(empty($firstName)){
        $firstNameError="Je veux connaître ton prénom!";
        $isSuccess = false;
    }
    else{
        $emailText .= "FirstName: $firstName\n";
    }

    if(empty($name)){
        $nameError="Et oui je veux tout savoir, même ton nom!";
        $isSuccess = false;
    }
    else{
        $emailText .= "Name: $name\n";
    }

    if(!isEmail($email)){
        $emailError = "ce n'est pas un mail valide";
        $isSuccess = false;
    }
    else{
        $emailText .= "Email : $email\n";
    }

    if(!isPhone($phone)){
        $phoneError="Que des chiffres stp, 10 attendues";
        $isSuccess = false;
    }
    else{
        $emailText .= "Phone: $phone\n";
    }

    if(empty($message)){
        $messageError= "tu n'as rien a me dire? :-(";
        $isSuccess = false;
    }
    else{
        $emailText .= "Message: $message\n";
    }

    
    if ($isSuccess){
        //envoyer
        $headers= "From: $firstName $name <$email>\r\nReply-To: $email";
        mail($emailTo, "Un message de votre formulaire", $emailText, $headers);
        $firstName = $name = $email = $phone = $message = "";
    }
}

function isPhone($var){
    return preg_match('#^0[1-9]{1}\d{8}$#', $var);
}

function isEmail($var){
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

function verifyInput($var){
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-moi!</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" ></script>
        <link href = "http///fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" >
        <link rel = "stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>contactez-moi!</h2>
            </div>
            <div class ="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" role="form">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="firstname">Prénom<span class="blue"> *</span></label>
                                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstName; ?>">
                                <p class="comments"><?= $firstNameError; ?></p>
                            </div>

                            <div class="col-md-6">
                                <label for="name">Nom<span class="blue"> *</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" value="<?php echo $name;?>">
                                <p class="comments"><?php echo $nameError; ?></p>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="email">Email<span class="blue"> *</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" value="<?php echo $email; ?>">
                                <p class="comments"><?php echo $emailError; ?></p>
                            </div>

                            <div class="col-md-6">
                                <label for="phone">Téléphone</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre Téléphone" value="<?php echo $phone; ?>">
                                <p class="comments"><?php echo $phoneError; ?></p>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="message">Message<span class="blue"> *</span></label>
                                <textarea id="message" name="message" class="form-control" placeholder="Votre message" rows="4" value="<?php echo $message ?>"></textarea>
                                <p class="comments"><?php echo $messageError; ?></p>
                            </div>

                            <div class="col-md-12">
                                <p class="blue"><strong> * Ces informations sont requises</strong></p>
                            </div>

                            <div class="col-md-12">
                                <input type="submit" class="button1" value="Envoyer">
                            </div>

                            <p class="thank-you" style="display:<?php if($isSuccess) echo 'block'; else echo 'none'; ?>">Votre message a bien été envoyé, merci de m'avoir contactée :)</p>
                        </div>
                        

                    </form>
                </div>
            </div>

            
        </div>

        
    </body>

</html>