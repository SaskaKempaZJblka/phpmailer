<?php
use PHPMailer\PHPMailer\PHPMailer;
//var_dump($_POST['clients']);
if(isset($_POST['submit'])){
    
    //$name = $_POST['name'];
    
   
    
   
    $adres = $_POST['adr_email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $body_copy = $_POST['body'];

    require "phpMailer\Exception.php";
    require "phpMailer\PHPMailer.php";
    require "phpMailer\SMTP.php";
    
    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
   
    

if(!empty($_POST['accounts'])){
    $selected = $_POST['accounts'];
    if($selected == "account_1"){
        
        $email = "twojemail";
        $mail->Username = "twojemail";
        $mail->Password = 'haslo';
    }
    elseif($selected == "account_2"){
        $email = "twojemail";
        $mail->Username = "twojemail";
        $mail->Password = 'haslo';
    }
    elseif($selected == "account_3"){
        $email = "ouditb@bLogint.top";
        $mail->Username = "ouditb@bLogint.top";
        $mail->Password = 'j5XVbD6UjS';
    }
}

    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    if(isset($_FILES['file'])){  
        $files = restructureArray($_FILES['file']);
        $countfiles = count($_FILES['file']['name']);
        /*for($i=0;$i<$countfiles;$i++){
            $filename = $_FILES['file']['name'][$i];
            $file_tmp  = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $mail->addAttachment($file_tmp, $file_name);   */
        foreach($files as $key => $file){
            $mail->addAttachment(
                $file['tmp_name'],
                $file['name']
            );
        } 
    }
    

    if($_POST['mailStyle'] == "style_1")
    {
        $body = "<div style = 'background-color:#99ffff;'><h1 style = 'font-size:64px; text-decoration:none;'>Witaj, dostałeś wiadomość od ".$adres."</h1>
        <br><p style= 'font-size:24px;'>O treści : ".$body_copy."</p>";
    }
    elseif($_POST['mailStyle'] == "style_2")
    {
        $body = "<div style = 'background-color:#adcf9d;'><h1 style = 'font-size:64px; text-decoration:none;'>Witaj, dostałeś wiadomość od ".$adres."</h1>
        <br><p style= 'font-size:24px;'>O treści : ".$body_copy."</p><img src='https://i.kym-cdn.com/entries/icons/mobile/000/026/152/gigachad.jpg'>";
    }


    //email settings
    $mail->isHTML(true);
    
        $mail->setFrom($adres);
        $mail->addAddress($adres);
        $mail->Subject = ($subject);
        $mail->Body = $body;
        $mail->send();

   header('Location: index.html');
    
    
}   
        //header('Location: index.html');
    
   
   // exit(json_encode(array("status" => $status, "response" => $response)));

function restructureArray(array $arr){
    $result = array();
    foreach($arr as $key =>$value){
        for($i=0;$i<count($value);$i++){
            $result[$i][$key] = $value[$i];
        }
    }
    return $result;
}



//pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"

/*<option value="szew.dusta2137@gmail.com">Klient 1</option>
                <option value="szew.dusta2137@gmail.com">Klient 2</option>
                <option value="Klient3">Klient 3</option>*/

         /*       <input type="email" name="inputClient" placeholder="Wpisz adres email klienta">
			<input type="text" name="nameClient" placeholder="Wpisz nazwe klienta">
			<input type="button" name="addClient" value="Dodaj Klienta">
*/


?>
