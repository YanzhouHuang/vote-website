<!DOCTYPE html>  
<!--This is the user select one choice in the voting page, 
and confirm this vote.-->
<html>  
<head>  
  
<title>Entering poll</title>  
</head>  
  
<body>  

<?php  
$opt=$_REQUEST["opt"]; 
  $con=mysql_connect("localhost","root","yanzhouhuang");  
//connect database
if(!$con){  
    die("Connection Error！");  
    }  
mysql_select_db("test",$con);     
mysql_query("update choice set count=count+1 where id=".$opt.";");  
// operate the choice table, find the count and add 1
mysql_close($con);  
?>  
<script>  
alert("Vote success！");  
window.location.href="voteindex.php";  
</script>  
</body>  
</html>  