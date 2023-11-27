<html>
<body>
<script>
    let uname_localstorage=localStorage.getItem("username");



</script>
<?php

    echo "<h1><center> Dear <script> document.writeln(uname_localstorage);</script></center> </h1> 
    <br><br><br><br><hr>";
    

    extract($_POST);
//    echo $age."--".$dob."--".$contact."--".$uname."--".$pword;

?>
<div class="center" >
<?php
   $servername = "localhost";
   $uname1 = "root";
   $pass= "";
   $dbname = "userdetails";

   // Create connection
$conn = new mysqli($servername, $uname1, $pass, $dbname);
// Check connection
if ($conn->connect_error) {  die("Connection failed: " . $conn->connect_error);
}

$stmt =$conn->prepare("UPDATE userprofile SET age=? , dob=? , contact=?  WHERE username=?");
$stmt->bind_param("ssss", $age, $dob, $contact, $uname);

// echo "Reached" .$uname;

		if($stmt->execute()) {

  echo "<h1 style=\"color:red\";> MY PROFILE </h1>";
  
  echo "<h2> Click <button><a href=\"http://localhost/proguvi/login.html\">here</a></button> to Sign in and view updated profile </h2>";
    }
  $stmt->close();
$conn->close();
   
?>



<script>
     localStorage.setItem("age",'<?php echo $age; ?>');
     localStorage.setItem("dob",'<?php echo $dob?>');
     localStorage.setItem("contact",'<?php echo $contact?>');
</script>

<h1> Adding data in user profile</h1>
<h1>
      click<button> <a href="readstorage.php">here</a></button> to view session data in localStorage </a>
</h1>
      
</div>
</body>

<style>

button{
        border-radius: 50px;
        padding: 15px 32;
}

  .hr{
    height:7px;
    border-width:0;
    color:black;
    background-color:black;
  }
  .center {
    text-align: center;
    margin-top: 50px;
    margin-left: 290px;
    width: 60%;
    height: 50%;
    border: 5px solid #000000;
    padding-top: 10px;
    border-radius: 50px;
}

  </style>
</html>