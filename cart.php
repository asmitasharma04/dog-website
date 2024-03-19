<?php
$conn=mysqli_connect('localhost','root','','shopping_cart') or die("Connection failed");
//update query
if(isset($_POST['update_product_quantity'])){
    $update_value=$_POST['update_quantity'];
    $update_id=$_POST['update_quantity_id'];
    //query
    $update_quantity_query=mysqli_query($conn,"update cart set quantity=$update_value where id=$update_id");
    if($update_quantity_query){
        header('location:cart.php');
    }
}
if(isset($_GET['remove'])){
    $remove_id=$_GET['remove'];
    mysqli_query($conn,"Delete from cart where id='$remove_id'");
    header('location:cart.php');    

}
?>
<?php
session_start();
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Carter+One&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>
<body id="top">
<div class="first">
  <nav >
      <h2 class ="logo_main">PupHub</h2>
      <ul id="sidemenu">
        <li><a href="index2.php">Home</a></li>
        <li><a href="shop3.php">Shop</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="blogs.html">Blogs</a></li>
        <li><a href="guide.html">Guide</a></li>
        <li><a href="contact.php"><i class="fa-solid fa-phone"></i></a></li>
        <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
    </ul>
  </nav>
</div>
    <section id="page-header">
        <h2>#Your Cart</h2>
    </section>
    
    <section id="cart" class="section-p1">
        <table width="100%">
        <?php
            include("connect.php");
            $select_cart_products=mysqli_query($conn,"Select * from cart");
            $num=1;
            $grand_total= 0;
            if(mysqli_num_rows($select_cart_products)> 0){
                echo"
                <thead>
                    <th>Sr.no</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </thead>
                <tbody>";
                while($fetch_cart_products=mysqli_fetch_assoc($select_cart_products)){
                    ?>
                <tr>
                    <td><?php echo $num?></td>
                    <td><?php echo $fetch_cart_products['name']?></td>
                    <td><img src="images/<?php echo $fetch_cart_products['image']?>" alt=""></td>
                    <td>$<?php echo $fetch_cart_products['price']?>/-</td>
                    <td>
                      <form action="" method="post">
                          <input type="hidden" value="<?php echo $fetch_cart_products['id']?>" name="update_quantity_id">
                          <div class="quantity_box">
                            <input type="number" value="1" min="1"
                            value="<?php echo $update_value ?>"
                            name="update_quantity">
                            <input type="submit" class="update_quantity" value="Update" name="update_product_quantity">
                      </div>
                      </form>
                    </td>
                    <td>$<?php echo $subtotal=number_format($fetch_cart_products['price']*$fetch_cart_products['quantity'])?>/-</td>
                    <td><a href="cart.php?remove=<?php echo $fetch_cart_products['id']?>" onclick="return confirm('Are you sure you want to delete this item')"><i class="far fa-times-circle"></i></a></td>
                </tr>
                <?php
                $grand_total=$grand_total+($fetch_cart_products['price']*$fetch_cart_products['quantity']);
                $num++;
                }
                }else{
                    echo "<div class='empty_text'>Cart is empty</div>";
                }
                ?>       
                </tbody>
        </table>
    </section>
    <section id="cart-add">
        <div id="subtotal">
            <h3>Cart Total</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td><?php echo $grand_total?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong><?php echo $grand_total?></strong></td>
                </tr>
            </table>
            <div class="table_bottom">
                <a href="shop3.php" class="bottom_btn">Continue Shopping</a>
                <h3 class="bottom_btn">Grand Total:<span><?php echo $grand_total?>/-</span></h3>
                <a href="chekout.php"class="bottom_btn1">Proceed to checkout</a>
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