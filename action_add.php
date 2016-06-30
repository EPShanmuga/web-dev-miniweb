<!DOCTYPE html>
<html>
<head>
<title>
ADD RESULT
</title>
</head>
<body style="background-color:rgb(255,51,102);">
<center>
<p style=";font-size:40px;font-family:sylfaen">
<?php
$hash = hash('sha256', $_POST["Password"].$_POST["UserName"]);
// Create connection
$h="localhost";$d="FBDB";$r="root";$p="";
$conn = new mysqli("localhost", "root", "", "FBDB");
$dbh=new PDO("mysql:host=$h;dbname=$d", $r, $p);
$sql = $dbh->prepare("INSERT INTO Details (Name,Phone,Email,UserName,Password)
VALUES (:a,:b,:c,:d,:e)");
$sql->bindParam(':a',$_POST["Name"]);
$sql->bindParam(':b',$_POST["Phone"]);
$sql->bindParam(':c',$_POST["Email"]);
$sql->bindParam(':d',$_POST["UserName"]);
$sql->bindParam(':e',$hash);
$sql->execute();
echo "You have registered successfully!";
$uploadOk = 1;
//Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       echo $check["mime"];
        $uploadOk = 1;
    }
}
$addr="C:\\xampp\\htdocs\\facebook\\";
$addr=$addr.$_POST["UserName"];
$addr=$addr.".jpg";
move_uploaded_file($_FILES["UploadPhoto"]["tmp_name"],$addr);
echo "Please login now";
$conn->close();
?>
</p>
<br>
<form action="login.htm" id="form1"></form>
<button class="button" form="form1" style="background-color:black;font-size:35px;color:rgb(255,51,102);padding:20px 20px;font-family:sylfaen;"> LOGIN </button>
<br>
</body>
</html>