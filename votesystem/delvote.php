<!DOCTYPE html>  
<!--In the vote table, search the poll which the isdel column is not 1.
Then transmit the id which in the vote table to delvotehandle.php.
-->
<html>  
<head>  
<style>

<!--layout-->
div.container {
    width: 100%;
}
header{
 display: block;
   padding: 1%;
    text-align: center;
font-family:'pacifico', cursive;
   color: white;
   font-size: 2em;
   font-weight: bold;
  background-color:#3498DB;
   background-size: 100%;
 background-repeat: no-repeat;"
}
vote{
display: block;
   padding: 1%;
    text-align: center;
font-family:'pacifico', cursive;
   color: #555;
   font-size: 2em;
   font-weight: bold;

   background-size: 100%;
 background-repeat: no-repeat;"
}
nav {
 display: block;
    background-color: #2C3E50;
    text-align: center;
    transition: .2s ease-out;
    cursor: pointer;
    white-space: nowrap;
	  box-shadow: 0px 1px 3px rgba(0,0,0,0.12), 0px 1px 2px rgba(0,0,0,0.24);"
    float: center;
    max-width: auto;
    margin: 0 auto;
    padding: 1em;
    overflow: hidden;
	font-size:1em;
}
nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a:link {
    color: BLUE;
    background-color: transprent;
    text-decoration: none;
}
nav ul a:visited {
    color: white;
    background-color: transparent;
   text-decoration: blink;
}
nav ul a:hover {
    color: green;
    background-color: transparent;
  text-decoration: blink;
}
nav ul a:active {
    color: RED;
    background-color: transparent;
text-decoration: none;
}

</style>
<title>Delete Vote</title>  
</head>  
  
<body>  
<div class="container">
<header>
<h1>Delete Vote</h1> 
</header> 
<vote>
<?php  
  $con=mysql_connect("localhost","root","yanzhouhuang");  
//connect database
if(!$con){  
    die("Connection Error！");  
    }    
mysql_select_db("test",$con);   
$result=mysql_query("SELECT * FROM vote where isdel=0 ;");  //enter query to find the poll
$i=1;  
while($row=mysql_fetch_array($result)){  
    echo "<div style='margin-right:10px;float:left'>PollNumber${i}：<a href='vote.php?
	id=${row["id"]}'>${row["title"]}</a></div><div style='float:left'>
	<button id='${row["id"]}' onclick='deletejs(this.id)'>Delete</button></div><div style='clear:both'>
	</div>";//display the vote title and number
    $i++;  
}  
//delete it and recover the id
mysql_close($con);  
?>  
</vote>
<p>  
<nav>
<ul>
<a href="index.html">Return to Menu</a>  
</ul>
</nav>
</p>  
</body>  
</html>  
<script>  
function deletejs(id){  
    if(confirm("Confirm Delete？")){  
        window.location.href="delvotehandle.php?id="+id;  
        }  
    }  
</script>  