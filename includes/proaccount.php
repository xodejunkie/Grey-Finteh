<?php
require("connect.php");
if(isset($_POST["create_acc"])){
    $surname = $_POST["sname"];
    $mname = $_POST["mname"];
    $oname = $_POST["oname"];
    $job = $_POST["job"];
    $m_status = $_POST["m-status"];
    $position = $_POST["position"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $home = $_POST["home"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zipcode = $_POST["zipcode"];
    $country = $_POST["country"];
    $acname = $_POST["acname"];
    $deposite = $_POST["deposite"];
    $type_acc = $_POST["type_acc"];
    $currency = $_POST["currency"];
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $account_number = rand(10000000000,20000000000);
    $photo = $_FILES["photo"]["name"];
    //send details
    mysqli_query($con,"INSERT INTO `security`(`email`, `security_question`, `answer`, `username`, `password`, `active`) 
    VALUES ('$email','$question','$answer','$username','$password','0')");
    //end security
    mysqli_query($con,"INSERT INTO `account`(`account_name`, `deposite`, `account_type`, `currency`, `account_number`, `email`) 
    VALUES ('$acname','$deposite','$type_acc','$currency','$account_number','$email')");
    //customer
    mysqli_query($con,"INSERT INTO `customer`(`surname`, `middle_name`, `other_name`, `job_title`, `marital_status`, `position`, `photo`, `email`) 
    VALUES ('$surname','$mname','$oname','$job','$m_status','$position','$photo','$email')");
    //customer contact details
    mysqli_query($con,"INSERT INTO `contact_details`(`email`, `phone`, `home`, `city`, `state`, `zip_code`, `country`) 
    VALUES ('$email','$phone','$home','$city','$state','$zipcode','$country')");

    //upload file
    $destination = "dashboard/images/".basename($_FILES["photo"]["name"]);
    if(move_uploaded_file($_FILES["photo"]["tmp_name"],$destination)){
        echo'
        <script>
        alert("account created successfully ");
        window.location.href = "mailpro.php?surname='.$surname.'&othername='.$oname.'&email='.$email.'&password='.$password.'";
        </script>
        ';

    }else{
        echo"Something went wrong when upload try again";
    }

}
?>