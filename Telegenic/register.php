<?PHP

$name = (isset($_POST['name']) ? $_POST['name'] : '');
$email = (isset($_POST['email']) ? $_POST['email'] : '');
$password = (isset($_POST['pass1']) ? $_POST['pass1'] : '');

 $con = mysqli_connect("localhost","root","","telegenic");

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

 
$sql = "INSERT INTO user_table(name,email,password) VALUES ('$name','$email','$password')";


if(mysqli_query($con,$sql)){
	echo "succes";
	header("location: login.html");
	
}
else{
	echo "failure".mysqli_error($con);
}

?>

