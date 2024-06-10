<?php
function security($email){
    require("connect.php");
    $array = array();
    $query_member = mysqli_query($con,"SELECT * FROM `security` WHERE `email`='$email'");
    while($link_member = mysqli_fetch_assoc($query_member)){
        $array["sn"] = $link_member["sn"];
        $array["email"] = $link_member["email"];
        $array["security_question"] = $link_member["security_question"];
        $array["answer"] = $link_member["answer"];
        $array["username"] = $link_member["username"];
        $array["password"] = $link_member["password"];
        $array["active"] = $link_member["active"];
    }
    return $array;
}
?>