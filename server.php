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
      header('location: indexApt.php');
    }
    else if ($role=="admin"){
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

// TAMBAH DATA PASIEN
$id_pasien = null;
$nama_pasien    = "";
$alamat="";
//$tanggal_lahir="";
$jenis_kelamin="";
$golongan_darah="";
$errors = array();

if (isset($_POST['data_pasien'])) {
  // receive all input values from the form
  $id_pasien = mysqli_real_escape_string($configDB, $_POST['id_pasien']);
  $nama_pasien = mysqli_real_escape_string($configDB, $_POST['nama_pasien']);
  $alamat = mysqli_real_escape_string($configDB, $_POST['alamat']);
  $tanggal_lahir = mysqli_real_escape_string($configDB, $_POST['tanggal_lahir']);
  $jenis_kelamin = mysqli_real_escape_string($configDB, $_POST['jenis_kelamin']);
  $golongan_darah= mysqli_real_escape_string($configDB, $_POST['golongan_darah']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($id_pasien)) { array_push($errors, "Id pasien harus diisi."); }
  if (empty($nama_pasien)) { array_push($errors, "Email harus diisi."); }
  if (empty($alamat)) { array_push($errors, "Alamat harus diisi."); }
  if (empty($tanggal_lahir)) { array_push($errors, "Tanggal Lahir harus diisi."); }
  if (empty($jenis_kelamin)) { array_push($errors, "Jenis Kelamin harus diisi."); }
  if (empty($golongan_darah)) { array_push($errors, "Golongan Darah harus diisi."); }



  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM pasien WHERE id='$id_pasien'";
  $result = mysqli_query($configDB, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    //pengecekan apakah data user sudah diisi atau belum ini masih blmbener
    if ($user['id'] === $id_pasien) {
      array_push($errors, "Data pasien sudah diisi.");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO pasien (id, nama_pasien, alamat, tanggal_lahir,jenis_kelamin,golongan_darah) 
  			  VALUES($id_pasien, '$nama_pasien', '$alamat', '$tanggal_lahir','$jenis_kelamin','$golongan_darah')";
  	mysqli_query($configDB, $query);
    //pembagian header sesuai dengan role masing-masing user
    echo "Pemasukan data pasien berhasil!";
    header('location: regdataPasien.php');

  	
  }
}

//Tambah data dokter
$id_dokter = null;
$nama_dokter    = "";
$poli_dokter="";
$spesialisasi="";
$errors = array();

if (isset($_POST['data_dokter'])) {
  // receive all input values from the form
  $id_dokter  = mysqli_real_escape_string($configDB, $_POST['id_dokter']);
  $nama_dokter = mysqli_real_escape_string($configDB, $_POST['nama_dokter']);
  $poli_dokter = mysqli_real_escape_string($configDB, $_POST['poli_dokter']);
  $spesialisasi = mysqli_real_escape_string($configDB, $_POST['spesialisasi']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($id_dokter)) { array_push($errors, "Id dokter harus diisi."); }
  if (empty($nama_dokter)) { array_push($errors, "Nama harus diisi."); }
  if (empty($poli_dokter)) { array_push($errors, "Poli harus diisi."); }
  if (empty($spesialisasi)) { array_push($errors, "Spesialisasi harus diisi."); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM dokter WHERE id='$id_dokter'";
  $result = mysqli_query($configDB, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    //pengecekan apakah data user sudah diisi atau belum ini masih blmbener
    if ($user['id'] === $id_dokter) {
      array_push($errors, "Data dokter sudah diisi.");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO dokter (id, nama_dokter, poli, spesialisasi) 
  			  VALUES($id_dokter, '$nama_dokter', '$poli_dokter', '$spesialisasi')";
  	mysqli_query($configDB, $query);
    //pembagian header sesuai dengan role masing-masing user
    echo "Pemasukan data pasien berhasil!";
    header('location: regdataDokter.php');

  	
  }
}

?>