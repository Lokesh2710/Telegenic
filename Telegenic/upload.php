
<?php
$con = mysqli_connect("localhost","root","","telegenic");
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
 
if(isset($_POST['post_data']))
{
       $maxsize = 5242880; // 5MB
       $sname = $_POST['name_s'];
       $genre = $_POST['genre'];
       $season = $_POST['season'];
       $episode = $_POST['episode'];
       $duration = $_POST['duration'];  
       $rating = $_POST['rating'];
       $img = $_FILES['fileToUpload']['name'];
       $target_dir = "videos/";
       $target_file1 = $target_dir . $_FILES["fileToUpload"]["name"];
       $video = $_FILES['file']['name'];
       $target_file = $target_dir . $_FILES["file"]["name"];
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
      $imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
      $extensions_arr1 = array("jpg","jpeg","png","gif");

if( in_array($videoFileType, $extensions_arr))
  {
    if( in_array($imageFileType, $extensions_arr1))
      {
        if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0))
            {
               echo "File too large. File must be less than 5MB.";
            }
          else
            {
               if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file))
                {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file1);
              // Insert record
                $query = "INSERT INTO videos(s_name,genre,season_no,esp_no,duration,rating,img,video,locations,imglocations)
                VALUES('$sname','$genre','$season','$episode','$duration','$rating','$img','$video','$target_file','$target_file1')";
                     
                if(mysqli_multi_query($con,$query)){
                   echo "Upload successfully.".mysqli_error($con);
                   header("location: upload.php");
                }else{
                  echo "Invalid file extension.".mysqli_error($con);
                }
             }
          }
        }
       }
    }
 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload web series information</title>
  <style type="text/css">
    .login_form {
    border: greenyellow;
    width: 30%;
    border-radius: 5px;
    margin: 100px auto;
   backface-visibility: visible;
    height: 500%;
    width: 30%;
    padding: 30px;
    background: rgba(0, 0, 0, 0.23);
    color: black;
 }  
#bt
{
  border-radius: 20px;
  border-color:black;
  border: 13px #110101;
  background-color: white;
  color: black;
  font-family: 'Staatliches', cursive;
  height: 50%;
    width: 100%;
    padding: 10px;
}
#label {
  text-align: left;
  font-weight: bold;
  font-size: 20px;
  color:silver;
}
#in
{
  border-radius: 20px;
  border-color:black;
  border: 13px #110101;
  background-color: red;
  color: white;
  font-family: 'Staatliches', cursive;
  height: 50%;
    width: 100%;
    padding: 10px;
}
  </style>
</head>
<body>
<center>
<br><br>
<H1 id="in">Submit web series information <a href="admin_panel.php">Back</a></H1>
<div class="login_form">
    <form id="frm" method="post" action="" enctype='multipart/form-data' >
        <label id="label">Name of the web series :</label><br><br>
        <input type = "text" name = "name_s"id="bt"align="middle"><br><br>
        <label id="label">Genre of the web series :</label><br><br>
        <input type = "text"name = "genre"id="bt"><br><br>
        <label id="label">Season :</label><br><br>
        <input type = "text"name = "season"id="bt"><br><br>
        <label id="label">Season's Episode's :</label><br><br>
        <input type = "text"name = "episode"id="bt"><br><br>
        <label id="label">Approximate duration of episode:</label><br><br>
        <input type = "text"name = "duration"id="bt"><br><br>
        <label id="label">Ratings: </label><br><br>
        <input type = "text"name = "rating"id="bt"><br><br>
        <label id="label">Image of the web series:</label><br><br>
        <input type="file" name="fileToUpload"id="bt"><br><br>
        <label id="label">Video of the web series:</label><br><br>
        <input type = "file"  name = "file" id="bt"multiple><br><br><br>
        <button name='post_data'id="in">upload</button>
    </form>
</div>
</center>
</body>
</html>