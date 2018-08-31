<!DOCTYPE html>  
<!--Get the id from the delvote.php. 
According to this id set the isdel column to 1.-->
<html>    
<head>  
<title>Deleting Poll</title>  
</head>  
  
<body>  
\
<?php  
$pid=$_REQUEST["id"];  
  $con=mysql_connect("localhost","root","yanzhouhuang");  
//connect database
if(!$con){  
    die("Connection Error！");  
    }  
mysql_select_db("test",$con);    
mysql_query("update vote set isdel=1 where id=".$pid.";");  
// found the isdel on the vote table then update it to 1 to delete it.
mysql_close($con);    
?>  
</body>  
</html>  
<script>  
alert("Delete Success");  
window.location.href="index.html";  
</script>  