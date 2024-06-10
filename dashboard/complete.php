<?php
ob_start();
session_start();
require("function_member.php");
require("connect.php");
require("function_contact.php");
require("function_security.php");
require("function_account.php");
require("function_loan.php");
if(!isset($_SESSION["email"])){
    header("location:../login");
}
$member = member($_SESSION["email"]);
$contact = contact($_SESSION["email"]);
$security = security($_SESSION["email"]);
$account = account($_SESSION["email"]);
$loan = loan($_SESSION["email"]);
//
$email = $_SESSION["email"];
        $query_transanction = mysqli_query($con,"SELECT * FROM `about_to` WHERE `email`='$email' ORDER BY `sn` DESC LIMIT 1");
        $link_transanction = mysqli_fetch_assoc($query_transanction);
        //amout remove
        $amount_debit = $link_transanction["amount"];
        $name = $link_transanction["account_name"];
        echo $date = date("Y-m-d");
        //calculation
        $query_real = mysqli_query($con,"SELECT * FROM `account` WHERE `email`='$email'");
        $link_real = mysqli_fetch_assoc($query_real);
        $real_amount = $link_real["deposite"];
        $account_number = $link_real["account_number"];
        //
        $currency = $link_real["currency"];
        //
        $total = $real_amount - $amount_debit;
        //updating account 
        mysqli_query($con,"UPDATE `account` SET `deposite`='$total' WHERE `email`='$email'");
        //insert into trac
        mysqli_query($con,"INSERT INTO `transaction_history`(`date`, `type`, `amount`, `narative`, `email`) 
        VALUES ('$date','DEBIT','$amount_debit','$name','$email')");
        
        //message
        $mess = '
        
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
                    <center><img src="https://oceansgrey.com/login/bg3.png" style="width:100%;"></center>
                    </div>
                    <table class="table table-striped">
                        
                          <tbody>
                            <tr>
                              <th scope="row">Account number :</th>
                              <td>'.$account_number.'</td>
                              
                            </tr>
                            <tr>
                              <th scope="row">Type :</th>
                              <td>DEBIT</td>
                    
                            </tr>
                            <tr>
                              <th scope="row">Amount :</th>
                              <td>'.$amount_debit.'</td>
                              
                            </tr>

                            <tr>
                                <th scope="row">Currency :</th>
                                <td>'.$currency.'</td>
                                
                              </tr>

                            <tr>
                                <th scope="row">Naration :</th>
                                <td>'.$name.'</td>
                                
                              </tr>

                              <tr>
                                <th scope="row">Available Balance :</th>
                                <td>'.$total.'</td>
                                
                              </tr>

                              <tr>
                                <th scope="row">Date :</th>
                                <td>'.$date.'</td>
                                
                              </tr>
                          </tbody>
                      </table>
                      
                     
                      <a href="#">https://oceansgrey.com/</a>
                      <p><img src="https://oceansgrey.com/login/icon2.png" style="width: 30px;"/>info@oceansgrey.com</p>
                    </div>
                </center>
               
               
            </div>

            <div class="semifoot">
                <ul>
                    <li><a href="https://oceansgrey.com/about.html">About</a></li>
                    <li><a href="https://oceansgrey.com/contact.html">Support</a></li>
                    <li><a href="https://oceansgrey.com/login/index.html">Login</a></li>
                    <li><a href="https://oceansgrey.com/faqs.html">FQR</a></li>
                </ul>
            </div>
           
        </div>
           
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    
</body>
</html>
        ';
        
         $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: Alert <info@oceansgrey.com>';
mail($email,"Alert",$mess,implode("\r\n", $headers));
        
        
        
        
        
        
        
        
        
        //clear about
        mysqli_query($con,"DELETE FROM `about_to` WHERE `email`='$email'");
        echo'
        <script>
        alert("funds transfer successfully");
        window.location.href = "index.php";
        </script>
        ';

   
?>