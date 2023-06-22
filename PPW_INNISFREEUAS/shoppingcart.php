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

<?php


// Query untuk mendapatkan daftar produk dan qty dari tabel products dan shoppingcart
$query = "SELECT p.*, s.qty FROM products p LEFT JOIN shoppingcart s ON p.id = s.product_id WHERE s.user_id = '$user_id'";
$result = mysqli_query($conn, $query);

// Inisialisasi variabel total harga
$totalPrice = 0;

while ($row = mysqli_fetch_assoc($result)) {
  // Menghitung total harga per produk dengan mempertimbangkan qty
  $productPrice = $row['price'] * $row['qty'];
  $totalPrice += $productPrice;
}
?>


<?php
// Ambil user_id dari session

// Query untuk mendapatkan data pengiriman dari tabel user
$query = "SELECT * FROM user WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
  // Ambil data pengiriman
  $row = mysqli_fetch_assoc($result);
  $fullname = $row['fullname'];
  $username = $row['username'];
//   $address = $row['address'];
  $phone = $row['phonenumber'];
  $email = $row['email'];
}
?>


<?php
// Memeriksa apakah tombol "confirmationBtn" diklik
if (isset($_POST['confirmationBtn'])) {
    // Mendapatkan data produk dan qty dari tabel shoppingcart berdasarkan user_id
    $sql = "SELECT product_id, qty FROM shoppingcart WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Memproses setiap row data dari tabel shoppingcart
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $qty = $row['qty'];
            $date = date("Y-m-d"); // Mendapatkan tanggal saat ini

            // Menyimpan data ke dalam tabel 'orders'
            $insert_sql = "INSERT INTO orders (user_id, product_id, qty, date)
                           VALUES ('$user_id', '$product_id', '$qty', '$date')";

            if (mysqli_query($conn, $insert_sql)) {
                echo "Data inserted successfully";
                echo '<script>alert("Kamu Udah Checkout Barusan!");</script>';
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }

            // Mengurangi stock di tabel products
            $update_sql = "UPDATE products SET stock = stock - $qty WHERE id = '$product_id'";
            mysqli_query($conn, $update_sql);
        }
    } else {
        echo "No data found in shopping cart.";
    }

    // Menghapus data dari tabel shoppingcart berdasarkan user_id setelah proses insert selesai
    $delete_sql = "DELETE FROM shoppingcart WHERE user_id = '$user_id'";
    mysqli_query($conn, $delete_sql);

    // Menutup koneksi database
    mysqli_close($conn);

    // Redirect ke halaman sebelumnya dengan refresh
    echo '<script>window.history.go(-1);</script>';
    exit;
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
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/navbarstyle.css">
    <link rel="stylesheet" href="css/shoppingcart.css">
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

    <section class="section-name">
        <b> innisfree greentea &nbsp; &nbsp; &nbsp; innisfree greentea&nbsp; &nbsp; &nbsp; innisfree greentea &nbsp; &nbsp; &nbsp; innisfree greentea </b>
    </section> 

    <section id="checkoutbutton" class="checkoutbutton">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <button class="btn btn-success" id="checkoutBtn">CHECKOUT</button>
        </div>
      </div>
    </div>
  </section>


  <section class="checkout">

<div class="warp-container">

  <div class="container" style="font-size: 12px;">
    <div class="row">
      <div class="col-6">
        <h4>Data Pengiriman</h4>
        <!-- <h5>Nama Lengkap: <span id="nama"></span> >hai</h5>
        <h5>Username: <span id="username"></span></h5>
        <h5>Alamat: <span id="alamat"></span></h5> -->
        <!-- Tambahkan data lainnya sesuai kebutuhan -->
        <h6>Full Name: <p><?php echo $fullname; ?></p></h6>
        <h6>Username: <p><?php echo $username; ?></p></h6>
        <h6>Phone Number: <p><?php echo $phone; ?></p></h6>
        <h6>Email: <p><?php echo $email; ?></p></h6>
        <h6>Shipping Address: <p>hai</p></h6>
        
      </div>
      <div class="col-6">
        <div class="text-right">
          <h4>Total Price</h4>
          <div id="totalHarga"> IDR <?php echo $totalPrice;?>.00</div>
          <!-- <button class="btn btn-primary" id="confirmationBtn" name="confirmationBtn">Konfirmasi</button> -->
          <form method="post">
                <button type="submit" class="btn btn-primary" id="confirmationBtn" name="confirmationBtn">Konfirmasi</button>
          </form>

          <button class="btn btn-primary" id="backBtn">Back</button>
        </div>
      </div>

    </div>
  </div>
</div>
</section>



<?php
// Menghapus baris jika parameter "trash" ada dalam URL
if (isset($_GET['trash'])) {
  $delete_id = $_GET['trash'];

  // Query untuk menghapus baris dari tabel shoppingcart berdasarkan user_id dan product_id
  $delete_query = "DELETE FROM shoppingcart WHERE user_id = '$user_id' AND product_id = '$delete_id'";
  $delete_result = mysqli_query($conn, $delete_query);

  if ($delete_result) {
    // Redirect kembali ke halaman shoppingcart.php setelah menghapus baris
//     header("Location: shoppingcart.php");
echo '<script>window.location.href = "shoppingcart.php";</script>';

    exit;
  } else {
    echo "Failed to delete row from shoppingcart.";
  }
}

// Query untuk mendapatkan daftar produk dari tabel products dan shoppingcart
$query = "SELECT p.*, s.qty FROM products p LEFT JOIN shoppingcart s ON p.id = s.product_id WHERE s.user_id = '$user_id'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $qty = $row['qty'];
?>

  <section id="productlist" class="productlist">
    <div class="container">
      <div class="row">
        <div class="col-2 col-lg-2 col-md-2 col-sm-2">
          <div class="gambarproduct"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['product_img']) . '"/>'; ?></div>
        </div>
        <div class="col-8 col-lg-8 col-md-8 col-sm-8">
          <div class="">
            <h4 class="judul"  style="font-size: 1.2rem;"><?php echo $row['nama'] ?></h4>
            <h6><?php echo $row['price'] ?></h6>
            <h7>Qty : <?php echo $qty ?></h7>
          </div>
        </div>
        <div class="col-2 col-lg-2 col-md-2 col-sm-2">
          <div class="delete"><a href="shoppingcart.php?trash=<?php echo $row['id']; ?>" class="trash"><img src="img/icon/trash.svg" alt=""></a></div>
        </div>
      </div>
    </div>
  </section>  
<?php
}
?>



    




<script>
  // Ambil referensi elemen tombol checkout
  const checkoutBtn = document.getElementById('checkoutBtn');
  // Ambil referensi elemen section konfirmasi
  const sectionCheckout = document.querySelector('.checkout');

  // Tambahkan event listener untuk mengatur tampilan saat tombol checkout diklik
  checkoutBtn.addEventListener('click', function() {
    // Ubah display section konfirmasi menjadi block
    sectionCheckout.style.display = 'block';
  });

  backBtn.addEventListener('click', function() {
    // Ubah display section checkout menjadi none
    sectionCheckout.style.display = 'none';
  });

</script>

        <!-- feather icon -->
        <script>
            feather.replace()
      </script>

      <script src="javascript/script.js"></script>

  </body>
</html>
