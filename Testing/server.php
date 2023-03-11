<?php
session_start();

$username = "";
$email    = "";
$contact  = "";
$vkey     = "";
$errors   = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');

// register user
if (isset($_POST['reg_user'])) {

  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);

  $vkey = mysqli_real_escape_string($db, $_POST['email']);


  // form validation
  if (empty($username)) { 
    array_push($errors, "Username is required"); }

  if (empty($email)) { 
    array_push($errors, "Email is required"); }

  if (empty($contact)) { 
    array_push($errors, "Contact is required"); }

  if (empty($password_1)) { 
    array_push($errors, "Password is required"); }

  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same conatact and/or email
  $user_check_query = "SELECT * FROM user WHERE contact='$contact' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['contact'] === $contact) {
      array_push($errors, "Contact already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);
    $vkey = md5($vkey);

  	$query = "INSERT INTO user (username, email, contact, password, vkey)
  			  VALUES('$username', '$email', '$contact', '$password', '$vkey')";
  	mysqli_query($db, $query);
  	header('location: thankyou.html');
  }
   
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
  
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1 ";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {

      $row = $results->fetch_assoc();
      $verified = $row['verified'];

      if ($verified == 1) {
  	  $_SESSION['username'] = $username;
      header('location: index.php');
      }

      else {
        array_push($errors, "This account is not yet verified.");
      }

  	}
    else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//uploadpictures function
if(isset($_POST['upload'])){
    $description=stripslashes($_POST['description']);
    $image= $_FILES['image']['name'];

    $target_dir="images/";
    $target_file=$target_dir . basename($image);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
        $query="INSERT INTO images SET image='$image', description='$description'";
        mysqli_query($db, $query);
        header('location:index.php');
        
    }

    $_SESSION['message'] = "Record has been Uploaded!";
    
}

//let we select all the profiles from the database 

$results=mysqli_query($db, "SELECT * FROM images");
$user=mysqli_fetch_all($results, MYSQLI_ASSOC);


//delete posted picture
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $query = "DELETE FROM `images` WHERE id=$id";
  mysqli_query($db, $query);
  header('location:index.php');

  $_SESSION['message'] = "Record has been Deleted!";

}
?>
