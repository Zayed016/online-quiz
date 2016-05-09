<?php require_once 'header.php'; ?>
<pre>
<?php if($_SESSION==NULL)header('Location:home.php');
 if($_REQUEST!=NULL){
 	$total=0;
 	$i=0;
 	
 	$tid=$_REQUEST['id'];
     $uid=$_SESSION['id'];
   //print_r($_REQUEST['id']);
 	for ($i=1; $i <4; $i++) { 
 		$io[$i]=NULL;
 	 if(isset($_REQUEST[$i]))
 	 $io[$i]=$_REQUEST[$i];
 	}
 	print_r($io);
 $sql=mysqli_query($conn,"SELECT ans FROM `test` WHERE test_id='$tid' ");
  $i=1;
 while($d=mysqli_fetch_array($sql)){
 	
  
  if($d['ans']==$io[$i])
  {	$total++;}
  $i++;
}
echo $total;
$upql=mysqli_query($conn,"SELECT marks FROM result WHERE test_id='$tid' AND user_id='$uid'");
while ($mrk=mysqli_fetch_array($upql)) {
	$mk=$mrk['marks'];
}

if ($mk<=$total){
	$upd=mysqli_query($conn,"UPDATE `result` SET `marks` = '$total', `taken_time` = CURRENT_TIMESTAMP WHERE user_id = '$uid' AND test_id='$tid';");
	}else echo "better"; 
if ($mk=NULL){
$pql=mysqli_query($conn,"INSERT INTO `result` (`user_id`, `test_id`, `marks`, `taken_time`) VALUES ( '$uid', '$tid', '$total', CURRENT_TIMESTAMP)");
}

}