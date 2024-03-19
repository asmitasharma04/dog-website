<?php
session_start();
$conn=mysqli_connect('localhost','root','','form') or die("Connection failed");
?>
<?php
if (!isset($_SESSION['username'])) {
    // If the user is not logged in, redirect them to the login page or handle it appropriately
    header("Location: sign2.php");
    exit();
}
$username = $_SESSION['username'];
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

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Carter+One&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>

<body id="top">

<!-- Exit intent popup button -->

<!-- <div id="exit-popup" class="popup">
  <div class="popup-content">
      <span class="close-popup" id="close-popup">×</span>
      <h2>Wait! Don't Leave Yet!</h2>
      <p>By choosing adoption, you're not just gaining a pet; you're saving a life and opening your heart to unconditional love.
        Get 10% Discount
      </p>
      <button id="discount-button">Get My Coupon</button>
  </div>
</div> --> 



  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <button class="nav-toggle-btn" aria-label="toggle manu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true" class="menu-icon"></ion-icon>
        <ion-icon name="close-outline" aria-label="true" class="close-icon"></ion-icon>
      </button>

      <a href="#" class="logo">PupHub</a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#home" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li class="navbar-item">
            <a href="shop3.php" class="navbar-link" data-nav-link>Shop</a>
          </li>

          <li class="navbar-item">
            <a href="services.html" class="navbar-link" data-nav-link>Services</a>
          </li>

          <li class="navbar-item">
            <a href="blogs.html" class="navbar-link" data-nav-link>Blogs</a>
          </li>
          <li class="navbar-item">
            <a href="guide.html" class="navbar-link" data-nav-link>Guide</a>
          </li>

        </ul>

        <a href="#" class="navbar-action-btn">Log In</a>
      </nav>

      <div class="header-actions">

        <button class="action-btn" aria-label="Search">
          <a href="contact.php"><i class="fa-solid fa-phone" style="color: #ffffff;"></i></a>
        </button>

        <button class="action-btn" aria-label="cart">
          <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </button>

      </div>

    </div>
  </header>

  <main>
    <article>

      <section class="section hero has-bg-image" id="home" aria-label="home"
        style="background-image: url(https://images.unsplash.com/photo-1477884213360-7e9d7dcc1e48?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)">
        <div class="container">
        <div class="hero-text">
          <p id="h1">Open your heart and</p>
          <p id="h2">home to a furry friend!</p>
        </div>
          <a href="#" class="btn">Buy Now</a>

        </div>
      </section>
      <section id="feature" class="section-p1">
        <div class="fe-box">
          <img src="images/f1.png" alt="orange tree">
          <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
          <img src="images/f2.png" alt="orange tree">
          <h6>Online Order</h6>
        </div>
        <div class="fe-box">
          <img src="images/f3.png" alt="orange tree">
          <h6>Save Money</h6>
        </div>
        <div class="fe-box">
          <img src="images/f4.png" alt="orange tree">
          <h6>Promotions</h6>
        </div>
        <div class="fe-box">
          <img src="images/f5.png" alt="orange tree">
          <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
          <img src="images/f6.png" alt="orange tree">
          <h6>24/7 Support</h6>
        </div>
      </section>
      <h2 id="center_text">
        <span>Feature</span> Products
      </h2>
      <p id="center_text">Hi <span><?php echo $username;?></span>here are some of Recommendations shown on the basis of your input</p>
      <section id="product1" class="section-p1">
          <div class="pro-container">
            <?php
            $select_products=mysqli_query($conn,"SELECT product_details.* FROM product_details JOIN $username ON product_details.name = $username.name");
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="pro" onclick="window.location.href='sproduct.html';">
              <div class="des">
                <form method="post" action="cart.php">
                  <div class="edit_form">
                    <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                    <h3><?php echo $fetch_product['name']; ?></h3>
                    <div class="price"><b>$</b><?php echo $fetch_product['price']; ?></div>
                     <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                    <?php
                    include("connect.php");
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
        $insert_product = mysqli_query($conn, "INSERT INTO cart (name, price, image, quantity) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')");
        $display_message="Product added to cart";
    }
}
?>
                    <input type="submit" class="submit_btn cart_btn" value="Add To Cart" name="add_to_cart">    
                  </div>
                </form>
               
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
      
      <section class="section category" aria-label="category">
        <div class="container">

          <h2 class="h2 section-title">
            <span class="span">Adoption</span> Process
          </h2>

          <ul class="has-scrollbar">

            <li class="scrollbar-item">
              <div class="category-card">

                <figure class="card-banner img-holder" style="--width: 330; --height: 300;">
                  <img src="https://certbodies.co.uk/wp-content/uploads/2021/04/Certifictation-marks-2-300x300.jpeg" width="330" height="300" loading="lazy" alt="Cat Food"
                    class="img-cover">
                </figure>

                <h3 class="h3">
                  <a href="#" class="card-title">Application Submission</a>
                </h3>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="category-card">

                <figure class="card-banner img-holder" style="--width: 330; --height: 300;">
                  <img src="https://thumbs.dreamstime.com/b/find-hiring-employee-single-isolated-icon-outline-style-vector-illustration-213402384.jpg" width="330" height="300" loading="lazy" alt="Cat Toys"
                    class="img-cover">
                </figure>

                <h3 class="h3">
                  <a href="#" class="card-title">Review and Screening</a>
                </h3>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="category-card">

                <figure class="card-banner img-holder" style="--width: 330; --height: 300;">
                  <img src="https://static.vecteezy.com/system/resources/previews/021/595/825/large_2x/shaking-hands-icon-outline-icon-free-vector.jpg" width="330" height="300" loading="lazy" alt="Dog Food"
                    class="img-cover">
                </figure>

                <h3 class="h3">
                  <a href="#" class="card-title">Meet-and-Greet</a>
                </h3>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="category-card">

                <figure class="card-banner img-holder" style="--width: 330; --height: 300;">
                  <img src="https://thumbs.dreamstime.com/b/premium-home-icon-logo-line-style-premium-home-icon-logo-line-style-high-quality-sign-symbol-white-background-97724476.jpg" width="330" height="300" loading="lazy" alt="Dog Toys"
                    class="img-cover">
                </figure>

                <h3 class="h3">
                  <a href="#" class="card-title">Home Visit</a>
                </h3>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="category-card">

                <figure class="card-banner img-holder" style="--width: 230; --height: 180;">
                <img src="https://scontent.fdel72-1.fna.fbcdn.net/v/t39.30808-1/302053129_381517300819069_411695580701868398_n.png?stp=dst-png_p200x200&_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_ohc=THHrnQp1BZUAX_JtMGk&_nc_ht=scontent.fdel72-1.fna&oh=00_AfCy2T6cxNjvgMpKeEmrwe8VbjFsoRU4mn1p_Om0LzSm3A&oe=65F77022" width="200px"  loading="lazy" alt="Dog Toys" class="img-cover">
                </figure>

                <h3 class="h3">
                  <a href="#" class="card-title">Adoption Finalization</a>
                </h3>

              </div>
            </li>

          </ul>

        </div>
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