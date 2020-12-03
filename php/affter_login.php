<?php
require_once('db.php');
if(empty($_POST["email"])){
    echo "<script>alert('メールアドレスを入力してください')</script>";
    echo "<script>location.href = '../affter_login.html';</script>";
    return false;
}else{
    if(empty($_POST["pw"])){
    echo "<script>alert('パスワードを入力してください')</script>";
    echo "<script>location.href = '../affter_login.html';</script>";
    return false;
}else{
    if($dbC){
        mysqli_set_charset($dbC,"utf8");
        $email = $_POST["email"];
        $pw = $_POST["pw"];
        $sql = "SELECT * FROM affter_user WHERE email = '$email'";
        $que_klogin = mysqli_query($dbC,$sql);
        if($que_klogin){
            $result = mysqli_fetch_assoc($que_klogin);
        }
        $dbemail = $result["email"];
        $dbpw = $result["pw"];
        if($email==$dbemail && $pw==$dbpw){
            setcookie("email", "$dbemail", time() + 3600, "/");
            echo "<script>location.href = '../affter_questionnaire.html';</script>";   
        }else{
            echo "<script>alert('Emailかパスワードが違います')</script>";
            echo "<script>location.href = '../affter_login.html';</script>";
            return false;
        }
    }

}
}


?>