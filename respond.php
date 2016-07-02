<?php
  //importing all the names from database into an array
  $conn = new mysqli("localhost","root","","FBDB");
  $sql = "SELECT Name FROM Details";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc()) 
    {
      $a[]=$row["Name"];
    }
  }
  $conn->close();
  // get the q parameter from URL
  $q = $_REQUEST["q"];
  $hint = "";
  // lookup all hints from array if $q is different from "" 
  //ensures qorking only when something is typed and not before that
  if ($q !== "") 
  {
    //check (case-insensitive) if the input is the beginning substring of one of the names in the array
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) 
    {
      $try=substr($name,0,$len);
      if ($try==$q) 
      {
        if ($hint === "") 
          $hint = $name;
        else 
          $hint .= ", $name";
      }
    }
  }
  // Output "No such user" if no hint was found or output correct values 
  echo $hint === "" ? "No such user!" : $hint;
?>
