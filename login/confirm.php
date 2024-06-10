<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>oceansgrey  login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<li>
                                <a href="#"><div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></a>
                               
                            </li>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="confirm.php" method="POST">
					
<center><h4>check your email for verification code</h4></center>
					<span class="login100-form-title p-b-34 p-t-27">
						<a class="navbar-brand" href="../index.html" style="color: aliceblue;"><span ><img src="images/logo.png" alt="logo"></span> <b>oceansgrey </b></a>
					</span>

					
						<input class="input100" type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
						
				

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="text" name="code" placeholder="Enter your code">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login2">
							Continue
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="../account.html">
							Create Account
						</a>&nbsp;&nbsp;&nbsp;
						<a class="txt1" href="forget.html">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<script src="//code.tidio.co/rjglcrjyvzlshfz4cysq3fabyzikypga.js" async></script>

</body>
</html>
<?php
require("connect.php");
if(isset($_POST["login2"])){
    $code = $_POST["code"];
    $email = $_POST["email"];
    //
    $query = mysqli_query($con,"SELECT * FROM `code` WHERE `email`='$email' AND `code`='$code'");
    $link = mysqli_num_rows($query);
    if($link > 0){
        session_start();
        $_SESSION["email"] = $email;
        mysqli_query($con,"DELETE FROM `code` WHERE `email`='$email'");
        header("location:../dashboard");
    }else{
        echo'
        <script>
        alert("invaled token code");
        </script>
        ';
    }
    
}
?>