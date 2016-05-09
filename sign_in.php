
<?php require_once 'header.php'; ?>
<?php
$mg="";

 if(isset($_REQUEST['msg'])){
 if($_REQUEST["msg"]=="1") {
 $mg="You have to log in first";
 }
}
// if($_REQUEST["msg2"]=="2") {
// $mg="lsadjflasdjfljl";
// }


  $nameErr = $passwordErr ="";
   $name=$password  ="";
   $err='';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["username"])) {
     $nameErr = "Username is required";
   } else {
     $name = test_input($_POST["username"]);
   }
   
   if (empty($_POST["password"])) {
     $passwordErr = "Password is required";
   } else {
     $password = test_input($_POST["password"]);
   }
    

   if($nameErr==''&&$passwordErr ==''){
    
  $sql=mysqli_query( $conn, "SELECT * FROM user WHERE username='$name' AND password='$password' ");
  
	$num_rows = mysqli_num_rows($sql);
  
  $data=mysqli_fetch_array($sql);

    $unam=$data['username'];
    $id=$data['id'];
    $nam=$data['name'];
    
    if($num_rows == 0) {
	$err="Username & password don't match";
	}
    else{
          
  $_SESSION["username"] = "$unam";
  $_SESSION["id"] = "$id";
  $_SESSION["name"] = "$nam";
  print_r($_SESSION);
     	      header('Location: userpage.php');
      }
       }
  }

  function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }
  ?>
  
  <div class="container">
  <div class="row">
  <div class="col-md-8">
  
  <div class="well well-lg" style="background-color:black;">

  <span style="color:red;"><b><?php echo "&nbsp;".$mg?></b></span>
  <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" accept-charset="utf-8">
  <span style="color:red;"> <?php echo "&nbsp;".$err; ?></span>
  <br/><br/>
  <label  class="col-sm-2 control-label">Username:</label>
  <input type="text" name="username" class="form-control" value="<?php echo $name?>">
  <span style="color:red;"><b> <?php echo "&nbsp;".$nameErr;?></b></span>
  <br/><br/>
  <label  class="col-sm-2 control-label">Password:</label>
  <input type="password" name="password" class="form-control" placeholder=""> 
  <span style="color:red;"><b> <?php echo "&nbsp;".$passwordErr;?></b></span> 
  <br/><br/>
  <div class="col-sm-offset-2 col-sm-20"> 
    <button type="submit" class="btn btn-default">Log In</button> 
  </div>
  </form>

  </div>
  </div>
  </div>
  </div>
  </div>

  <?php require_once 'footer.php';?>

