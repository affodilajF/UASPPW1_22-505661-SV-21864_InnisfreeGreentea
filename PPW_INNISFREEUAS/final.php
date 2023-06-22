
<?php require 'dbConfig.php'; ?>

<?php
session_start();

// Jika pengguna belum login, alihkan ke halaman login.php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
} else {
    // Ambil user_id dari sesi
//     $user_name = $_SESSION['user_name'];

//     echo '<script>';
//     echo 'window.alert("User ID: ' . $_SESSION['user_name']  . '");';
//     echo '</script>';
}
?>

<!-- ------------------------------- -->
<?php
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $video_url = $_POST['video_url'];

                        $checkQuery = "SELECT * FROM gp_participants WHERE name = '$name' AND email = '$email' AND url = '$video_url'";
                        $checkResult = mysqli_query($conn, $checkQuery);

                        if (mysqli_num_rows($checkResult) > 0) {
                              // echo "Data already exists in the database.";
                          } else {
                              // Data belum ada di database, lakukan insert
                              $insertQuery = "INSERT INTO gp_participants (name, email, url, date) VALUES ('$name', '$email', '$video_url', CURDATE())";
                      
                              if (mysqli_query($conn, $insertQuery)) {
                              } else {
                                  echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
                              }
                          }
                  }

                  ?>




<!DOCTYPE html>
<html lang="en">
  <link>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>br INNISFREE</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    
    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbarstyle.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> -->
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    

  </head>
  <style>


.footer {
  background-color: #34724B;
  color: white;
  padding: 2rem 10%;

}

.footer h5 {
  font-size: 1.2rem;
  font-weight: bold;
}

.footer p {
  font-size: 0.9rem;
  line-height: 1.5;
}

.footer ul li {
  margin-bottom: 0.6rem;
}

.footer ul li a {
  color: white;
  text-decoration: none;
}

.footer ul li a:hover {
  color: #e8e8e8;
}

.footer address {
  margin-bottom: 0.75rem;
  font-size: 0.9rem;
}

.footer p {
  color: #ccc;
  font-size: 0.75rem;
  margin-top: 1.25rem;
}

.footer p a {
  color: #ccc;
  text-decoration: none;
}

.footer p a:hover {
  color: #e8e8e8;
}



  </style>
  <body>
    <!-- bootstrap javascript -->
    <!-- <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script> -->

    


    <section>
      <nav class="navbar">
            <div class="logo">
                  <img src="img/Innisfree-logo 1.png">

              </div>


            <div class="navbar-n">
                  <a href="#">Home</a>
                  <a href="productPage.php?#shopnow">Shop</a>    
                  <a href="#goPlumpCHallenge">Challenge</a>
                  <a href="#footer">Contact</a>
                  <a class="logout" href="logout.php" >Logout</a>
            </div>

            <div class="navbar-extra">
                  <a href="shoppingcart.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
                  <a href="#" id="menu"><i data-feather="menu">lgmenu</i></a>

                  
            </div>
      </nav>
    </section>

    <section class="section-name">
        <b> innisfree greentea &nbsp; &nbsp; &nbsp; innisfree greentea&nbsp; &nbsp; &nbsp; innisfree greentea &nbsp; &nbsp; &nbsp; innisfree greentea </b>
    </section> 




    <section class="home" id="home">
      <div class="row-home">
            <div class="home-img"><img src="img/wonyoung1.png" alt="wonyoung"></div>

            <div class="content">
                  <h3 style="color:  #68a77c;">Hello and wellcome,  <?php echo $_SESSION['user_name'];?>!   </h3>
                  <h1 class="tagline">"Plump Glowing Hydration Boost"</h1>
                  <div class="homeButton">
                        <!-- <button type="button" class="shopNowButton">SHOP NOW</button>
                        <button type="button" class="goChallengeButton">#GoPlumpChallenge</button> -->
                        <a href="#shopnow"class="shopNowButton">SHOP NOW</a>
                        <a href="#goPlumpCHallenge" class="goChallengeButton">#GoPlumpChallenge</a>
                        
                  </div>
                  
                  <h3> SKIN-LOVING, EARTH-CARING</h3>
                  <p>100% organic fresh green tea water and green tea seed,
                        which are only available from green tea trees that have grown
                        for over 7 years on Jeju’s organic green tea farm,
                        hydrate and nourish skin on the inside
                        keeping it moist and healthy for a long time.</p>
                  
            </div>
      </div>
    </section>

    <section class="disc-tag" id="shopnow">
      <div class="disc-text">
            <a class="a1"> <span> SALE PRODUCT! </span>BEST DEAL! </a>
            <a class="a2"> <span>30% OFF </span> FOR MEMBERSHIP </a>
            <a class="a3"> ON SALE PRODUCT! BEST DEAL! </a>
      </div>
    </section>


    <section class="products-sec">
      
      <!-- product1 -->
      <div class="product">
            <?php 
            $query = 'SELECT * FROM products WHERE id = 1'; // Ganti dengan query yang sesuai
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="product-name"><?php echo $row['nama'] ?></div>
            <!-- <div class="img-product"><img src="img/products/product1.jpg"></div> -->
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['product_img'] ).'"/>'; ?>
            <div class="price"> <a>IDR <?php echo $row['price'] ?>K </a></div>
            <div class="detail">
                  <!-- <div class="eye"><i data-feather="eye"></i></div> -->
                  <div class="rating">
                        <div class="bintang"><img src="img/star.png"></div>
                        <div class="nilai"><?php echo $row['rating']?></div>
                  </div>
            </div>
      </div>
      <div class="product">
            <?php 
            $query = 'SELECT * FROM products WHERE id = 2'; // Ganti dengan query yang sesuai
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="product-name"><?php echo $row['nama'] ?></div>
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['product_img'] ).'"/>'; ?>
            <div class="price"> <a> IDR <?php echo $row['price'] ?>K </a></div>
            <div class="detail">
                  <!-- <div class="eye"><i data-feather="eye"></i></div> -->
                  <div class="rating">
                        <div class="bintang"><img src="img/star.png"></div>
                        <div class="nilai"><?php echo $row['rating']?></div>
                  </div>
            </div>
      </div>

      <div class="product">
            <?php 
            $query = 'SELECT * FROM products where id = 3'; // Ganti dengan query yang sesuai
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="product-name"><?php echo $row['nama'] ?></div>
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['product_img'] ).'"/>'; ?>
            <div class="price"> <a> IDR <?php echo $row['price'] ?>K </a></div>
            <div class="detail">
                  <!-- <div class="eye"><i data-feather="eye"></i></div> -->
                  <div class="rating">
                        <div class="bintang"><img src="img/star.png"></div>
                        <div class="nilai"><?php echo $row['rating']?></div>
                  </div>
            </div>
      </div>


      <div class="product">
            <?php 
            $query = 'SELECT * FROM products where id = 5'; // Ganti dengan query yang sesuai
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="product-name"><?php echo $row['nama'] ?></div>
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['product_img'] ).'"/>'; ?>
            <div class="price"> <a> IDR <?php echo $row['price'] ?> </a></div>
            <div class="detail">
                  <!-- <div class="eye"><i data-feather="eye"></i></div> -->
                  <div class="rating">
                        <div class="bintang"><img src="img/star.png"></div>
                        <div class="nilai"><?php echo $row['rating']?></div>
                  </div>
            </div>
      </div>


      <div class="product">
            <?php 
            $query = 'SELECT * FROM products where id = 10'; // Ganti dengan query yang sesuai
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="product-name"><?php echo $row['nama'] ?></div>
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['product_img'] ).'"/>'; ?>
            <div class="price"> <a> IDR <?php echo $row['price'] ?>K </a></div>
            <div class="detail">
                  <!-- <div class="eye"><i data-feather="eye"></i></div> -->
                  <div class="rating">
                        <div class="bintang"><img src="img/star.png"></div>
                        <div class="nilai"><?php echo $row['rating']?> </div>
                  </div>
            </div>
      </div>

    </section>
    <section class="seemore">
      <div class="seemores">
            <button type="button" onclick="window.location.href = 'productPage.php';">SEE OTHER PRODUCTS</button>
            <img src="img/seemore-icon.png">


      </div>
    </section>



    <section class="challenge" id="goPlumpCHallenge">
      <div class="judul">
            <a>JOIN  <span class="a">#GoPlumpChallenge </span><span class="b">and win the</span>  <span class="c">prize!</span></a>
      </div>
      <div class="detailChallenge">
            <!-- <div class="video">cek</div> -->
            <div class="video"><video src="vid/goPlumpVideo.mp4" controls></video></div>
            <div class="info">
                  <div class="info1"> Upload your video challenge on TIKTOK!</div>
                  <div class="info2">Tag & follow @innisfreeindonesia. Use #GoPlumpChallenge #nnisfreeGreenTea.</div>
                  <div class="info3">WIN 2000000 MILLION PRIZE IN TOTAL!</div>
                  <div class="info4"><button type="button">Innisfree Tiktok's Account</button></div>
            </div>
      </div>
      <div class="videosubmit">
            <div class="info">
                  <a>Let We Know About You, Dear. </a>
                  <h5>SUBMIT YOUR VIDEO HERE!</h5>
            </div>
            <form action="" method="POST">
                  <label for="name">Full Name</label>
                  <input type="text" id="name" name="name" required>

                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" required>

                  <label for="video_url">Your URL #GoPlumpChallenge Tiktok Video</label>
                  <input type="url" id="video_url" name="video_url" required>

                  <input type="submit" value="DONE">
            </form>

      </div>
    </section>




<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h5>About Us</h5>
        <p>"At Innisfree, we are dedicated to harnessing the rejuvenating power of nature by cultivating the finest organic green tea from the lush fields of Jeju Island. Our skincare and beauty products incorporate the essence of green tea, rich in antioxidants and skincare properties, to provide nourishment and healing for your daily routine."</p>
      </div>
      <!-- <div class="col-md-3">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="#">Home</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Shop</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div> -->
      <div class="col-md-4">
        <h5>Contact Us</h5>
        <address style="font-size: 0.5rem;">
        PT.LANEIGE INDONESIA PACIFIC<br>
        MASUK / DAFTAR
Natural benefits
from JEJU islandPT.LANEIGE INDONESIA PACIFIC
Gd. Pacific Century Place Lantai 11 Jl.
Jend. Sudirman Kav. 52-53 SCBD LOT 10
Jakarta, Jakarta 12190<br>
          Phone: 123-456-7890<br>
          Email: innisfree@mail.com
        </address>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p>&copy; 2023 Innsfree. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>


    

        <!-- feather icon -->
        <script>
            feather.replace()
      </script>

      <script src="javascript/script.js"></script>

  </body>
</html>
