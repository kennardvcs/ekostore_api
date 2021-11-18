<?php
require("../setting.php");
if(isset($_POST["product_id"])) {
    $product_id = $_POST["product_id"];
    $sql = "SELECT * from product where product_id = $product_id";
    $res = mysqli_query($conn, $sql);
    if($res) {
        $row = mysqli_fetch_array($res);
        $response["value"] = 0;
        $response["message"] = "Data Success!";
        $response["product_id"] = $row["product_id"];
        $response["product_name"] = $row["product_name"];
        $response["product_price"] = $row["product_price"];
        $response["product_type"] = $row["product_type"];
    } else {
        $response["value"] = 1;
        $response["message"] = "error";
    }
}
echo json_encode($response);
?>