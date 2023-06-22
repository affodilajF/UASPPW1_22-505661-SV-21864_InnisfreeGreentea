<?php require 'dbConfig.php'; ?>


<?php
session_start();
$user_id = $_SESSION['Suser_id'];

// Jika pengguna belum login, alihkan ke halaman login.php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
} else {

}
?>

<!-- ---------- -->
<?php
            if(isset($_GET['eyes'])){
            $id = $_GET['eyes'];
            echo $id;
            }
      ?>

<!-- ------------- -->
<?php

if(isset($_POST['cari'])){
      // Langkah 3: Mendapatkan keyword pencarian dari input pengguna
      $keyword = $_POST['keyword'];
  
      // Langkah 4: Membuat query untuk mencari produk berdasarkan nama
      $query = "SELECT * FROM products WHERE nama LIKE '%$keyword%'";
      $result = mysqli_query($conn, $query);
  }
  else if(isset($_POST['MURAH'])){
      // Langkah 5: Membuat query untuk mengurutkan produk berdasarkan harga terendah
      $query = "SELECT * FROM products ORDER BY price ASC";
      $result = mysqli_query($conn, $query);
  }
  else if(isset($_POST['MAHAL'])){
      // Langkah 6: Membuat query untuk mengurutkan produk berdasarkan harga tertinggi
      $query = "SELECT * FROM products ORDER BY price DESC";
      $result = mysqli_query($conn, $query);
  }
  else if(isset($_POST['TOPSTAR'])){
      // Langkah 7: Membuat query untuk mengurutkan produk berdasarkan rating tertinggi
      $query = "SELECT * FROM products ORDER BY rating DESC";
      $result = mysqli_query($conn, $query);
  }
  else{
      // Langkah 8: Jika tombol 'cari' atau tombol pengurutan tidak ditekan, tampilkan semua data produk
      $query = $query = "SELECT * FROM products WHERE stock > 0";
      $result = mysqli_query($conn, $query);
  }
?>

<!-- ------------------ -->


<?php
if (isset($_GET['shopppingcartidproduct'])) {
  $product_id = $_GET['shopppingcartidproduct'];
  $user_id = $_SESSION['Suser_id'];

  // Cek apakah produk sudah ada dalam shopping cart
  $check_query = "SELECT * FROM shoppingcart WHERE product_id = ? AND user_id = ?";
  $stmt = mysqli_prepare($conn, $check_query);
  mysqli_stmt_bind_param($stmt, "ii", $product_id, $user_id);
  mysqli_stmt_execute($stmt);
  $check_result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($check_result) > 0) {
    // Produk sudah ada dalam shopping cart, update qty
    $update_query = "UPDATE shoppingcart SET qty = qty + 1 WHERE product_id = ? AND user_id = ?";
    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, "ii", $product_id, $user_id);
    $update_result = mysqli_stmt_execute($stmt);

    if ($update_result) {
      echo '<script>alert("Quantity updated in the shopping cart.");</script>';
    } else {
      echo '<script>alert("Failed to update quantity in the shopping cart.");</script>';
    }
  } else {
    // Produk belum ada dalam shopping cart, lakukan proses insert
    $insert_query = "INSERT INTO shoppingcart (product_id, user_id, qty) VALUES (?, ?, 1)";
    $stmt = mysqli_prepare($conn, $insert_query);
    mysqli_stmt_bind_param($stmt, "ii", $product_id, $user_id);
    $insert_result = mysqli_stmt_execute($stmt);

    if ($insert_result) {
      echo '<script>alert("Product added to the shopping cart.");</script>';
    } else {
      echo '<script>alert("Failed to add product to the shopping cart.");</script>';
    }
  }
}
?>

<!-- ------------- -->






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
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/navbarstyle.css">
    <link rel="stylesheet" href="css/productPageBackup.css">
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
    <!-- <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script> -->

    


    <section>
      <nav class="navbar">
            <div class="logo">
                  <img src="img/Innisfree-logo 1.png">

              </div>


            <div class="navbar-n">
                  <a href="final.php">Home</a>
                  <a href="productPage.php">Shop</a>    
                  <a href="final.php?#goPlumpCHallenge">Challenge</a>
                  <a href="final.php?#footer">Contact</a>
            </div>

            <div class="navbar-extra">
                  <a href="shoppingcart.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
                  <a href="#" id="menu"><i data-feather="menu">lgmenu</i></a>

                  
            </div>
      </nav>
    </section>

    <!-- <section class="section-name">
        <b> innisfree greentea &nbsp; &nbsp; &nbsp; innisfree greentea&nbsp; &nbsp; &nbsp; innisfree greentea &nbsp; &nbsp; &nbsp; innisfree greentea </b>
    </section>  -->


    <section class="fiturSearch">
      <div class="fiturcari">      
            <form action="" class="search" method="post" size=>
            <input type="text" name="keyword" autofocus placeholder="Search Product Name" autocomplete="off">
            <!-- <button type="submit" name="cari"> <img src="img/icon/eye.svg"> </button> -->
            <button type="submit" name="cari">search</button>
            </form>
      </div>

      </section>



      <section class="filter">
    <form action="" class="search" method="post">
            <button type="submit" name="SEEALL" id='aha'> SEE ALL PRODUCT </button>
            <button type="submit" name="MURAH"> LOWEST TO HIGHEST PRICE </button>
            <button type="submit" name="MAHAL"> HIGHSET TO LOWEST PRICE </button>
            <button type="submit" name="TOPSTAR"> TOP STAR </button>
      </form>
    </section>



    

    <section class="product-section">
      <?php  while($row = mysqli_fetch_assoc($result)) : ?>
      <div class="product">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['product_img'] ).'"/>'; ?>
            <div class="detailinfos" >
                  <div class="name"><?php echo $row['nama'] ?></div>
                  <div class="price"><a>IDR <?php echo $row['price'] ?> </a></div>
                  <div class="detail">
                        <div class="ratings">
                              <div class="bintang"><img src="img/star.png"></div>
                              <div class="nilairating"><?php echo $row['rating']?></div>
                        </div>
                        <!-- <a class="eye" href="productDetail.php?eyes=<?php echo $row['id'];?>">
                              <img src="img/icon/shopping-cart.svg">
                        </a> -->
                        <a class="eye" href="productDetail.php?eyes=<?php echo $row['id'];?>">
                              <img src="img/icon/eye.svg">
                        </a>

                        <!-- <a class="eye" href="#" data-id="<?php echo $row['id']; ?>">
                              <img src="img/icon/shopping-cart.svg">
                        </a> -->
                        
                        <!-- <div class="stock">Stock : <?php echo $row['id']?></div> -->
                        <a class="eye" href="productPage.php?shopppingcartidproduct=<?php echo $row['id'];?>">
                              <img src="img/icon/shopping-cart.svg">
                        </a>
                  </div>
            </div>

      </div>
      <?php endwhile; ?>
    </section>





        <!-- feather icon -->
        <script>
            feather.replace()
      </script>

      <script src="javascript/script.js"></script>

  </body>
</html>
