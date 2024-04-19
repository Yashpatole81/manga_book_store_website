<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect to login.php if true
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book store</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <!--css file link-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
</head>
<body>
    <div id="preloader"></div>
    
    <!-- header section starts -->
    <header class="header">
        <div class="header-1">
            <a href="#" class="logo"> <i class="fas fa-book"></i>Otaku heaven</a>

            <!--<form action="" class="search-form">
                <input type="search" name="" placeholder="search here" class="search-bar">
                <label for="search-box" class="fas fa-search"></label>
            </form>-->

            <div class="icons">
                <!--<div id="search-btn" class="fas fa-search"></div>-->
                <a href="#" class="fa-solid fa-bookmark"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-shopping-cart" class="icon-cart"></a>
                <!--<a href="signup.php" class="fas fa-user"></a>-->
                <span style="float: right;margin-left: 30px;margin-top: 0;font-size: 16px;">Welcome,  <?php echo $_SESSION["username"]; ?>!</span>
        <!-- Logout button -->
        <a href="logout.php" style="float: right;margin-right: -228px;font-size: 15px;">Logout</a>
            </div>
        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="#home">Home</a>
                <a href="Manga.html">Books</a>
                <a href="Merchandise.html">Merchandises</a>
                <a href="Action Figures.html">Action Figure</a>
                <a href="add_content.html ">Add content</a>
            </nav>
        </div>
    </header>
    <!-- heder section end-->

    <!-- bottom navbar-->

    <nav class="bottom-navbar">
        <a href="#home" class="fas fa-home"></a>
        <a href="#books" class="fas fa-list"></a>
        <a href="#merchandises" class="fas fa-tags"></a>
        <a href="#reviews" class="fas fa-comments"></a>
        <a href="#blogs" class="fas fa-blog"></a>
    </nav>

<!-- home section starts -->
<div class="home" id="home">
    <div class="head-text">
        <h3 class="front-text">otaku <span>heaven</span></h3>
        <h3 class="outline-text">otaku <span>heaven</span></h3>
    </div>
    <div class="row">
        <div class="content">
            <h3>upto <span class="span-class">75%</span> off</h3>
            <p>On merchandises, books, action figures and many more with exciting offers.</p>
            <a href="Manga.html" class="btn">Shop Now</a>
        </div>

        <div class="books-slider">
            <div class="wraper">
                <a href="prod_info/naruto.html"><img src="images/naruto shippuden.jpg" alt=""></a>
                <a href="prod_info/bleach.html"><img src="images/bleach.jpg" alt=""></a>
                <a href="prod_info/op.html"><img src="images/one piece.jpg" alt=""></a>
                <a href="prod_info/dbz.html"><img src="images/dragon ball z.jpg" alt=""></a>
                <a href="prod_info/tkr.html"><img src="images/tokyo revengers.jpg" alt=""></a>
                <a href="#"><img src="images/agate.jpg" alt=""></a>
            </div>
            <img src="images/stand.png" class="stand" alt="">
        </div>
    </div>
</div>
<!-- home section ends-->
<div class="slider-container">
    <div class="slider-content">
      <!-- Add your sliding items here -->
      <div class="slider-item"> <a href="prod_info/naruto.html">Naruto</a></div>
      <div class="slider-item"><a href="/prod_info/bc.html">Black Clover</a></div>
      <div class="slider-item"><a href="/prod_info/dbz.html">Dragon Ball Z</a></div>
      <div class="slider-item"><a href="/prod_info/op.html">One Piece</a></div>
      <div class="slider-item"><a href="/prod_info/bleach.html">Bleach</a></div>
      <div class="slider-item"><a href="/prod_info/mha.html">My Hero Academia</a></div>
      <div class="slider-item"><a href="/prod_info/dn.html">Death Note</a></div>
      <div class="slider-item"><a href="/prod_info/aot.html">Attack On Titan</a></div>
      <div class="slider-item"><a href="/prod_info/ds.html">Demon Slayer</a></div>
      <!-- Add more items as needed -->
    </div>
  </div>
<!-- merchandise -->
<div class="merchandise">
    <div class="row">
        <div class="content-2">
            <h3>Exclusive <span>merchandise</span></h3>
            <p>Exclusive merchandise designed by best designers <br>from across the world with premium offers.</p>
        </div>
        <div class="clothes">
            <a href="/Manga/Merchandise.html"><img src="images/naruto-tshit-removebg-preview.png" alt=""></a>
            <a href="/Manga/Merchandise.html"><img src="images/gear5-removebg-preview.png" alt=""></a>
            <a href="Manga/Merchandise.html" class="btn-2">Shop Now</a>
        </div>
    </div>
</div>
<div class="action-figure">
    <div class="row">
        <div class="content">
            <h3>Premium Action Figures</h3>
            <p>Premium action figures with high quality material</p>
            <a href="Action Figures .html" class="btn-3">Shop Now</a>
        </div>
        <div class="figure">
            <a href="/Manga/Action Figures .html"><img src="images/action.png" alt=""></a>
        </div>
    </div>
</div>
<div>
    <div class="contact">
        <div class="container">
            <div class="row-2">
                <div class="contact-left">
                    <h1 class="sub-title"style="
                    font-size: 4rem;
                    color: green;
                    margin-bottom: 50px;
                    ">Contact Us</h1>
                    <p><i class="fa-solid fa-paper-plane"></i>otakuheaven@gmail.com</p>
                    <p><i class="fa-solid fa-phone"></i>+91 1234567890</p>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/"><i class="fa-brands fa-square-instagram"></i></a>
                        <a href="https://twitter.com/home"><i class="fa-brands fa-square-twitter"></i></a>
                        <a href="https://accounts.snapchat.com/accounts/v2/login"><i class="fa-brands fa-square-snapchat"></i></a>
                        <a href="https://www.linkedin.com/feed/"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="contact-right">
                    <form name="submit-to-google-sheet">
                        <input type="text" name="Name" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="Your email" required>
                        <textarea name="Message"rows="6" placeholder="Your Message"></textarea>
                        <button type="submit" class="btn4">Submit</button>
                    </form>
                    <span id="msg"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function(){
        loader.style.display = "none";
    })
</script>
<!-- Custom js file -->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</body>
</html>
