<?php
   
    header("Access-Control-Allow-Methods: POST");
    include("../Config/config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD']== "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $res = $config->insert_user($name,$email,$password);

        if($res){
            $arr['data'] = "User Sign Up Success....";
        }else{
            $arr['data'] = "User Sign Up Failed....";
        }
    }else{
        $arr['error'] = "Only POST HTTP Methods are Allowed.....";
    }

    echo json_encode($arr);
?>