<?php
session_start();
include "include/configDB.php";

 
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
      //nyoba redirect ke localhost
      header('location: pagePasien.php');
    }
    else if ($role=="dokter"){
      header('location: pagedokter.php');
    }
    else if ($role=="apoteker"){
      header('location: pageApoteker.php');
      header('location: indexApt.php');
    }
    else if ($role=="admin"){
      header('location: pageAdmin.php');
      header('location: indexAdmin.php');
    }
  	
  }
}

$username = "";
$email    = "";
$role="";
$errors = array();  

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($configDB, $_POST['username']);
  $password = mysqli_real_escape_string($configDB, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM user_credentials WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($configDB, $query);
  	if (mysqli_num_rows($results) == 1) {
      
      $user=mysqli_fetch_assoc($results);
  	  $_SESSION['username'] = $username;
      $_SESSION['id'] = $user['user_id'];
      $id=$user['user_id'];
      $_SESSION['role'] = $user['role'];
  	  $_SESSION['success'] = "You are now logged in";
  	  $_SESSION['success'] = "Login berhasil";
      
      //header('location: index.php');

/* hrsnya ini buat ke page tertentu tp blm bs*/
      if ($_SESSION['role']==="pasien"){
        echo $role;
        $query="SELECT * FROM pasien JOIN user_credentials ON pasien.pasien_id = user_credentials.user_id WHERE pasien.pasien_id=$id";
        $query="SELECT * FROM pasien JOIN user_credentials ON pasien.id = user_credentials.user_id WHERE pasien.id=$id";
        $ambildata=mysqli_query($configDB, $query);
        $user=mysqli_fetch_assoc($ambildata);
        $_SESSION['nama']=$user['nama_pasien'];
        $_SESSION['nama']=$user['nama'];
        
        header('location: pagePasien.php');
      }
      //redirect sesuai role
       if ($user['role']==="dokter"){
        $query="SELECT * FROM dokter JOIN user_credentials ON dokter.id = user_credentials.user_id WHERE dokter.id=$id";
        $ambildata=mysqli_query($configDB, $query);
        $user=mysqli_fetch_assoc($ambildata);
        $_SESSION['nama']=$user['nama'];
        header('location: pagedokter.php');
        4
      }
      else if ($user['role']==="apoteker"){
        header('location: indexApt.php');
      }
      else if ($user['role']==="admin"){
        header('location: indexAdmin.php');
      } 
  	}else {
  		array_push($errors, "Kombinasi username/password masih salah.");
  	}
  }
}

?>
