<?php
$conn=mysqli_connect('localhost','root','','shopping_cart') or die("Connection failed");

if (isset($_POST["add_to_cart"])) {
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_image = $_POST["product_image"];
    $product_quantity = 1;

    //select cart data based on condition
    $select_cart=mysqli_query($conn,"Select * from cart where name='$product_name'");
    if(mysqli_num_rows($select_cart)> 0) {
        $display_message="Product already added to cart";
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO cart (name,price,image,quantity) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')");
        if($insert_product) {
          // Redirect to cart.php after successful insertion
          header("Location: cart.php");
          exit(); // Ensure that no further code is executed after redirection
        }
        else {
          // Check for MySQL errors
          $display_message = "Error: " . mysqli_error($conn);
      }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>PupHub</title>
  <meta name="title" content="PupHub">
  <meta name="description" content="Pet Adoption Site">

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Carter+One&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>
<body id="top">
<div class="first">
  <nav>
      <h2 class ="logo_main">PupHub</h2>
      <ul id="sidemenu">
        <li><a href="index2.php">Home</a></li>
        <li><a href="shop3.php">Shop</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="blogs.html">Blogs</a></li>
        <li><a href="guide.html">Guide</a></li>
        <li><a href="contact.php"><i class="fa-solid fa-phone" ></i></a></li>
        <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
    </ul>
  </nav>
</div>
<?php
if(isset($display_message)){
    echo "<div class='display_message'>
    <span>$display_message</span>
    <i class='fas fa-times' onClick='this.parentElement.style.display=none';></i>
    </div>";
}
?>
    <section id="page-header">
        <h2>#stayhome</h2>
        <p>Save more with coupons & upto 70% off</p>
    </section>
      <main>
        <section id="product1" class="section-p1">
          <div class="pro-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM products");
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="pro" onclick="window.location.href='sproduct.html';">
              <div class="des">
                <form method="POST">
                  <div class="edit_form">
                    <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                    <h3><?php echo $fetch_product['name']; ?></h3>
                    <div class="price"><b>$</b><?php echo $fetch_product['price']; ?></div>
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    <input type="submit" class="submit_btn cart_btn" value="Add To Cart" name="add_to_cart" >    
                  </div>
                </form>
                <!-- <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div> -->
              </div>
              <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            
            <?php
                }
            } else {
                echo "No products";
            }
            ?>
          </div>
        </section>
                 
        <section id="pagination" class="section-p1">
          <a href="shop3.php">1</a>
          <a href="shop (1).html">2</a>
          <a href="shop (1).html"><i class="fal fa-long-arrow-alt-right"></i></a>
        </section>
        
        <footer class="footer" style="background-image: url()">

<div class="footer-top section">
  <div class="container">

    <div class="footer-brand">

      <a href="#" class="logo">PupHub</a>

      <p class="footer-text">
        If you have any question, please contact us at <a href="mailto:support@gmail.com"
          class="link">support@gmail.com</a>
      </p>

      <ul class="contact-list">

        <li class="contact-item">
          <ion-icon name="location-outline" aria-hidden="true"></ion-icon>

          <address class="address">
            Chitkara University, Chandigarh, Punjab
          </address>
        </li>

        <li class="contact-item">
          <ion-icon name="call-outline" aria-hidden="true"></ion-icon>

          <a href="tel:+16234567891011" class="contact-link">(+1)-6234-56-789-1011</a>
        </li>

      </ul>

      <ul class="social-list">

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-pinterest"></ion-icon>
          </a>
        </li>

        <li>
          <a href="#" class="social-link">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
        </li>

      </ul>

    </div>

    <ul class="footer-list">

      <li>
        <p class="footer-list-title">Corporate</p>
      </li>

      <li>
        <a href="#" class="footer-link">Careers</a>
      </li>

      <li>
        <a href="#" class="footer-link">About Us</a>
      </li>

      <li>
        <a href="#" class="footer-link">Contact Us</a>
      </li>

      <li>
        <a href="#" class="footer-link">FAQs</a>
      </li>

      <li>
        <a href="#" class="footer-link">Success Stories</a>
      </li>

      <li>
        <a href="#" class="footer-link">News</a>
      </li>

    </ul>

    <ul class="footer-list">

      <li>
        <p class="footer-list-title">Information</p>
      </li>

      <li>
        <a href="#" class="footer-link">Adoption Process</a>
      </li>

      <li>
        <a href="#" class="footer-link">Privacy Policy</a>
      </li>

      <li>
        <a href="#" class="footer-link">Pet Care Tips</a>
      </li>

      <li>
        <a href="#" class="footer-link">Testimonials</a>
      </li>

      <li>
        <a href="#" class="footer-link">Terms of Service</a>
      </li>

      <li>
        <a href="#" class="footer-link">Sitemap</a>
      </li>

    </ul>

    <ul class="footer-list">

      <li>
        <p class="footer-list-title">Services</p>
      </li>

      <li>
        <a href="#" class="footer-link">Foster Care</a>
      </li>

      <li>
        <a href="#" class="footer-link">Dog Adoption</a>
      </li>

      <li>
        <a href="#" class="footer-link">Education</a>
      </li>

      <li>
        <a href="#" class="footer-link">Donations</a>
      </li>

      <li>
        <a href="#" class="footer-link">Community Outreach</a>
      </li>

      <li>
        <a href="#" class="footer-link">Resource Center</a>
      </li>

    </ul>

  </div>
</div>
</footer>

<a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
<ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
</a>

<!-- <script src="script.js" defer></script> -->

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>