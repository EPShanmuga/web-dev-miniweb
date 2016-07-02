<!DOCTYPE html>
<html>
<head>
<title>
EDIT PAGE
</title>
</head>
<style>
  h
  {
    background-color:black;
    color:rgb(0,153,255);
    font-family-algerian;
    font-size:50px;
  }
  p
  {
    font-size:25px;
    font-family:sylfaen;
  }
</style>
<body style="background-color:rgb(204,51,155);">
  <center>
  <h>
    <u>
    EDIT PROFILE
    </u>
  </h>
  <?php
    //importing data from database
    $conn = new mysqli("localhost", "root", "", "FBDB");
    if ($conn->connect_error)
      die("Connection failed: " . $conn->connect_error);
    $flag=0;
    $sql = "SELECT Name,Phone,Email,UserName,Password FROM Details";
    $result = $conn->query($sql);
    //checking for the corresponding row
    if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc()) 
      {
        if($_GET["UserName"]==$row["UserName"])
        {
          break;
        }
      }
      if(!$flag) echo "record not found";
    }
    $conn->close();
  ?>
  <!-- input of new values with default values as the old ones-->
  <form action="result_edit.php" method="post">
  <fieldset style="background-color:rgb(255,102,51);">
    <legend style="font-size:40px;background-color:black; color:rgb(178,204,51);"><u>PERSONAL INFORMATION</u></legend>
      <input type='text' value='<?php echo $_GET["UserName"];?>' name='UserName_old'>
      Name:
      <br>
      <input style="background-color:rgb(178,204,51);" type="text" name="Name" pattern="[A-Za-z .]*" value='<?php echo $row["Name"]; ?>' required>
      <br>
      <br>
      Email Address:
      <br>
      <input style="background-color:rgb(178,204,51);" type="email" name="Email" value='<?php echo $row["Email"]; ?>'>
      <br>
      <br>
      Phone Number:
      <br>
      <input style="background-color:rgb(178,204,51);" type="number" name="Phone" min="100000000" max="999999999" value='<?php echo $row["Phone"]; ?>' >
      <br>
      <br>
      Username
      <br>
      <input name="UserName" readonly style="background-color:rgb(178,204,51);" pattern="[A-Za-z0-9]*" type="text" value='<?php echo $row["UserName"];?>' required>
      <br>
      <br>
      Password:
      <br>
      <input style="background-color:rgb(178,204,51);" type="text" name="Password" required>
      <br>
      <br>
      <input type="submit" style="background-color:black; color:rgb(178,204,51);" value="SUBMIT">
  </fieldset>
  </form>
</body>
</html>
