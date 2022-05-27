<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title>LOGIN</title>
</head>
<?php

use App\Http\Controllers\WelcomeController;

//include ('dbconn.php');

if(isset($_POST['login'])){

    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $pdo = new PDO('mysql:host=localhost;dbname=homestead;charset=utf8','homestead','secret');
        $sth = $pdo->prepare('select * from homestead.user where (username=? and userpw=?)');
        $sth->execute(array($username,$password));
        $result = $sth->fetch(PDO::FETCH_NUM);

        if($result){
            $result = null;
            echo "登入成功";

        }
        else{
            echo "登入失敗";
            $result = null;
        }



    }


else{

    echo "請輸入帳號密碼";

}






    //$where = array(':id'=>$username,':pw'=>$password);
    //$result->execute(array(':id'=>$username,':pw'=>$password));
    //$row= $result->fetch(PDO::FETCH_NUM);

    //echo $row;

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
