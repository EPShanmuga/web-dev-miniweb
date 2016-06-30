<?php
$conn=new mysqli("localhost","root","","FBDB");
$sql=" CREATE TABLE Details(
Name varchar(30) UNIQUE,
UserName varchar(15) PRIMARY KEY,
Email varchar(20) UNIQUE,
Phone int CHECK(Phone>100000000 AND Phone<999999999),
Password varchar(70)
)";
if ($conn->query($sql) === TRUE)
{
echo "Table created!";
} 
else 
{
echo "Error" . $conn->error;
}
$conn->close();
?>