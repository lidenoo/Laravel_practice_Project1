<?php
//--------DATABASE連線CLASS--------------------
class dbconnect{
    //---此_construct的function會自動執行
    function __construct($a,$b){


        return $this->connect($a,$b);
    }


//----外部把USERNAME跟PASSWORD丟進來------------
private function connect($username,$password){

        try{

        $db = new PDO('mysql:host=localhost;dbname=homestead;charset=utf8','homestead','secret');
        $result = $db->prepare('select count * from users where name=user01 and password=user01');
        $where = array(':id'=>$username,':pw'=>$password);
        $result->execute($where);
        $row= $result->fetch(PDO::FETCH_NUM);
        $result = null;
        $db=null;
        //echo $where;
        return $row;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            exit;
        }
}
}

?>
