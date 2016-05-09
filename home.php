<?php require_once 'header.php'; ?>
<pre>
<?php
$mg='1';
if($_SESSION==NULL) {
	header("Location: sign_in.php?msg=$mg");
 } else{

 $q=mysqli_query($conn,"SELECT DISTINCT test_id FROM test");

  while ($data=mysqli_fetch_array($q)){
    $a=$data['test_id'];
  ?>
<a href="exam.php?no=<?php echo $a ?>">test <?php echo $a?></a>
  <?php
}
 }
 ?>
<?php require_once 'footer.php';?>