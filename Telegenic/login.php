<?php
$mail = (isset($_POST['email']) ? $_POST['email'] : '');
$password = (isset($_POST['pass1']) ? $_POST['pass1'] : '');
$mail = stripcslashes($mail);
$password = stripcslashes($password);
$email1 = "Lokeshkirad12@gmail.com";
$pass1 = "lokesh@123";

$db = mysqli_connect("localhost","root","","telegenic");
//mysql_select_db("login");
if (!$db) {
    die('Could not connect: ' . mysqli_error($db));
}
      
$mail = mysqli_real_escape_string($db,$mail);
$password = mysqli_real_escape_string($db,$password); 
$result = mysqli_query($db,"select * from user_table where email = '$mail' and password = '$password'")
                    or die("faild to query database".mysqli_error($db));
                    
$row = mysqli_fetch_array($result);

if ($row['email'] == $mail && $row['password']== $password) {
    if ($row['email'] == $email1 && $row['password']== $pass1) {
        echo "Login success!!  Welcome ".$row['name'];
        header("location: admin_panel.php");
    }
    else{
        header("location: user_panel.php");
    }
   
} else {
    echo "faild to login";
    header("location: user_registration.html");
}


?>