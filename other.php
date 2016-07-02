<!DOCTYPE html>
<html>
<head>
<title>
VIEW PROFILES
</title>
</head>
<body style="background-color:rgb(230,102,255);font-family:sylfaen;font-size:30px;"><center>
  <h1> 
  <u> 
  VIEW OTHER PROFILES 
  </u>
  </h1>
  
  <form action="">
  <select name="customers" onchange="showCustomer(this.value)" style="background-color:black;color:rgb(230,102,255);font-size:25px;">
    <option value="">Select user:</option>
    <?php
      //getting options from database
      $conn = new mysqli("localhost","root","","FBDB");
      $sql = "SELECT Name FROM Details";
      $result = $conn->query($sql);
      if ($result->num_rows > 0)
      {
       while($row = $result->fetch_assoc()) 
       {
         $opt=$row["Name"];
         echo '<option value="'.$opt.'">'.$opt.'</option>';
        }
      }
      $conn->close();
    ?>
  </select>
  </form>
  <br>
  <div id="txtHint">Details will be shown here...</div>
  <script>
  //enabling ajax form submission
  function showCustomer(str) 
  {
    var xhttp;
    if (str == "") 
    {
      document.getElementById("txtHint").innerHTML = "";
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (xhttp.readyState == 4 && xhttp.status == 200) 
      {
        document.getElementById("txtHint").innerHTML = xhttp.responseText;
      }
    };
   xhttp.open("GET", "view.php?q="+str, true);
    xhttp.send();
  }
  </script>
  </center>
  </body>
</html>
