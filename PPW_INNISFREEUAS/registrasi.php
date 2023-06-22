<?php require 'dbConfig.php'; ?>


<?php 
if(isset($_POST["register"])){
  if(registrasi($_POST) > 0 ){
    echo "<script>
      alert('new user has been added');
      window.location.href = 'login.php';
    </script>";
  } else {
    echo mysqli_error($conn);
  } 
}

function registrasi($data){
  global $conn;
  $fullname = $data["fullname"];
  $username = strtolower(stripslashes($data["username"]));
  $email = $data["email"];
  $phonenumber = $data["phonenumber"];
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $address = $data["address"]; // Corrected variable name

  // cek konfirmasi password
  if($password !== $password2){
    echo "<script>
      alert('password not match!');
    </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // cek usn udah ada atau belum 
  $query = "SELECT * FROM user WHERE username = '$username'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) > 0){
    echo "<script>
      alert('Username is already taken. Please choose a different username');
    </script>";
    return false;
  }

  // tambah user ke database
  $query = "INSERT INTO user (fullname, username, email, phonenumber, password, address) VALUES ('$fullname', '$username', '$email', '$phonenumber', '$password', '$address')";
  if(mysqli_query($conn, $query)){
    return true;
  } else {
    echo "Error: " . mysqli_error($conn);
    return false;
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <link>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>registrasi</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    
    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- css -->
    <link rel="stylesheet" href="css/registrasi.css">
    <!-- <link rel="stylesheet" href="css/productPageBackup.css"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> -->
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    

  </head>
  <style>




  </style>
  <body>
    <!-- bootstrap javascript -->
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>


    <section class="regis">
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm your password" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address" required>
          </div>
        </div>
        <div class="button">
          <button type="submit" class="btn" name="register" style="background-color: #FB9B0A; color: #FFFFFF;">Register</button>
        </div>
        <div class="text-center mt-3">
          <a href="login.php">Already have an account? Sign in!</a>
        </div>
      </form>
    </div>
  </div>
</section>








        <!-- feather icon -->
        <script>
            feather.replace()
      </script>

      <script src="javascript/script.js"></script>

  </body>
</html>
