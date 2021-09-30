<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        require("../setting.php");
    
        $response = array(); //menyimpan response server
        $dataGpu = array(); //menyimpan result data
        $dataCpu = array(); //menyimpan result data
        $dataPc = array(); 
    
        $sql = "SELECT * from product";
        $res = mysqli_query($conn, $sql);
    
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
            $response["value"] = 1;
            $response["message"] = "berhasil";
            $response["dataGpu"] = $dataGpu;
            $response["dataCpu"] = $dataCpu;
            $response["dataPc"] = $dataPc;
        } else {
            $response["value"] = 0;
            $response["message"] = "error pengambilan data";
        }
    } else {
        $response["value"] = 0;
        $response["message"] = "error salah metode";
    }

    echo json_encode($response);

?>