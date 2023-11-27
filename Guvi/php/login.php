<?php

    extract($_POST);
    
?>

 <?php
   $servername = "localhost";
   $usname = "root";
   $pass= "";
   $dbname = "userdetails";
   $count=0;

$conn = new mysqli($servername, $usname, $pass, $dbname);
// Check connection
if ($conn->connect_error) {  die("Connection failed: " . $conn->connect_error);
}



$stmt = $conn->prepare("SELECT * FROM userprofile where username=? and password=?");
$stmt->bind_param("ss", $uname, $pword);
$stmt->execute();
$result=$stmt->get_result();

$row = $result -> fetch_array(MYSQLI_ASSOC);
$a=$row["age"];
$d=$row["dob"];
$c=$row["contact"];

$rowcount=mysqli_num_rows($result);
$count=$rowcount;

 if($rowcount>0)
   echo "<h1 style=\"color:black\";> <center>Login Successful, Welcome to my Home page </center></h1>";
   else
   echo "<h1 style=\"color:red\";> <center>Invalid Username/Password </center></h1>";
  mysqli_free_result($result);
  $stmt->close();
  mysqli_close($conn);
?>

<?php
if($count>0)
{
?>

<script>

     localStorage.setItem("username",'<?php echo $uname; ?>');
     localStorage.setItem("password",'<?php echo $pword?>');
     console.log("localStorage is successfully created");
</script>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>




</head>
<body>
    <div class="signupFrm">
        <form action="update.php" class="form" method="post" id="ProfileForm">
          <div class="header">
          <h1 class="title">Profile Entry</h1></div>
  
          <div class="inputContainer">
            <label for="" class="label">Age </label>
            <?php
            echo "<input type=\"text\" class=\"input\"  name=\"age\" id=\"age\" value=$a placeholder=\"Age\">"
            ?>
          </div>
          
          <div class="inputContainer">
            <label for="" class="label">DOB</label>
            <?php
      echo "<input type=\"date\" class=\"input\" id=\"dob\" name=\"dob\" value=$d placeholder=\"DOB\">"
            ?>
          </div>

          <div class="inputContainer">
            <label for="" class="label">Address </label>
            <?php
            echo "<input type=\"text\" class=\"input\" id=\"contact\" name=\"contact\" value=$c >"
            ?>
            </div>
        <?php
          echo "<input type=\"hidden\" name=\"uname\" value=$uname>";

          
          echo "<input type=\"hidden\" name=\"pword\" value=$pword>";
          

          ?>
          
          <input type="submit" class="submitBtn" value="Update" id="update" style="margin-top:120px"/>
       
        </div>
      </form>
    </div>

</body>
</html>
<?php
}?>
