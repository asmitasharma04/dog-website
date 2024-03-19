<!DOCTYPE html>
<html lang="en">
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['send'])){
  $name=$_POST['name'];
  $subject=$_POST['subject']; 
  $message=$_POST['message'];
  $email=$_POST['email'];
  //Import PHPMailer classes into the global namespace
  //These must be at the top of your script, not inside a function

  //Load Composer's autoloader
  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'aman134gurutek@gmail.com';                     //SMTP username
      $mail->Password   = 'vrtz vzzz dcle otym';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom("$email",'Contact form');
      $mail->addAddress('aman134gurutek@gmail.com', 'Humari website');     //Add a recipient

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = "Subject-$subject";
      $mail->Body    = "Sender Name- $name <br> Sender email- $email <br> Message- $message";

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>
<!-- //code to send at email
// if (isset($_POST["submit"])) {
//   $mailto="aman0275.be23@chitkara.edu.in";
//   $name=$_POST['name'];
//   $from=$_POST['email'];//users email
//   $subject =$_POST['subject'];
//   $subject2="Your Message Submitted Successfully";
//   $message="Client Name:".$name."wrote the following Message"."\n\n".$_POST['message'];
//   $message2="Dear".$name."\n\n"."Thankyou for contacting us! we will get back to you shortly";
//   $headers="From: ".$from;//user entered email
//   $headers2= "From: ";$mailto;//this will recieve to client
//   $result=mail($mailto,$subject,$message,$headers);//send to website owner
//   $result2=mail($from,$subject2,$message2,$headers2);//send email to user as well
//   if ($result){
 //     echo '<script type="text/javascript">alert("Message was sent Succesfully, We will reach to you shortly!")</script>';
//   } 
//   else {
//     echo '<script type="text/javascript">alert("Submission failed! Try again Later")</script>'; -->
<!-- //   }
// } --> 

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
<div class="first">
  <nav >
      <h2 class ="logo_main">PupHub</h2>
      <ul id="sidemenu">
        <li><a href="index2.php">Home</a></li>
        <li><a href="shop3.php">Availabe dogs</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="blogs.html">Blogs</a></li>
        <li><a href="guide.html">Guide</a></li>
        <li><a href="contact.php"><i class="fa-solid fa-phone"></i></a></li>
        <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
    </ul>
  </nav>
</div>
<body id="top">
    <section id="page-header">
        <h2>#Contact Us</h2>
        <p style="font-size: larger;">LEAVE A MESSAGE, We love to hear from you!</p>
    </section>
    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today.</h2>
            <h3>HEAD OFFICE</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>Chitkara University,Chandigarh-Patiala National Highway,Rajpura,Punjab</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>contact@example.com</p>
                </li>
                <li>
                    <i class="fal fa-phone-alt"></i>
                    <p>+918503007***</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturday: 9:00 am to 16:00 pm</p>
                </li>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3437.1751343148626!2d76.6597778!3d30.516086499999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fc32344a6e2d7%3A0x81b346dee91799ca!2sChitkara%20University!5e0!3m2!1sen!2sin!4v1709042176185!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <section id="form-details">
        <form action="contact.php" method="POST">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" name="name" placeholder="Your Name">
            <input type="text" name="email" placeholder="E-mail">
            <input type="text" name="subject" placeholder="Subject">
            <textarea id="" cols="30" rows="10" name="message" placeholder="Your Message"></textarea>
            <button name="send">Submit</button>
        </form>
        <div class="people">
            <img src="/images/1.png" alt="">
            <p><span>Aman Vahsishtha</span>Senior Marketing Manager<br> Phone + 000 123 00 77 ***<br>Email:contact@example.com</p>
            <img src="/images/2.png" alt="">
            <p><span>Chirag Sukhija</span>Junior Marketing Manager<br> Phone + 000 125 00 77 ***<br>Email:contact@example.com</p>
            <img src="/images/3.png" alt="">
            <p><span>Asmita Sharma</span>Human Right Department<br> Phone + 000 128 00 77 ***<br>Email:contact@example.com</p>
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