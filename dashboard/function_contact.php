<?php
function contact($email){
    require("connect.php");
    $array = array();
    $query_member = mysqli_query($con,"SELECT * FROM `contact_details` WHERE `email`='$email'");
    while($link_member = mysqli_fetch_assoc($query_member)){
        $array["sn"] = $link_member["sn"];
        $array["email"] = $link_member["email"];
        $array["phone"] = $link_member["phone"];
        $array["home"] = $link_member["home"];
        $array["city"] = $link_member["city"];
        $array["state"] = $link_member["state"];
        $array["zip_code"] = $link_member["zip_code"];
        $array["country"] = $link_member["country"];
    }
    return $array;
}
?>