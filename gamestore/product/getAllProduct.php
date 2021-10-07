<?php
    require("../setting.php");
    $data = array();
    $sql = "SELECT * from product";
    $res = mysqli_query($conn, $sql);

    if($res) {
        while($row = mysqli_fetch_array($res)) {
            array_push($data,array(
                'product_id' => $row["product_id"],
                'product_name' => $row["product_name"],
                'product_price' => $row["product_price"],
                'product_img' => $row["product_img"],
                'product_type' => $row["product_type"],
                'stock' => $row["stock"]
            ));
        }
        $response["value"] = 0;
        $response["message"] = "berhasil";
        $response["data"] = $data;
    } else {
        $response["value"] = 1;
        $response["message"] = "error";
    }
    echo json_encode($response);
?>