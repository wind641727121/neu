<?php
    $sso ="";
    $name ="";

    if(isset($_POST["submit"])){
        $input = $_POST["input"];
        $dbhost = 'localhost';  //mysql服务器主机地址
        $dbuser = 'root';      //mysql用户名
        $dbpass = 'new_password';//mysql用户名密码
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
        mysqli_set_charset($conn,"utf8");
        if(!$conn ) {
          die('Could not connect:' . mysql_error());
        }
		echo 'ssd';
        mysqli_query($conn,"set names 'utf8'");
        mysqli_select_db($conn,'NEUSTU');
        
        $sql = "select* from student where (sso='$input') or (name='$input')";
        $result = mysqli_query($conn,$sql);  
        $num = mysqli_num_rows($result);  
        if($num) {  
          $row = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中  
          $name = $row[1];
		   
          $sso = $row[0];
		  echo 'jahaha';
        }  
  }    
?>