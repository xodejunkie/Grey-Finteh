<?php
require("connect.php");
$sn = $_GET["sn"];
mysqli_query($con,"DELETE FROM `cot` WHERE `sn`='$sn'");
echo'
<script>
alert("Record have been deleted");
window.location.href = "cot.php";
</script>
';
?>