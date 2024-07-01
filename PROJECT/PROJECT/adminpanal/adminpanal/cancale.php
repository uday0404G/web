<?php
include "config.php";

    $id = $_REQUEST['id'];
    $sql = "DELETE FROM `chackout` WHERE `orderid`='$id'";
    $res = mysqli_query($con, $sql);
    if ($res) {
        header("location:order_details.php");
    } else {
        echo "not deleted";
    }


?>