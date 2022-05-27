@extends('application')
@section('main')
@section('title','身分證產生驗證器')
@endsection
<body>
<form action="" method="POST">
<?php
    $autoValue = "";
    if(!empty($_POST['gender']) && !empty($_POST['locate']))
    {
        $autoValue=rand_id();
    }

echo '身分證字號:<input type="text" name="nameid" value="'.$autoValue.'"><br>';
?>

<input type="submit" name="submit" value="OK"><br>


選擇性別:<select name="gender" id=""><br>
<option value="">請選擇</option>
<option value="1">男</option>
<option value="2">女</option>


</select><br>
選擇地區:<select name="locate" id="">
<option value="">請選擇</option>
<?php
for($i='A';$i<='Z';$i++)
{
    echo '<option value="'.$i.'">'.$i.'</option>';
}
?>



</select><br>
<input type="submit" name="generate" value="產生"><br>

</form>


</body>


<?php


if(isset($_POST['submit'])){
    $nameid = $_POST['nameid'];


    $iPidLen = strlen($nameid);
	if(!preg_match("/^[A-Za-z][1-2][0-9]{8}$/",$nameid))//驗證字元格式
	{

		echo "身分證格式錯誤";
	}
    else{
        $preg_nameid= id_check(strtoupper($nameid));
        if($preg_nameid == FALSE)
        {

            echo "無效的身分證字號";
        }
        else
        {

            echo "有效的身分證字號";
        }



    }



}





function id_check($pid){

    //以下是A-Z演算數字
    $head = array("A"=>1,"B"=>10,"C"=>19,"D"=>28,"E"=>37,"F"=>46,"G"=>55,"H"=>64,"I"=>39,"J"=>73,"K"=>82,"M"=>11,"N"=>20,"O"=>48,"P"=>29,"Q"=>38,"T"=>65,"U"=>74,"V"=>83,"W"=>21,"X"=>3,"Z"=>30,"L"=>2,"R"=>47,"S"=>56,"Y"=>12);
    $Sum=0;
    $headID=strtoupper(substr($pid,0,1));//取第一碼英文字
    $headNum = $head[$headID];//帶入HEAD陣列取得英文字對應的數字

    for($i=1;$i<10;$i++){//迴圈第一碼加到第十碼
        $Sum+=(9-$i)*substr($pid,$i,1);//8+第一碼，7+第二碼以此類推
        if((9-$i)<1){//$i小於一以後不乘以數字
            $Sum+=substr($pid,$i,1);
        }
    }

    if(($Sum+$headNum)%10 == 0) {//如加總數+頭一碼數字取於數十等於零(意即可以被10整除)
        return TRUE;
    }
}





function rand_id(){//身分證號碼產生function
    $swh = FALSE;
    $iCnt=0;
    $gender = $_POST['gender'];
    $locate=$_POST['locate'];
    if(empty($gender)){
        $swh=TRUE;
        $result= "請選擇性別";
        return $result;
    }
    if(empty($locate)){
        $swh=TRUE;
        $result= "請選擇地區";
        return $result;
    }


    while($swh == FALSE){
        $iCnt++;
        //echo $iCnt."\n";
        $num = rand(20000000,29999999);
        $fake_id=$locate.$gender.$num;
        if(id_check($fake_id) == TRUE){
            $swh = TRUE;
            return $fake_id;
        }
    }
}

?>
