<!DOCTYPE html>  
 <!--First Insert the data into vote table, 
 then found the id which the data just insert in vote table. 
 Final, insert voteid into choice table.-->
<html>  
<head>  
<title>Creating Poll</title>  
</head>  
 
<body>  
<?php  
//First get the title and text and the total choice include hiden  
$ptitle=$_REQUEST["title"];  
$ptext=$_REQUEST["text"];  
$nodetotal=$_REQUEST["nodetotal"];  
  $con=mysql_connect("localhost","root","yanzhouhuang");  
//connect database
if(!$con){  
    die("Connection Error！");  
    }   
mysql_select_db("test",$con);  
//insert the title and text into the table voteparent  
mysql_query("insert into vote(title,text,isdel) values ('".$ptitle."','".$ptext."',0);");  
//Using the title to find the id create by system 
$pid;  
$result=mysql_query("select id as pid from vote where title='".$ptitle."';");  
while($row=mysql_fetch_array($result)){  
    $pid=$row["pid"];  
}  
//Create a array to save choices  
$optarr=array();  
// insert the text and parentin to table votechildren
for($i=1;$i<$nodetotal+1;$i++){  
    $optarr[$i]=$_REQUEST["opt${i}"];  
    mysql_query("insert into choice(text,count,voteid) values ('".$optarr[$i]."',0,'".$pid."');");  
    };    
mysql_close($con);    
?>  
</body>  
</html>  
<script>  
alert("Create Success!");  
window.location.href="index.html";  
</script>  