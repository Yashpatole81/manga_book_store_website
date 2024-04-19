<?php
$host = "localhost";  // Replace with your actual database host
$dbname = "book_store";  // Replace with your actual database name
$user = "postgres";  // Replace with your actual database username
$password = "Bubbdya@2003";  // Replace with your actual database password

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $emailid = $_POST["emailid"];
    $contact_no = $_POST["contact_no"];
    $address = $_POST["address"];
    $user_password =$_POST["user_password"];
    $confirm_password = $_POST["confirm_password"];

    try {
        $insertQuery = "INSERT INTO users (username, emailid, contact_no, address, user_password, confirm_password)
                        VALUES (:username, :emailid, :contact_no, :address, :user_password, :confirm_password)";
        $statement = $pdo->prepare($insertQuery);

        $statement->bindParam(':username', $username);
        $statement->bindParam(':emailid', $emailid);
        $statement->bindParam(':contact_no', $contact_no);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':user_password', $user_password);
        $statement->bindParam(':confirm_password', $confirm_password);

        $statement->execute();

        header("Location: index.html");
        exit();

    } catch (PDOException $e) {
        echo "Please enter valid details";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="signupstyle.css">
    <script src="https://kit.fontawesome.com/bb54249059.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
</head>
<body>
<div class="container">
        <div class="form-box">
            <h1 id="title">Sign Up</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="input-group">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Name" id="Name" name="username" required>
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" id="Email" name="emailid" required>
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-address-book"></i>
                        <input type="text" placeholder="Contact" id="Contact" name="contact_no" required>
                    </div>
                    
                    <div class="input-field">
                        <i class="fa-solid fa-map"></i>
                        <input type="text" placeholder="Address" id="Address" name="address" required>
                    </div>
                      
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="New Password" id="Password" name="user_password" required>
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Confirm Password" id="Password" name="confirm_password" required>
                    </div>

                    <p>Sign in here <a href="login.html">Click here</a></p>

                </div>
                <div class="btn-field">
                    <button type="submit" value="Register">Sign Up</button>
                    <p id="validation"></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
