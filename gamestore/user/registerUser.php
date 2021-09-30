<?php
    require("../setting.php");

    $response = array();
    if(isset($_POST["create"])) {
        if(isset($_POST["user_email_new"]) && isset($_POST["user_password_new"]) && isset($_POST["user_firstname_new"]) && isset($_POST["user_lastname_new"])) {
            $user_email = $_POST["user_email_new"];
            $user_password = $_POST["user_password_new"];
            $user_firstname = $_POST["user_firstname_new"];
            $user_lastname = $_POST["user_lastname_new"];
            $sqlEmail = "SELECT * from user where user_email = '$user_email'";
            $resEmail = mysqli_query($conn, $sqlEmail);
            if($resEmail) {
                $countEmail = mysqli_num_rows($resEmail);
                if($countEmail < 1) {
                    $sql = "INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_address`, `user_phone`) 
                            VALUES (NULL, '$user_email', md5('$user_password'), '$user_firstname', '$user_lastname', '', '')";
                    $res = mysqli_query($conn, $sql);
                    if($res) {
                            $response["value"] = 0;
                            $response["message"] = "Account created";
                            $response["user_email"] = $user_email;
                            $response["user_password"] = $user_password;
                            $response["user_firstname"] = $user_firstname;
                            $response["user_lastname"] = $user_lastname;
                    }   else {
                        $response["value"] = 1;
                        $response["message"] = "Account failed, try again";
                        }
                } else {
                    $response["value"] = 2;
                    $response["message"] = "Email already registered";
                }
            } else {
                $response["value"] = 3;
                $response["message"] = "Email verification failed, server down";
            }
        } else {
            $response["value"] = 4;
            $response["message"] = "Information not complete";
        }
    } else {
        $response["value"] = 5;
        $response["message"] = "Wrong button";
    }
    echo json_encode($response);
    
    

?>