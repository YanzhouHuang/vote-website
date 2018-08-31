<?php  
$pid=$_REQUEST["id"];  
 $con=mysql_connect("localhost","root","yanzhouhuang");  
//connect database
if(!$con){  
    die("Connection error!");
}  
mysql_select_db("test",$con);    
$ptitle;  
$ptext;  
$result=mysql_query("select * from vote where id=".$pid.";");  // select the vote which you pick on voteindex 
while($row=mysql_fetch_array($result)){  
    $ptitle=$row["title"];  
    $ptext=$row["text"];  
}
//Get the title and text from table voteparent
?>  

<!DOCTYPE html> 
<!--Use method “request” to get the id for voteindex.php. According to this id, display the poll title, question and all the choices, create a form, and count the votes for each choice.
Based on the count of choice, display the chart. -->
 
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
article{
	font-family:'pacifico', cursive;
	 font-size: 0.9em;
   font-weight: bold;
position:relative;
left:46.5%;
}
</style>
<title><?php  
echo "${ptitle}";  
?></title>  
</head>  

<body>  
<div class="container">
<header>
<h1>Voting</h1> 
</header> 
<form action="votehandle.php" method="get" onsubmit="return check()">  
<?php  
echo "<div style ='display: block;
    text-align: center;
font-family:pacifico, cursive;
   color: #F88E8B;
   font-size: 1em;
   '><h1>Title:  ${ptitle}</h1></div><div style='display: block;
    text-align: center;
font-family:pacifico, cursive;
   color: #3498DB;
   font-size: 1.5em;
   font-weight: bold;'><h2>Poll:  ${ptext}</h2></div>";  
$result=mysql_query("select * from choice where voteid=".$pid.";");  //get the data from choice table
$i=1;  
$countstr="";  
$optarr=array();  
while($row=mysql_fetch_assoc($result)){  
    echo "<div style = 'display: block;
   padding: 1%;
    text-align: center;
font-family:pacifico, cursive;
   color: #555;
   font-size: 2em;
   font-weight: bold;'>Choice${i}：${row["text"]}，Count:${row["count"]}<input type='radio' name='opt' value='${row["id"]}'></div>";     
   $countstr=$countstr."choice${i}=${row["count"]}&&";  
    //Create the get method and transfor the count to array<!--$optarr[$i-1]=$row["count"];--> 
	array_push($optarr, $row["count"]).
    $i++;  
//echo"<div>".var_dump($optarr)."</div>";
}  
mysql_close($con);  
if(min($optarr)>0){  
    //Set the minium is zero to identify if the count of choice is zero, will not show the chart
//	echo "<a href='demo2.php'>Pie Result</a>";
	
}  
?>  
<p><input type="submit" value="Submit" style="display: inline-block;
   border: none;
    outline: 0;
    padding: 6px 16px;
    margin-bottom: 10px;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none;
	color:white;
	font-size:18px ;
	font-family:'pacifico', cursive;
    background-color: #F88E8B;
    text-align: center;
    transition: .2s ease-out;
    cursor: pointer;
    white-space: nowrap;
    box-shadow: 0px 1px 3px rgba(0,0,0,0.12), 0px 1px 2px rgba(0,0,0,0.24);
	position:relative;
	left:46.5%;
	"/>
	</p>  
</form>  
<canvas id="can" width="400" height="400"style= "display:block;
">  
</canvas>
<article>
<!--the color represent each choice-->
<p>Choice1: Red </p><p>        choice2: black</p>
<p>choice3: yellow  </p><p>     choice4: green</p>
<p>choice5: blue  </p><p>    choice6: purple</p>
<p>choice7: orange  </p><p>     choice8: white</p>
<p>choice9: sky blue    </p><p>    choice10: pink</p>
</article>
<nav>
<ul>
<a href="index.html">Return to Menu</a>  
  </ul>
  </nav>

</body>  
</html>  
<script>  
function check(){  
    return confirm("Confirm Vote？");  	
} 
var canvas = document.getElementById("can");
var ctx = canvas.getContext("2d");
var lastend = 0;

var count = JSON.parse('<?php echo json_encode($optarr);?>');//get the array 
var myTotal = 0;
var myColor = ['red','black','yellow','green','blue','purple','orange','white','#3498DB','#F88E8B'];

for(var e = 0; e < count.length; e++)
{
  myTotal += parseInt(count[e]);
}
//Function of draw the pie chart
for (var i = 0; i < count.length; i++) {
ctx.fillStyle = myColor[i];
ctx.beginPath();
ctx.moveTo(canvas.width/2,canvas.height/2);
ctx.arc(canvas.width/2,canvas.height/2,canvas.height/2,lastend,lastend+(Math.PI*2*(count[i]/myTotal)),false);
ctx.lineTo(canvas.width/2,canvas.height/2);
ctx.fill();
lastend += Math.PI*2*(count[i]/myTotal);
}
</script>