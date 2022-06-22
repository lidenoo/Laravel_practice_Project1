<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title>LOGIN</title>
</head>
<?php

use App\Http\Controllers\WelcomeController;
if(!empty($_POST['username']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = new PDO('mysql:host=localhost;dbname=homestead;charset=utf8','homestead','secret');
    $sth = $pdo->prepare('select * from homestead.user where (username=?)');
    $sth->execute(array($username));
    $result = $sth->fetch(PDO::FETCH_NUM);
    if($result){
        $res1 = $result[1];
        $resPW= $result[2];
        if($password == $resPW){
            echo "密碼正確";
            $resPW = null;
        }
        else{
            echo "密碼錯誤";
        }

        $sth = null;
        $result = null;


    }

    else{
        echo "查無此帳號";

    }


}

else{
    echo "pls input";



}










?>


<body>

<h1>登入</h1>
<form action="" method="POST">

帳號:<input type="text" name="username"></br>
密碼:<input type="text"  name="password"></br>
<input type="submit" name="login" value="SUBMIT">

</form>


</body>


<footer></footer>
