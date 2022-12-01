<?php
session_start();
require "C:/xampp/htdocs/tubes_sik/include/configDB.php";

 
// initializing variables
$username = "";
$email    = "";
$role="";
$errors = array();  

// connect to the database

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($configDB, $_POST['username']);
  $email = mysqli_real_escape_string($configDB, $_POST['email']);
  $password_1 = mysqli_real_escape_string($configDB, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($configDB, $_POST['password_2']);
  $role= mysqli_real_escape_string($configDB, $_POST['role']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username harus diisi."); }
  if (empty($email)) { array_push($errors, "Email harus diisi."); }
  if (empty($password_1)) { array_push($errors, "Password harus diisi."); }
  if ($password_1 != $password_2) {
	array_push($errors, "Kedua password tidak sama.");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user_credentials WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($configDB, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username sudah terdaftar, silakan masukkan username lagi.");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email Anda sudah terdaftar di sistem.");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user_credentials (username, email, password, role) 
  			  VALUES('$username', '$email', '$password', '$role')";
  	mysqli_query($configDB, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    //pembagian header sesuai dengan role masing-masing user
    if ($role=="pasien"){
      header('location: pagePasien.php');
    }
    else if ($role=="dokter"){
      header('location: pagedokter.php');
    }
    else if ($role=="apoteker"){
      header('location: pageApoteker.php');
    }
    else if ($role=="admin"){
      header('location: pageAdmin.php');
    }
  	
  }
}
?> 
