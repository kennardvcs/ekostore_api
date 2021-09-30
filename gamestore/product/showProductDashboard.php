<?php
    require("../setting.php");
    
    $response = array(); //menyimpan response server
    $dataGpu = array(); //menyimpan result data
    $dataCpu = array(); //menyimpan result data
    $dataPc = array(); 
    $dataNew = array();

    $sql = "SELECT * from product";
    $res = mysqli_query($conn, $sql);
    

    $sql2 = "SELECT * from product where product_id > ((SELECT COUNT(*) from product) - 4)";
    $res2 = mysqli_query($conn, $sql2);

    if($res) {
        while($row = mysqli_fetch_array($res)) {
            if($row["product_type"] == 'GPU') {
                array_push($dataGpu,array(
                    'product_id' => $row["product_id"],
                    'product_name' => $row["product_name"],
                    'product_price' => $row["product_price"],
                    'product_img' => $row["product_img"],
                    'product_type' => $row["product_type"],
                    'stock' => $row["stock"]
                ));
            } else if($row["product_type"] == 'Processor') {
                array_push($dataCpu,array(
                    'product_id' => $row["product_id"],
                    'product_name' => $row["product_name"],
                    'product_price' => $row["product_price"],
                    'product_img' => $row["product_img"],
                    'product_type' => $row["product_type"],
                    'stock' => $row["stock"]
                ));
            }   else if($row["product_type"] == 'PC') {
                array_push($dataPc,array(
                    'product_id' => $row["product_id"],
                    'product_name' => $row["product_name"],
                    'product_price' => $row["product_price"],
                    'product_img' => $row["product_img"],
                    'product_type' => $row["product_type"],
                    'stock' => $row["stock"]
                ));
            }
        }
       
    } 

    if($res2) {
        while($row2 = mysqli_fetch_array($res2)) {
            if($row2) {
                array_push($dataNew, array(
                    'product_id' => $row2["product_id"],
                    'product_name' => $row2["product_name"],
                    'product_price' => $row2["product_price"],
                    'product_img' => $row2["product_img"],
                    'product_type' => $row2["product_type"],
                    'stock' => $row2["stock"]
                ));
             }
        }
    }
    if($res || $res2) {
        $response["value"] = 1;
        $response["message"] = "berhasil";
        $response["dataGpu"] = $dataGpu;
        $response["dataCpu"] = $dataCpu;
        $response["dataPc"] = $dataPc;
        $response["dataNew"] = $dataNew;

    } else {
        $response["value"] = 0;
        $response["message"] = "error";
    }
    echo json_encode($response);

?>