<?php
session_start();
$conn=mysqli_connect('localhost','root','','form') or die("Connection failed");
if(isset($_POST["user_input"])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $checkuser=mysqli_query($conn,"SELECT * FROM users where username ='$username'");
    if(mysqli_num_rows($checkuser)> 0){
        echo "<script>alert('Username already exists!!!')</script>";
    }else{
        $query= mysqli_query($conn,"INSERT INTO  users (username,email,password) VALUES ('$username','$email','$password')");
        $createTableQuery ="CREATE TABLE IF NOT EXISTS $username (
            id INT(11) NOT NULL AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            PRIMARY KEY (id))";
        mysqli_query($conn, $createTableQuery);
        echo "<script>alert('User created Succesfully!!!')</script>";}

}


if(isset($_POST["user_login"])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $checkuser=mysqli_query($conn,"SELECT password FROM users where username ='$username'");    
    if(mysqli_num_rows($checkuser) > 0){
        $user = mysqli_fetch_assoc($checkuser);
        $dbpassword=$user["password"];
        // Verify   password
        if ($password == $dbpassword) {
            $_SESSION['username'] = $username; // Store username in session
            // echo "<script>alert('Username stored in session: ".$_SESSION['username']."')</script>";
            // echo "<script>alert('Right Password')</script>";?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Congratulations!</strong> You have Succesfully logged in.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="showPopupBtn" onclick="showPopup()">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } else {
            echo "<script>alert('Wrong Password');</script>";

        }
    }
        
    else{
        echo "<script>alert('User does not exist')</script>";
    }
    
}


?>
<?php
if(isset($_POST["add_to_form"])){
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $breed=$_POST['name'];
        $checkuser=mysqli_query($conn,"SELECT * FROM $username");
        if(mysqli_num_rows($checkuser) > 0){
            mysqli_query($conn,"TRUNCATE TABLE $username");
        }
        foreach($breed as $item){
            $query= mysqli_query($conn,"INSERT INTO  $username (name) VALUES ('$item')");
        }
        header("Location: index2.php");
        exit; // Ensure that script execution stops after redirection
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>signin-signup</title>
   
</head>
<body>
    <div class="container">
        <div class="signin-signup">
            <form action="" class="sign-in-form" method="POST">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name=username placeholder="Username" id="username">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name=password placeholder="Password" id="password">
                </div>
                <input type="submit" value="Login" name="user_login" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Don't have an account?</p>
            </form>
            <form action="" method="POST" class="sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <input type="submit" value="Sign up" name="user_input" class="btn" >
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Already have an account?</p>
            </form>
            <!-- <a href="#" id="sign-in-btn2">Sign in</a> -->
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>WELCOME BACK!</h3>
                    <p>to keep connected with us <br>enter your personal details</p>
                    <button class="btn" id="sign-in-btn2">Sign in</button>
                </div>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>HELLO, FRIENDS!</h3>
                    <p>enter your personal details <br> and start your journey with us.</p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>
            </div>
        </div>
    </div>
    <div id="popup-container">
        <form action="" method="POST">
            <div><h4>Enter Dog Breed You prefer:</h4></div>
            <div><h5>min(4)</h5></div>
            <div>
                <label>German Shephered</label>
                <input type="checkbox" name="name[]" placeholder="Enter Breed Name:" value="German Shepherd" autocomplete="off"><br>
                <label>Pug</label>
                <input type="checkbox" name="name[]" placeholder="Enter Your name:" value="Pug" autocomplete="off"><br>
                <label>Pitbull</label>
                <input type="checkbox" name="name[]" placeholder="Enter Your name:" value="Pitbull" autocomplete="off"><br>
                <label>Labrador</label>
                <input type="checkbox" name="name[]" placeholder="Enter Your name:" value="Labrador" autocomplete="off"><br>
                <label>Golden Retriever</label>
                <input type="checkbox" name="name[]" placeholder="Enter Your name:" value="Golden Retriever" autocomplete="off"><br>
                <label>Beagle</label>
                <input type="checkbox" name="name[]" placeholder="Enter Your name:" value="Beagle" autocomplete="off"><br>
                <label>Pomeranian</label>
                <input type="checkbox" name="name[]" placeholder="Enter Your name:" value="Pomeranian" autocomplete="off"><br>
                <label>Rottweiler</label>
                <input type="checkbox" name="name[]" placeholder="Enter Your name:" value="Rottweiler" autocomplete="off"><br>
            </div>
                <button type="submit" class="btn btn-primary" name=add_to_form>Submit</button>
        </form>
        </div>
    <div id="overlay" class="overlay"></div>
    <script src="signup.js"></script>
</body>
</html>