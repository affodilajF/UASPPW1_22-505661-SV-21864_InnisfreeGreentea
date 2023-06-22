# UASPPW1_22-505661-SV-21864_InnisfreeGreentea

Penjelasan Website

Innisfree Green Tea Website: Sebuah platform pemasaran yang menawarkan pengalaman transaksi skincare. Lebih khususnya, kami menyediakan produk skincare Innisfree varian Green Tea. Setelah menyelesaikan proses registrasi dan login, Anda akan dibawa ke halaman utama dengan dua tombol menu utama, "Shop Now" dan "GoPumpChallenge". Kedua tombol ini mencerminkan dua tujuan utama kami, yaitu menyediakan proses transaksi yang mudah dan mengadakan event-event yang diadakan oleh Innisfree. Website ini dilengkapi dengan fitur pencarian produk berdasarkan nama, filter produk berdasarkan parameter tertentu, dan keranjang belanja yang memungkinkan Anda menyimpan barang-barang yang ingin Anda beli.

1.	Design Rapi 
Sebelum memasuki dan sembari melakukan proses development, explorasi desain telah dilakukan. File figma dapat dilihat di https://www.figma.com/file/wTIBpLKu33flw2OTy2kjXt/innsfree-greentea?type=design&node-id=0%3A1&mode=design&t=pCuASAwDQfhWZF6q-1. 

Website dibuat dengan 3 warna utama yatu Hjau, Oren, dan Kuning. Ukuran padding dibuat se-konsisten mungkin yaitu 1.4rem 10% yang berarti memberikan ruang tambahan pada sisi atas dan bawah elemen sebesar 1.4rem, dan ruang tambahan pada sisi kiri dan kanan elemen sebesar 10% dari lebar elemen.

2.	Website Responsive
Sebagai tujuan dari proses belajar, pada tahap awal pengembangan, website dibuat dengan menggunakan styling CSS saja. Dengan memanfaatkan media query CSS dengan breakpoint sebagai berikut : Laptop (max-wdth: 1366px), Tablet (max-wdth: 758px), Mobile (max-wdth: 450px), Laptop (max-wdth: 1366px).
Laptop :![gambar 8](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/4f52a6d8-33b6-4858-8760-16afc4897bba)



Mobile (Samsung Galaxy S8+ width: 360px).
![gambar 5](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/7b8fd697-26bc-4944-bc77-8dc3a98a09db)

Tablet (Ipad Air width: 820px).
![gambar 6](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/fbda0c30-2ff8-4c17-b010-a605252cc253)


Selanjutnya, saya memanfaatkan bootstrap untuk membuat website menjadi lebh responsive. 
![gambar 7](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/a815f26f-8b4a-4d51-beb6-be79c457b1ac)


3.	Direct Feedback
Menampilkan produk apa saja yang berada di cart masing-masing pengguna.
Search by name, filter by parameter.
Berikut adalah cuplikan sourcecode phpnya.
<?php

if(isset($_POST['cari'])){
      // Mendapatkan keyword pencarian dari input pengguna
      $keyword = $_POST['keyword'];
  
      $query = "SELECT * FROM products WHERE nama LIKE '%$keyword%'";
      $result = mysqli_query($conn, $query);
  }
  else if(isset($_POST['MURAH'])){
      // Membuat query untuk mengurutkan produk berdasarkan harga terendah
      $query = "SELECT * FROM products ORDER BY price ASC";
      $result = mysqli_query($conn, $query);
  }
  else if(isset($_POST['MAHAL'])){
      //  Membuat query untuk mengurutkan produk berdasarkan harga tertinggi
      $query = "SELECT * FROM products ORDER BY price DESC";
      $result = mysqli_query($conn, $query);
  }
  else if(isset($_POST['TOPSTAR'])){
      // query untuk mengurutkan produk berdasarkan rating tertinggi
      $query = "SELECT * FROM products ORDER BY rating DESC";
      $result = mysqli_query($conn, $query);
  }
  else{
      //Jika tombol 'cari' atau tombol pengurutan tidak ditekan, tampilkan semua data produk
      $query = $query = "SELECT * FROM products WHERE stock > 0";
      $result = mysqli_query($conn, $query);
  }
?>

Selain itu juga menggunakan alert apabila suatu tindakan telah dilakukan oleh pengguna. 
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

5.	Konten Dinamis 
Menampilkan data-data produk dari database.
Semua prodk dari database ditampilkan dengan melakukan looping.
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
                        <a class="eye" href="productDetail.php?eyes=<?php echo $row['id'];?>">
                              <img src="img/icon/eye.svg">
                        </a>
                        
                        <a class="eye" href="productPage.php?shopppingcartidproduct=<?php echo $row['id'];?>">
                              <img src="img/icon/shopping-cart.svg">
                        </a>
                  </div>
            </div>

      </div>
      <?php endwhile; ?>
    </section>


