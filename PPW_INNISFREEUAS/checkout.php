<?php
// Periksa apakah ada data produk yang dikirimkan
if (isset($_GET['products'])) {
  // Mendapatkan data produk dari parameter URL dan decode JSON
  $products = json_decode(urldecode($_GET['products']), true);

  // Tampilkan data produk (untuk tujuan debug)
  echo "<pre>";
  print_r($products);
  echo "</pre>";
}
?>


<?php
// Periksa apakah ada data produk yang dikirimkan
if (isset($_GET['products'])) {
  // Mendapatkan data produk dari parameter URL dan decode JSON
  $products = json_decode(urldecode($_GET['products']), true);

  // Hitung total harga
  $totalPrice = 0;
  foreach ($products as $product) {
    // Ambil harga produk dan hapus karakter non-digit (misalnya, simbol $)
    $price = preg_replace('/[^0-9.]/', '', $product['price']);

    // Tambahkan harga produk ke total harga
    $totalPrice += floatval($price);
  }

  // Tampilkan total harga
  echo "Total Price: $" . number_format($totalPrice, 2);
}
?>


<?php require 'dbConfig.php'; ?>


<?php
session_start();


//     echo '<script>';
//     echo 'window.alert("User ID: ' . $_SESSION['user_name']  . '");';
//     echo '</script>';

?>


<!DOCTYPE html>
<html lang="en">
  <link>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>productpage INNISFREE</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    
    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>


    <!-- css -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/shoppingcart.css">
    <link rel="stylesheet" href="css/navbarstyle.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> -->
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    

  </head>
  <style>


    /* .modal-sec {
      padding: 1.4rem 10%;
      background-color: #34724b;
    } */



  </style>


  <body>
    <!-- bootstrap javascript -->
    <!-- <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    <?php require 'dbConfig.php'; ?>
            <!-- --------- -->

            <section>
      <nav class="navbar">
            <div class="logo">
                  <img src="img/Innisfree-logo 1.png">
              </div>

            <div class="navbar-n">
                  <a href="final.php">Home</a>
                  <a href="final.php?#shopnow">Shop</a>    
                  <a href="final.php#goPlumpCHalleange">Challenge</a>
                  <a href="#contact">Contact</a>
            </div>

            <div class="navbar-extra">
                  <a href="#" id="shopping-cart"><i data-feather="shopping-cart">lg shpc</i></a>
                  <a href="#" id="menu"><i data-feather="menu">lgmenu</i></a>
            </div>
      </nav>
    </section>


    <!-- <section class="productlist">
      <div class="container-fluid">
            <div class="col-lg-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate laudantium saepe dolor sint debitis, ex suscipit natus ea voluptates culpa exercitationem, earum ipsum obcaecati consequuntur nisi deleniti eaque? Maxime, rerum?</div>
            <div class="col-lg-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit quam pariatur, accusantium sit aliquid voluptatum ullam? Facere sint rem qui ipsam aliquid ullam aliquam voluptates. Ipsum ab quod magni quos?</div>
            <div class="col-lg-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas labore necessitatibus cumque nam quos cupiditate quam accusamus dicta? Ullam assumenda in, officiis eos velit odio cumque veniam. Dolorum, magni at!</div>
      </div>
    </section> -->

    <!-- <section id="checkoutbutton" class="checkoutbutton">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <button class="btn btn-success" id="checkoutBtn">CHECKOUT</button>
      </div>
    </div>
  </div>
</section> -->



  <section id="productlist" class="productlist">
    <div class="container" style="font-size: 12px;">
      <div class="row">
        <div class="col-2 col-lg-2 col-md-2 col-sm-2">
          <div class="gambarproduct"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['product_img']) . '"/>'; ?></div>
        </div>
        <div class="col-8 col-lg-8 col-md-8 col-sm-8">
          <div class="">
            <h4 class="judul"><?php echo $row['nama'] ?></h4>
            <h6><?php echo $row['price'] ?></h6>
          </div>
        </div>
        <div class="col-2 col-lg-2 col-md-2 col-sm-2">
          <div class="delete"><a href="shoppingcart.php?trash=<?php echo $row['id']; ?>" class="trash"><img src="img/icon/trash.svg" alt=""></a></div>
        </div>
      </div>
    </div>
  </section>  













<?php
// if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['tash'])) {
//   $product_id = $_GET['trash'];
  
//   // Mendapatkan user_id dari variabel session
//   $user_id = $_SESSION['Suser_id'];
  
//   // Hapus produk dari tabel shoppingcart berdasarkan user_id dan product_id
//   $query = "DELETE FROM shoppingcart WHERE user_id = '$user_id' AND product_id = '$product_id'";
//   $result = mysqli_query($conn, $query);
  
//   if ($result) {
//     // Produk berhasil dihapus, lakukan sesuatu (misalnya, tampilkan pesan sukses)
//     echo "Produk berhasil dihapus dari shopping cart.";
//   } else {
//     // Terjadi kesalahan saat menghapus produk, lakukan sesuatu (misalnya, tampilkan pesan error)
//     echo "Terjadi kesalahan saat menghapus produk dari shopping cart: " . mysqli_error($conn);
//   }
// }

// ?>




























    

        <!-- feather icon -->
        <script>
            feather.replace()
      </script>

      <!-- <script src="javascript/script.js"></script> -->

  </body>
</html>

