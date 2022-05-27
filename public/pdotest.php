<?php

try{

    //----連線SQL資料庫(mysql)
    $db = new PDO('mysql:host=localhost;dbname=homestead;charset=utf8','homestead','secret');
    echo "連線成功";
    echo "<br/>";
    //----------------------
    $sql = 'select * from homestead.user ';//sql語句

    $re = $db->query($sql); //執行sql語句存入$result//////
    $result = $re->fetchAll(PDO::FETCH_NUM);
    echo $result[0][1];
    foreach($result as $row){
        echo $row[0]."<br/>";
        echo $row[1]."<br/>";
        echo $row[2]."<br/>";

    }

        //echo $result[1];





//$db = null;

}catch(PDOException $e){

    die("Error!".$e->getMessage()."<br/>");
}







?>
