<?php
    require("../setting.php");
    $response = array();
    if(isset($_POST["login"])) {
        if(isset($_POST["user_email"]) && isset($_POST["user_password"])) {
            $user_email = $_POST["user_email"];
            $user_password = $_POST["user_password"];
            $sql = "SELECT * from user where user_email = '$user_email' AND user_password = md5('$user_password')";
            $res = mysqli_query($conn, $sql);
            if($res) {
                $count = mysqli_num_rows($res);
                if($count >= 1) {
                    $row = mysqli_fetch_array($res);
                    $response["value"] = 0;
                    $response["message"] = "Login Success!";
                    $response["user_id"] = $row["user_id"];
                    $response["user_email"] = $row["user_email"];
                    $response["user_name"] = $row["user_firstname"]  . ' ' .  $row["user_lastname"];
                    
                } else {
                    $response["value"] = 1;
                    $response["message"] = "Email not found";
                }
            } else {
                $response["value"] = 2;
                $response["message"] = "Failed data connection, server problem";
            }
        } else {
            $response["value"] = 3;
            $response["message"] = "Please  fill both fields";
        } 
    } else {
        $response["value"] = 4;
        $response["message"] = "Wrong button";
    }
    echo json_encode($response);

?>