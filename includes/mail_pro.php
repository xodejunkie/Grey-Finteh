
<?php
$surname = $_GET["surname"];
$othername = $_GET["othername"];
$email = $_GET["email"];
$password = $_GET["password"];
// Multiple recipients
  require 'PHPMailer/PHPMailerAutoload.php';
         $mail = new PHPMailer;
         

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.oceansgrey.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'account@oceansgrey.com';                     //SMTP username
    $mail->Password   = 'wisdomrita';                               //SMTP password
    $mail->SMTPSecure = 'ssl';             //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('account@oceansgrey.com', 'oceansgrey');
    //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress($email);               //Name is optional
    $mail->addReplyTo('account@oceansgrey.com', 'oceansgrey');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Account Activation';
    $mail->Body    = '
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        .wrapper{
            background: #f5fcfc;
        }
        .middle{
            background: white;
            width: 60%;
            height: 600px;
        }
        header{
            height: 60px;
            width: 100%;
            background: tomato;
            margin-top: 100px;
            position: relative;
            
        }
        footer{
            margin-top: 50px;
            text-align: center;
        }
        .semifoot ul{
            text-align: center;
            margin-left: 430px;
        }
        .semifoot ul li{
            
            float: left;
            margin: 20px;
            list-style: none;
        }
        .semifoot ul li a{
            color: lightgrey;
        }
        .bott{
            text-align: center;
            color: lightgrey;
            width: 100%;
        }
        @media screen and (max-width: 680px) {
            .wrapper{
            
        }
        .middle{
            background: white;
            width: 100%;
            height: 350px;
        }
        header{
            height: 100px;
            width: 100%;
            background: tomato;
            margin-top: 100px;
            position: relative;
            
        }

        .semifoot ul{
            text-align: center;
            margin-left: 0px;
        }
        .semifoot ul li{
            
            float: left;
            margin: 20px;
            list-style: none;
        }
        .semifoot ul li a{
            color: lightgrey;
        }
        .bott{
            text-align: center;
            color: lightgrey;
            width: 100%;
        }
        }

    </style>

</head>
<body>
    <div class="container wrapper">
        <div class="row" >
            <div class="col-md-12">
                <center>
                    <div class="middle" style="margin-top: 50px;">
                    
                    
                    <div class="row" style="">
                    <center><img src="https://oceansgrey.com/bg3.png" style="width:100%;"></center>
                    </div>
                    <p style="padding-top:50px;">Dear '.$surname.' '.$othername.'</p>
                    <p>Thanks for open account with us your username/email is<br/> '.$email.' </p>
                   
                      <p style="margin-top:10px;">The privacy and security of your personal details is important to us.</p>
                      <p>Thank you for choosing oceansgrey</p>
                      <a href="https://oceansgrey.com/">https://oceansgrey.com/</a>
                      <p><img src="https://oceansgrey.com/icon2.png" style="width: 30px;"/>info@oceansgrey.com</p>
                    </div>
                </center>
               
               
            </div>

            <div class="semifoot">
                <ul>
                    <li><a href="https://oceansgrey.com/about.html">About</a></li>
                    <li><a href="https://oceansgrey.com/contact.html">Support</a></li>
                    <li><a href="https://oceansgrey.com/login/">Login</a></li>
                    <li><a href="https://oceansgrey.com/faqs.html">FQR</a></li>
                </ul>
            </div>
           
        </div>
           
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    
</body>
</html>
    ';
    
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   header("location:login/");
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
