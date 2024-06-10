<?php
function account($email){
    require("connect.php");
    $array = array();
    $query_member = mysqli_query($con,"SELECT * FROM `account` WHERE `email`='$email'");
    while($link_member = mysqli_fetch_assoc($query_member)){
        $array["sn"] = $link_member["sn"];
        $array["account_name"] = $link_member["account_name"];
        $array["deposite"] = $link_member["deposite"];
        $array["account_type"] = $link_member["account_type"];
        $array["currency"] = $link_member["currency"];
        $array["account_number"] = $link_member["account_number"];
        $array["email"] = $link_member["email"];
        $array["conditions"] = $link_member["conditions"];
    }
    return $array;
}
?>