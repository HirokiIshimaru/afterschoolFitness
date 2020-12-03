<?php
require_once('db.php');
if($dbC){
    mysqli_set_charset($dbC,"utf8");
    $time = $_POST["time"];
    $content = $_POST["content"];
    $user_name = $_COOKIE["email"];
    $sql_article = "INSERT INTO affter_reg(time,content, user_name)
    VALUE('{$time}','{$content}','{$user_name}')";
    $que_article = mysqli_query($dbC,$sql_article);
    if($que_article){
        echo "<sctipt>alert('投稿完了しました'</script>)";
        echo "<script>location.href = '../main.php';</script>";
    }else{
        print "error";
    }
}
?>