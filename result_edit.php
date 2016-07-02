<!DOCTYPE html>
<html>
<head>
<title>
EDIT RESULT
</title>
</head>
<body style="background-color:rgb(255,51,102);">
  <center>
  <p style="font-family:sylfaen;font-size:40px;">
  <?php
    //creating connection and updating database
    $h="localhost";$d="FBDB";$r="root";$p="";
    $conn = new mysqli("localhost", "root", "", "FBDB");
    $dbh=new PDO("mysql:host=$h;dbname=$d", $r, $p);
    if ($conn->connect_error)
      die("Connection failed: " . $conn1->connect_error);
    //hashing and salting password
    $hash = hash('sha256', $_POST["Password"].$_POST["UserName"]);
    $sql=$dbh->prepare("UPDATE Details SET Name=:a,Email=:c,Phone=:b,UserName=:d,Password=:e WHERE UserName='$_POST[UserName_old]'");
    $sql->bindParam(':a',$_POST["Name"]);
    $sql->bindParam(':b',$_POST["Phone"]);
    $sql->bindParam(':c',$_POST["Email"]);
    $sql->bindParam(':d',$_POST["UserName"]);
    $sql->bindParam(':e',$hash);
    $sql->execute();
    echo "Please login now";
    $conn->close();
  ?>
  </p>
  <form action="login.htm"style="font-size:25px;" name ="form1" id="form1"></form>
  <br>
  <button class="button" form="form1" style="background-color:black;color:rgb(178,204,51);font-size:30px;">LOGIN</button>
  </center>
  <br>
</body>
</html>
