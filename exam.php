<?php require_once 'header.php'; ?>

<?php if($_SESSION==NULL)header('Location:home.php');

 if($_REQUEST!=NULL){
 $i=1;
 	$p=$_REQUEST["no"];
  $uid=$_SESSION["id"];
 	$sql=mysqli_query($conn,"SELECT * FROM `test` WHERE test_id=$p");
  $fql=mysqli_query($conn,"SELECT marks FROM result WHERE user_id=$uid AND test_id=$p");
  $d=mysqli_fetch_array($fql);
  if ($d!=NULL){echo "You have already taken this test";}
?>
<span></span>
<label>Time left: <span id="div_timer">Starting</span></label>
 <form action="result.php" name="theexam" method="post" accept-charset="utf-8">
 <input type="hidden" name="id" value="<?php echo $p?>">
 <?php 
  while($d=mysqli_fetch_array($sql)){
  //print_r($d);  ?>

  
  <?php echo $d['question']?>
  <input type="radio" name="<?php echo $i?>" value="<?php echo $d['op1']?>" ><?php echo $d['op1']?>
<br>
  <input type="radio" name="<?php echo $i?>" value="<?php echo $d['op2']?>" ><?php echo $d['op2']?>
<br>
  <input type="radio" name="<?php echo $i?>" value="<?php  echo $d['op3']?>" ><?php echo $d['op3']?>
<br>
<input type="radio" name="<?php echo $i?>" value="<?php echo $d['op4']?>" ><?php echo $d['op4']?>
<br><br>

  <?php
  $i++;
  } 
  ?>

  <input type="submit">
  	
  </form>
  <script type="text/javascript">
window.onload=function(){ 
    window.setTimeout(function() { document.theexam.submit(); }, 30000);
};
var timer = setInterval("mytimer()",1000);
seconds = 40;
function mytimer()
{
document.getElementById("div_timer").innerHTML = seconds; 
seconds--;
} 
</script>

  <?php
  }
 ?>
<?php require_once 'footer.php';?>