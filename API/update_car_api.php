<?php
    include("../Config/config.php");
    header("Access-Control-Allow-Methods: PATCH");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PATCH"){

        $input = file_get_contents("php://input");
        parse_str($input,$_UPDATE);

        $car_c_name = $_UPDATE['car_c_name'];
        $car_m_year = $_UPDATE['car_m_year'];
        $car_m_name = $_UPDATE['car_m_name'];
        $car_man_year = $_UPDATE['car_man_year'];
        $car_variant = $_UPDATE['car_variant'];
        $car_price = $_UPDATE['car_price'];
        $car_owner = $_UPDATE['car_owner'];

        $updated = $config->updateCar($car_c_name,$car_m_year,$car_m_name,$car_man_year,$car_variant,$car_price,$car_owner);

        if($updated){
            $res['data'] = "Data Updated Success....";
        }else{
            $res['data'] = "Data Updation Failed...."; 
        }

    }else{
        $res[error] = "Only PUT HTTP Methods are Allowed........";
    }

    echo json_encode($res);
?>