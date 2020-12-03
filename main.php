<?php
    require_once("php/db.php");
    if($dbC){
        mysqli_set_charset($dbC,"utf8");
        $email = $_COOKIE["email"];
        $sql = "SELECT * FROM affter_reg WHERE user_name = '$email'";
        $response = mysqli_query($dbC,$sql);
        if($response){
            $requit =[];
            while($row = mysqli_fetch_assoc($response))
            $requit[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="article.html">記事登録</a>
    <table>
        <tbody>
            <?php foreach($requit as $ar) : ?>
            <tr>
                <td>
                    <?= $ar["time"] ?>
                </td>
                <td>
                    <?= $ar["content"] ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="index01.html">ホームに戻る</a>
</body>
</html>