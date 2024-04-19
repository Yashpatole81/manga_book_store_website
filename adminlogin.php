<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <script src="https://kit.fontawesome.com/bb54249059.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <title>Admin login page</title>
</head>

<body>
    <div class="container">
        <form class="form-box" action="alogin.php" id="loginform" method="post">
            <h1>Admin Login</h1>
            <div class="input-box">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <i class='fas fa-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="password" name="adminpassword" required>
                <i class='fa-solid fa-lock'></i>
            </div>
            <div class="remember-forgot">
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn-field" onclick="return validateloginForm()" style="
    position: relative;
    display: flex;
    align-items: center;
    margin-left: 110px;
    margin-top: 16px;">Login</button>
        </form>
    </div>
    <script src="js/valid.js"></script>
</body>
</html>
