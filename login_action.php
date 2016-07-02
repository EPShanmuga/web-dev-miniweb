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
    // Create connection and importing data
    $conn = new mysqli("localhost", "root", "", "FBDB");
    if ($conn->connect_error)
      die("Connection failed: " . $conn->connect_error);
    $sql = "SELECT Name,Phone,Email,UserName,Password FROM Details";
    $flag=0;
    $result = $conn->query($sql);
    //checking for corresponding row and verifying the inputs
    if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc()) 
      {
        if($_GET["UserName"]==$row["UserName"])
        {
          //hashing and salting password and checking it with hashed value stored in database
          $hashed  = hash('sha256', $_GET["Password"].$_GET["UserName"]);
          if($hashed==$row["Password"])
          {
            $flag=1;
            break;
          }
        }
      }
    //output  profile details with picture
    if($flag)
    {
      echo"<p> <u>PROFILE PAGE</u></p>";
      echo "<b>"." Name: "."</b>" . $row["Name"]."<br>";
      echo "<b>"." Phone Number: "."</b>" . $row["Phone"]."<br>";
      echo "<b>"." Email Address: "."</b>".$row["Email"]."<br>";
      echo "<b>"." Username: "."</b>".$row["UserName"]."<br>";
      echo "<b>"."Profile Picture : "."</b><br>";
      $addr=$_GET["UserName"];
      $addr=$addr.".jpg";
      $u=$_GET["UserName"];
      echo "<img src='$addr' width=150 height=150>";
      echo "<form action='edit.php' method='get' ><input type='hidden' value='$u' name='UserName'><input type='submit' style='background-color:black;color:rgb(177,255,61);font-size:25px;' value='EDIT PROFILE'></form>";
      echo "<form action='other.php' ><input type='submit' style='background-color:black;color:rgb(177,255,61);font-size:25px;' value='VIEW OTHER PROFILES'></form>";
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
