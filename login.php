<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
$conn = pg_connect("host=localhost dbname=book_store user=postgres port=5432 password=Bubbdya@2003");

if (!$conn) {
    echo "connection failed";
} else {
    echo "connection established";
}

if (isset($_SESSION["userName"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $userName = $_POST['user_name'];
    $loginEmail = $_POST['login_email'];
    $loginPassword = $_POST['login_password'];

    $query = "SELECT * FROM users WHERE username='$userName' AND emailid='$loginEmail' AND user_password='$loginPassword';";

    $resquest = pg_query($conn, $query);

    if (pg_num_rows($resquest) != 0) {
        $row = pg_fetch_assoc($resquest);

        // Store username in the session
        $_SESSION["username"] = $row['username'];

        echo "login successful";
        header("Location: index.php");
        exit();
    } else {
        echo "wrong username or password";
    }
}

// Close the database connection
pg_close($conn);
?>
