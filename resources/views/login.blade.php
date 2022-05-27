<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title>LOGIN</title>
</head>
<?php
include ('test.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];


       $db = new dbconnect($username,$password);
       $temp = $db->__construct($username,$password);
        if($temp[0]!=0)
            {
                header('Location:http://homestead.test/index.php');
                exit;

            }
        else
            {
                echo "帳號或密碼錯誤";
            }
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
