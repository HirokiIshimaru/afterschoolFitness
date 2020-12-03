<?php
require_once('db.php');
if($dbC){
    mysqli_set_charset($dbC,"UTF8");
    $purpose = $_POST["qus1"];
    $comingDay = $_POST["qus2"];
    $personality = $_POST["qus3"];
    $email = $_COOKIE["email"];
    print_r($email);
    $sql_qus = "INSERT INTO affter_qus(purpose,comingDay,personality,user_name) VALUE('{$purpose}','{$comingDay}','{$personality}','{$email}')";
    $que_qus = mysqli_query($dbC,$sql_qus);
    if($que_qus){
         echo "<script>location.href = '../index2.html';</script>";
    }
}else{
    print_r("error");
}
?>