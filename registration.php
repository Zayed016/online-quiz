<?php require_once 'header.php'; ?>

<?php

$nerr=$passerr=$usererr=$mailerr='';
$name=$username=$password=$email='';
$mug=$meg=$msg='';

if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($_POST["name"])) {
     $nerr = "Name is required";
   } else {
     $name = input($_POST["name"]);
   }
    if (empty($_POST["username"])) {
     $usererr = "Username is required";
   } else {
     $username = input($_POST["username"]);
   }
    if (empty($_POST["password"])) {
     $passerr = "Password is required";
   } else {
     $password = input($_POST["password"]);
   }
    if (empty($_POST["email"])) {
     $mailerr = "E-mail is required";
   } else {
     $email = input($_POST["email"]);
   }
   $use=mysqli_query($conn, "SELECT username FROM `user` WHERE username='$username' ");
     
   $num=mysqli_num_rows($use);

   if($num!=0) {
    $mug="Username already exists";
  }
   else if ($nerr==''&&$passerr==''&&$usererr==''&&$mailerr=='')
   {
  
   	$result = mysqli_query($conn, "SELECT id FROM user");
   	$row_f=mysqli_num_rows($result);
   
   	 $sql=mysqli_query( $conn,"INSERT INTO `user` (`id`, `name`, `username`, `password`, `e-mail`) VALUES (NULL, '$name', '$username', '$password', '$email')");
   	 $result = mysqli_query($conn, "SELECT id FROM user");
   	 $row_s=mysqli_num_rows($result);
    
   	 if($row_s>$row_f){ $msg="Registration Successful";}
   	 else {$meg="Registration Error";}

   	//header('Location: userpage.php');


   }
}


function input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if ($msg!=NULL){
$nerr=$passerr=$usererr=$mailerr='';
$name=$username=$password=$email='';
}
?>



 <div class="container">
  <div class="row">
  <div class="col-md-8">
  <div class="well">

<span style="color:green;"><b><?php echo "&nbsp;".$msg;?></b></span>
<form class="form-inline" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" accept-charset="utf=8">



<span style="color:red;"><b><?php echo "&nbsp;".$meg;?></b></span>
<span style="color:red;"><b><?php echo "&nbsp;".$mug;?></b></span>
<br/><br/>

<label class="col-sm-2 control-label" for="nam">Name:</label>
<input class="form-control" style="width:234px;" type="text" name="name"  value="<?php echo $name?>" placeholder="please enter your name">
<span style="color:red;"><b>*<?php echo "&nbsp;".$nerr;?></b></span>

<br/><br/>

<label class="col-sm-2 control-label" for="user">Username:</label>
<input class="form-control" style="width:234px;" type="text" name="username"  value="<?php echo $username?>" placeholder="please enter your username">
<span style="color:red;"><b>*<?php echo "&nbsp;".$usererr;?></b></span>

<br/><br/>

<label class="col-sm-2 control-label" for="pass">Password:</label>
<input class="form-control" style="width:234px;" type="password"  minlength="8" name="password"  value="" placeholder="At least 8 character">
<span style="color:red;"><b>*<?php echo "&nbsp;".$passerr;?></b></span>

<br/><br/>

<label class="col-sm-2 control-label" for="mail">E-mail:</label>
<input class="form-control" style="width:234px;" type="email" name="email"  value="<?php echo $email?>" >
<span style="color:red;"><b>*<?php echo "&nbsp;".$mailerr;?></b></span>

<br/><br/>
<div class="col-sm-offset-2 col-sm-35"> 
 <button type="submit"  class="btn btn-primary" >Registration</button> 
</div>
</form>
 
 </div>
  </div>
  </div>
  </div>

<?php require_once 'footer.php';?>
 