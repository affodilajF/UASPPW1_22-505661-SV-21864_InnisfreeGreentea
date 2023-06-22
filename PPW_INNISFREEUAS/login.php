<?php require 'dbConfig.php'; ?>

<?php
session_start();
if(isset($_POST["login"])){
  $username = $_POST["username"];
  $password = $_POST["password"]; 

  // check if the inputted username matches the username in the database
  $query = "SELECT * FROM user WHERE username = '$username'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1){
    // username exists, proceed to password verification
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['password'];
    if(password_verify($password, $hashedPassword)){
      // password is correct, user is authenticated
      // proceed with the login process

      $_SESSION["login"] = true; 
      $_SESSION['user_name'] = $username; 
      $_SESSION['Suser_id'] = $row['id']; // Store the user_id in the session
      echo "<script>
        window.location.href = 'final.php';
      </script>";
    } else {
      echo "<script>
        alert('Invalid password. Please try again.');
      </script>";
    }
  } else {
    echo "<script>
      alert('Invalid username. Please try again.');
    </script>";
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
    <link rel="stylesheet" href="css/login.css">
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
    <h2 class="title">Login</h2>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <label for="username" class="details">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <label for="password" class="details">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
          </div>
        </div>
        <div class="button">
          <button type="submit" name="login" class="btn" style="background-color: #FB9B0A; color: #FFFFFF;">Log In</button>
        </div>
        <div>
          <br>
          <a href="registrasi.php">Haven't made an account yet? Register!</a>
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
