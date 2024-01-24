<?php
header("Access-Control-Allow-Methods: GET");

include("../Config/config.php");

$config = new Config();
if($_SERVER['REQUEST_METHOD'] == 'GET'){


    $object = $config->fetchCar();

    $data = [];

    while($record = mysqli_fetch_assoc($object)){
        array_push($data,$record);
    }

    $res['car_data'] = $data;


}else{
    $res['error'] = "Only GET http Method is Allowed....";
}


echo json_encode($res);

?>