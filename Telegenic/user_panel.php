<?php
   
   $con = mysqli_connect("localhost","root","","telegenic");

   if (!$con) 
   {
      die('Could not connect: ' . mysqli_error($con));
   }
?>

<!DOCTYPE html>
<html>
<head>
<title> watch web series
</title>
<style>
body {
  /*background-image: url("show.jpg");*/
  background-color: grey;
  background-repeat: no-repeat;
  background-attachment: fixed;ck
  background-position: center;
  background-size: 1600px 900px;
}
h1,p,h2
{
  color: blue;
}

{
  color: blue;
}
.table
{
  padding-left:
  color : blue; 
  font-family: 'Staatliches', cursive;
}

.button {
  background-color: black; /* Green */
  border-color:black;
  border: 13px double #110101;
  border-radius: 20px;
  text-shadow: 2px 2px #544F4F;
  color: white;
  padding: 12px 50px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 30px;
  font-family: 'Staatliches', cursive;
}
#in
{
  border-radius: 20px;
  border-color:black;
  border: 13px #110101;
  background-color: red;
  color: white;
  font-family: 'Staatliches', cursive;
  height: 50%;
    width: 100%;
    padding: 10px;
}
#bt
{
  border-radius: 20px;
  border-color:black;
  border: 13px #110101;
  background-color: white;
  color: black;
  font-family: 'Staatliches', cursive;
  height: 50%;
    width: 100%;
    padding: 10px;
}
#label {
  text-align: left;
  font-weight: bold;
  font-size: 20px;
  color:black;
}
#h1 {
  text-align: center;
  font-weight: bold;
  font-size: 40px;
  color: red;
}
#login_form{
    border: greenyellow;
    width: 30%;
    border-radius: 5px;
    margin: 100px auto;
   backface-visibility: visible;
    height: 400%;
    width: 20%;
    padding: 30px;
    background: rgba(0, 0, 0, 0.23);
    color: black;
}   
#btn{
    background-color: greenyellow;
    color: black;
    margin-left: 70%;
    padding: 5px;
}
.we
{
letter-spacing: 5px;
color: black;
font-weight: bold;
} 
.te
{
color: blue;
font-weight: bold;
letter-spacing: 8px;
font-family: 'Staatliches', cursive;
}   
</style>
</head>
<br>
<body class="b">
<h1 class="we">Welcome to</h1>
<h1 class ="te">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TeleGeNiC</h1>
<center>
<h1 align="right" color="red"> User Panel<a href="home.html"><br><br>Log out</a></h1>
<body>
<table class="table" cellpadding="10">
</tr><?php
     
$sql =" SELECT * FROM videos ORDER BY id DESC ";
    
$result=mysqli_query($con,$sql);
    
while($row=mysqli_fetch_assoc($result) or die(mysqli_error($con)))
{
  $series_name = $row['s_name'];
  $genre = $row['genre'];
  $season_no = $row['season_no'];
  $esp_no = $row['esp_no'];
  $duration = $row['duration'];
  $rating = $row['rating'];
  $location = $row['locations'];
  $img = $row['imglocations'];
  echo "<td><video src='".$location."' controls width='700px' height='550px' ></td>";
  echo "<td controls width='710px' height='550px' >
        <h2>Series name   : ".$series_name."</h2>
        <p><img src='".$img."'width='400px' height='300px' ></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Genre          : ".$genre."</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Season      : ".$season_no."</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Episode     : ".$esp_no."</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aprox. Duration    : $duration ".$duration."</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rating      : $rating ".$rating." </p>
        </td>";
  echo "</tr> ";
}
?></tr>
</table>
</body>
</html>