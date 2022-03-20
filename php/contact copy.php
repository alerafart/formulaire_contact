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
