<!DOCTYPE html>
<html>
<body style="background-color:rgb(230,102,255);font-family:sylfaen;font-size:30px;">
  <?php
    //CREATING CONNECTION AND IMPORTING DATA FROM DATABASE
    $q = $_GET['q'];
    $con = mysqli_connect('localhost','root','','FBDB');
    if (!$con)     
      die('Could not connect: ' . mysqli_error($con));
    mysqli_select_db($con,"FBDB");
    $sql="SELECT * FROM Details WHERE Name = '".$q."'";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)) 
    {
      //output the data
      echo '<fieldset style="border: 5px solid black;">';
      echo'<legend style="background-color:black;color:rgb(230,102,255);font-size:40px;"><u> DETAILS </u></legend>';
      echo  "<b>NAME : </b>".$row['Name'] . "<br>";
      echo  "<b>PHONE NUMBER : </b>".$row['Phone'] . "<br>";
      echo  "<b>EMAIL ADDRESS : </b>".$row['Email'] . "<br>";
      echo  "<b>USERNAME : </b>".$row['UserName'] . "<br>";
      $addr=$row["UserName"];
      $addr=$addr.".jpg";
      echo "<img src='$addr' width=150 height=150 style='padding:10 px 10px;border:5px solid black';>";
      echo '</fieldset>';
    }
    mysqli_close($con);
  ?>
</body>
</html>
