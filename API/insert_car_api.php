<?php
header("Access-Control-Allow-Methods: POST");

include("../Config/config.php");

$config = new Config();
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $car_c_name = $_POST['car_c_name'];
    $car_m_year = $_POST['car_m_year'];
    $car_m_name = $_POST['car_m_name'];
    $car_man_year = $_POST['car_man_year'];
    $car_variant = $_POST['car_variant'];
    $car_price = $_POST['car_price'];
    $car_owner = $_POST['car_owner'];

    $responce = $config->insertCar($car_c_name,$car_m_year,$car_m_name,$car_man_year,$car_variant,$car_price,$car_owner);


    if($responce){
        $res['data'] = "Data Added Successfully...";
    }else{
        $res['data'] = "Data Insertion Faild...";
    }
}else{
    $res['error'] = "Only POST http Method is Allowed....";
}
echo json_encode($res);

?>