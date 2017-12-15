
<?php
    $sso ="";
    $name ="";
	$class = "";
    if(isset($_POST["submit"])){
        $input = $_POST["input"];
        $dbhost = 'localhost';  //mysql服务器主机地址
        $dbuser = 'root';      //mysql用户名
        $dbpass = '123456789';//mysql用户名密码
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
        mysqli_set_charset($conn,"utf8");
        if(!$conn ) {
          die('Could not connect:' . mysql_error());
        }
		
        mysqli_query($conn,"set names 'utf8'");
        mysqli_select_db($conn,'NEUSTU');
        
        $sql = "select* from student where (sso='$input') or (name='$input')";
        $result = mysqli_query($conn,$sql);  
        $num = mysqli_num_rows($result);  
        if($num) {  
          $row = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中  
          $name = $row[1];
          $sso = $row[0];
		  $class = $row[2];
		 
        }  
  }    
 ?>
<!DOCTYPE html>
<html lang="zh">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="信息查询">
    <meta name="author" content="WindGrin">
    <link rel="icon" href="https://fezvrasta.github.io/bootstrap-material-design/favicon.ico">

    <title>NEU-Search</title>

    <!-- Bootstrap core CSS -->
    <link href="https://fezvrasta.github.io/bootstrap-material-design/dist/css/bootstrap-material-design.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fezvrasta.github.io/bootstrap-material-design/docs/4.0/examples/signin/signin.css" rel="stylesheet">
   </head>
  <body>

    <div class="container">

      <form class="form-signin"  action="index.php" method = "post"  name="form1">
        <h2 class="form-signin-heading">&nbsp;&nbsp;学生信息查询系统</h2>
        <label for="form3" class="sr-only">input</label>
        <input type="text" id="form3" name="input" class="form-control" placeholder="姓名或者学号" required="required" autofocus="">
         
       
        <button class="btn btn-lg btn-primary btn-block"  name="submit" type="submit">查询</button>
      </form>

    </div> <!-- /container -->
        <br><table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>姓名</th>
                    <th>学号</th>
                    <th>班级</th>
                </tr>
            </thead>
            <tbody>
               
                <tr>
                    <th scope="row"></th>
                    <td><?php echo $row[1];?> </td>
                    <td><?php echo $row[0];?> </td>
                    <td><?php echo $row[2];?> </td>
                </tr>
            </tbody>
        </table>
                                     
        
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://fezvrasta.github.io/bootstrap-material-design/assets/js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>
 

