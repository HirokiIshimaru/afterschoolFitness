<?php
require_once('db.php');
if($dbC){
    mysqli_set_charset($dbC,"UTF8");
    $email = $_POST["email"];
    $pw = $_POST["pw"];
    $userName = $_POST["userName"];
    $age = $_POST["age"];
    $tel = $_POST["tel"];
    $idcheck = "SELECT * FROM affter_user WHERE email = '$email'";
    $que_idcheck = mysqli_query($dbC,$idcheck);
    if(empty($email)){
            echo "<script>alert('idを入力してください')</script>";
            echo "<script>location.href = '../affter_signup.html';</script>";
            return false;
        }else{
            if(empty($pw)){
            echo "<script>alert('pwを入力してください')</script>";
            echo "<script>location.href = '../affter_signup.html';</script>";
            return false;
        }else{
            if($que_idcheck->num_rows > 0){
                echo "<script>alert('登録されてるIDです。');</script>";
                echo "<script>location.href = '../affter_signup.html';</script>";
                return false;
            }else{
                $sql_signup = "INSERT INTO affter_user(email,pw,userName,age,tel) 
                VALUE('{$email}','{$pw}','{$userName}','{$age}','{$tel}')";
                $que_signup = mysqli_query($dbC,$sql_signup);
                if($que_signup){
                    echo "<script>alert('登録完了しました')</script>";
                    echo "<script>location.href = '../affter_login.html';</script>";
                }
                }
            }
    }
}
?>