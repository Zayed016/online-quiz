<?php require_once 'header.php'; ?>
<pre>
<?php if($_SESSION==NULL)header('Location:home.php');
 $uid=$_SESSION['id'];
 echo $uid;
 $query=mysqli_query($conn,"SELECT * FROM result WHERE user_id=$uid");

 while ($data=mysqli_fetch_array($query)) {
 	print_r($data);
 }

?>
<?php require_once 'footer.php';?>