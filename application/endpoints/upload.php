<?php

//set it up to handle both profile pic uploads as well as content
// INSERT INTO Portfolio (StudentEmailAddress, ContentType, ContentLink) VALUES ('A.Elexia@gmail.com', 'Image', 'uploads/Andrew.jpg')

$target_dir = "../../htdoc/upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$save = substr($target_file, 12);
$token = $_POST['token'];
$token = substr($token, 1, (strlen($token)-2));
$action = $_POST['action'];
$title = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
$element = filter_var($_POST['Element'], FILTER_SANITIZE_STRING);

// print_r($target_file);

//THIS LIMITS THE UPLOAD TO IMAGES ONLY!!!
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
   if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
       $uploadOk = 1;
   } else {
       echo "File is not an image.";
       $uploadOk = 0;
   }
}


// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }


// Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType !="txt" && $imageFileType != "pdf") {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}



// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $newfilename = uniqid() . uniqid() . uniqid() . '.' . end($temp);
    // print_r($newfilename);
    $save = $newfilename;
    $newfilename = $target_dir . $newfilename;
    print_r($newfilename);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


// SUBSTRING OUT 'upload/'
// $save = substr($save, 7);
print_r($save);

include '../../connection.php';

// Find Email given Token
$db = DB::getInstance();
$sql = "SELECT EmailAddress FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$EmailAddress=$req->fetchColumn();

if ($uploadOk != 0) {
  if ($action == "portfolio") {
    // Update Portfolio
    $sql = "INSERT INTO Portfolio (StudentEmailAddress, ApprovedBool, ContentType, ContentLink, Title, Element, FeaturedBool) VALUES ('$EmailAddress', 0, 'Image', '$save', '$title', '$element', 0)";
  } else {
    // Update Profile Picture
    $sql = "UPDATE GeneralUser SET ProfilePicture = '$save' WHERE EmailAddress = '$EmailAddress'";
  }
  $db->query($sql);

  echo '<script type="text/javascript">
          window.close();
        </script>';
}

?>
