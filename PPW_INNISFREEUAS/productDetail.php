



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

    
    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/productPageBackup.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> -->
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    

  </head>
  <style>
      /* #myElement {
    opacity: 0;
    animation: fadeIn 1s ease-in-out forwards;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
} */




  </style>
  <body>
    <!-- bootstrap javascript -->
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
    <?php require 'dbConfig.php'; ?>


      <?php
            if(isset($_GET['eyes'])){
            $id = $_GET['eyes'];
  // Gunakan nilai ID sesuai kebutuhan Anda
      }
      ?>

    <?php 
            $query = "SELECT * FROM products WHERE id = $id"; // Ganti dengan query yang sesuai
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            // unset($id);
      ?>






    <!-- Model Box Detail Item  -->
    <section class="modal-sec" id="item-detail-modal">
      <!-- <div class="modalproduct" id="item-detail-modal"> -->
            <div class="back">
                  <a  href="productPage.php" class="back-button">
                        <span>Back</span>
                        <img src="img/icon/back.png" alt="">
                  </a>
             </div>
            <div class="modalContainer">
                  <!-- <a href="#"><i data-feather ='X'></i></a> -->
                  <div class="modal-content">
                        <div class="product-img"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['product_img'] ).'"/>'; ?></div>
                        <div class="product-content">
                              <h3> <?php echo $row['nama'] ?></h3>
                              <div class="price"><a>IDR <?php echo $row['price'] ?> </a></div>
                              <p><?php echo $row['description']?></p>      
                              <!-- <div class="cart"> </div> -->
                              

                              <!-- <a class="shopppingcartidproduct" href="productDetail.php?shopppingcartidproduct=<?php echo $row['id'];?>">
                        </a> -->
                              <div class="info-mini">
                                    <div class="ratings">
                                          <img src="img/star.png" alt="">
                                          <div><?php echo $row['rating']?></div>
                                    </div>
                                    <div class="size"> Size : <?php echo $row['size']?>ml</div>
                                    <div class="stock">Stock : <?php echo $row['stock']?> </div>
                              </div>

                        </div>
                  </div>
            </div>
            <div class="hiasanhehe"></div>
      <!-- </div> -->
    </section>




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


    

        <!-- feather icon -->
        <script>
            feather.replace()
      </script>

      <script src="javascript/script.js"></script>

  </body>
</html>
