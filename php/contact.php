<?php 

$array = array('firstname'=> '',
'name'=> '',
'email'=> '',
'phone'=> '',
'message'=> '',
'firstNameError'=> '',
'nameError'=> '',
'phoneError'=> '',
'messageError'=> '',
'isSuccess'=>false
);

$emailTo = "ale_rafart@hotmail.com";

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $array['firstname']= verifyInput($_POST["firstname"]) ;
    $array['name']= verifyInput($_POST["name"]);
    $array['email']= verifyInput($_POST["email"]);
    $array['phone']= verifyInput($_POST["phone"]);
    $array['message']= verifyInput($_POST["message"]);
    $array['isSuccess'] = true;
    $emailText = "";

    if(empty($array['firstname'])){
        $array['firstNameError']="Je veux connaître ton prénom!";
        $array['isSuccess'] = false;
    }
    else{
        $emailText .= "FirstName: {$array['firstname']}\n";
    }

    if(empty($array['name'])){
        $array['nameError']="Et oui je veux tout savoir, même ton nom!";
        $array['isSuccess'] = false;
    }
    else{
        $emailText .= "Name: {$array['name']}\n";
    }

    if(!isEmail($array['email'])){
        $array['emailError'] = "ce n'est pas un mail valide";
        $array['isSuccess'] = false;
    }
    else{
        $emailText .= "Email : {$array['email']}\n";
    }

    if(!isPhone($array['phone'])){
        $array['phoneError']="Que des chiffres stp, 10 attendues";
        $array['isSuccess'] = false;
    }
    else{
        $emailText .= "Phone:{$array['phone']}\n";
    }

    if(empty($array['message'])){
        $array['messageError']= "tu n'as rien a me dire? :-(";
        $array['isSuccess'] = false;
    }
    else{
        $emailText .= "Message: {$array['message']}\n";
    }

    if ($array['isSuccess']){
        //envoyer
        $headers= "From: {$array['firstname']} {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
        mail($emailTo, "Un message de votre formulaire", $emailText, $headers);
    }
    echo json_encode($array);
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
