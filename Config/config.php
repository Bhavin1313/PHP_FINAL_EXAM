<?php
class Config{

    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DATABASE_NAME = "php3";
    public $con_res;

    public function Connect(){
        $this->con_res = mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASE_NAME);
        return $this->con_res;
    }

    public function insertCar($car_c_name,$car_m_year,$car_m_name,$car_man_year,$car_variant,$car_price,$car_owner){
        $this->Connect();
        $query = "INSERT INTO car_info (car_c_name,car_m_year,car_m_name,car_man_year,car_variant,car_price,car_owner) VALUES ($car_c_name,'$car_m_year','$car_m_name','$car_man_year','$car_variant','$car_price','$car_owner');";
        $res = mysqli_query($this->con_res,$query);
        return $res;
    }



    public function fetchCar(){
        $this->Connect();
        $query = "SELECT * FROM car_info";
        $object = mysqli_query($this->con_res,$query);
        return $object;
    }

    public function updateCar($car_c_name,$car_m_year,$car_m_name,$car_man_year,$car_variant,$car_price,$car_owner){
        $this->connect();
        $query = "UPDATE car_info SET car_c_name = '$car_c_name',car_m_year = '$car_m_year',car_m_name ='$car_m_name',car_man_year = '$car_man_year',car_variant = '$car_variant',car_price ='$car_price',car_owner ='$car_owner'  WHERE id = $id;";

        $res = mysqli_query($this->con_res,$query);
        return $res;
    }

    public function insert_user($name,$email,$password){
        $this->connect();
        $_hash_password = password_hash($password,PASSWORD_DEFAULT);

        $query="INSERT INTO user (name,email,password) VALUES ('$name','$email','$_hash_password');";

        $res = mysqli_query($this->con_res,$query);
        return $res;
    }

    public function sign_in($email,$password){
        $this->connect();

        $query = "SELECT * FROM user WHERE email='$email';";
        $obj = mysqli_query($this->con_res,$query);
        $record = mysqli_fetch_assoc($obj);

        $hash_pass = $record['password'];
        $res = password_verify($password,$hash_pass);

        if($res){
            return true;
        }else{
            return false;
        }
    }


}
?>