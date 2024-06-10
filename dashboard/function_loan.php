<?php
function loan($email){
    require("connect.php");
    $array = array();
    $query_member = mysqli_query($con,"SELECT * FROM `loan` WHERE `email`='$email'");
    while($link_member = mysqli_fetch_assoc($query_member)){
        $array["sn"] = $link_member["sn"];
        $array["email"] = $link_member["email"];
        $array["period"] = $link_member["period"];
        $array["amount"] = $link_member["amount"];
        $array["returns"] = $link_member["returns"];
    }
    return $array;
}
?>