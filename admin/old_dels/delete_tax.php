<?php
require("connect.php");
$sn = $_GET["sn"];
mysqli_query($con,"DELETE FROM `tax` WHERE `sn`='$sn'");
echo'
<script>
alert("Record have been deleted");
window.location.href = "tax.php";
</script>
';
?>