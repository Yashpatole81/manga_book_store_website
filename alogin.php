<?php
session_start();
$conn = pg_connect("host=localhost dbname=book_store user=postgres password=Bubbdya@2003");
if ($conn) {
    echo "Connection established!!<br>";
} else {
    echo "Connection Failed!!<br>";
}


if(isset($_SESSION["username"])){
    header("Location:adminpage.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data

    $query2 = "select username, password from adminlogin where username='$_POST[username]' and password='$_POST[adminpassword]';";

    $resquest = pg_query($conn, $query2);
    $row = pg_fetch_row($resquest);
    $dummy_username = $row[0];
    
    if (pg_num_rows($resquest) != 0){

        $_SESSION["username"] = $dummy_username;
        echo "login successful";
        header("Location: adminpage.php");
        exit();
    }
    
    else{
        echo "wrong username or password";
    }

}
// Close the database connection
$conn = null;

?>