<?php
function member($email){
    require("connect.php");
    $array = array();
    $query_member = mysqli_query($con,"SELECT * FROM `customer` WHERE `email`='$email'");
    while($link_member = mysqli_fetch_assoc($query_member)){
        $array["sn"] = $link_member["sn"];
        $array["surname"] = $link_member["surname"];
        $array["middle_name"] = $link_member["middle_name"];
        $array["other_name"] = $link_member["other_name"];
        $array["job_title"] = $link_member["job_title"];
        $array["marital_status"] = $link_member["marital_status"];
        $array["position"] = $link_member["position"];
        $array["photo"] = $link_member["photo"];
        $array["email"] = $link_member["email"];
    }
    return $array;
}
?>