<?php
// Create a new PDO instance

$conn = pg_connect("host=psql-h 192.168.16.1 dbname='SQLite.sql' user=tyb9 password='my20234'");
if ($conn) {
    echo "connection established!!";
} else {
    echo "Connection Failed!!";
}

$username = $_POST['username'];
$emailid = $_POST['email'];
$Pwd = $_POST['Pwd'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data

    $query2 = "select email from users where email='$_POST[email]';";

    $resquest = pg_query($conn, $query2);

    if (pg_num_rows($resquest) != 0)
        echo "Email is already used!!";
    else {

        //Prepare the SQL statement
        $query = "INSERT INTO users (username, email, password_hash) VALUES ('$_POST[username]', '$_POST[email]', '$_POST[Pwd]');";
        $res = pg_query($conn, $query);


        if ($res)
            echo "Details are filled in the database..";
        else
            echo "Query not executed";
    }
}
// Close the database connection
$conn = null;

?>
