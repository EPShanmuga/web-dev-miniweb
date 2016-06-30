<!DOCTYPE html>
<html>
<head>
<title>
USER PAGE
</title>
</head>
<style>
p
{
background-color:black;
color:rgb(177,255,61);
font-size:45px;
font-family:sylfaen;
}
img
{
padding:10 px 10px;
border:5px solid black;
}
</style>
<body style="background-color:rgb(177,255,61); font-size:30px;font-family:sylfaen;">
<center>
<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "FBDB");
// Check connection
if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
} 
$flag=0;
$sql = "SELECT Name,Phone,Email,UserName,Password FROM Details";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
while($row = $result->fetch_assoc()) 
{
if($_GET["UserName"]==$row["UserName"])
{
$hashed  = hash('sha256', $_GET["Password"].$_GET["UserName"]);
if($hashed==$row["Password"])
{
$flag=1;
break;
}
}
}
if($flag)
{echo"<p> <u>PROFILE PAGE</u></p>";
echo "<b>"." Name: "."</b>" . $row["Name"]."<br>";
echo "<b>"." Phone Number: "."</b>" . $row["Phone"]."<br>";
echo "<b>"." Email Address: "."</b>".$row["Email"]."<br>";
echo "<b>"." Username: "."</b>".$row["UserName"]."<br>";
echo "<b>"."Profile Picture : "."</b><br>";
$addr=$_GET["UserName"];
$addr=$addr.".jpg";

echo "<img src='$addr' width=150 height=150>";
//echo '<form action="edit.php" method="post"><input type="hidden" value="'.$u.'"><input type="submit" value="EDIT PROFILE"></form>';
}
if(!$flag)echo("WRONG USERNAME OR PASSWORD");
}
else
echo "no result!";
$conn->close();
?>
</center>
</body>
</html>