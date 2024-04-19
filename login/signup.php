<?php
// Create a new PDO instance

$conn = pg_connect("host=192.168.16.1 port=5432 dbname=tyb9 user=tyb9");
if ($conn) {
    echo "connection established!!";
} else {
    echo "Connection Failed!!";
}

$username = $_POST['username'];
$contact = $_POST['contact'];
$emailid = $_POST['emailid'];
$Pwd = $_POST['Pwd'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data

    $query2 = "select email from users where email='$_POST[emailid]';";//'$_POST[emailid]'

    $resquest = pg_query($conn, $query2);

    if (pg_num_rows($resquest) != 0)
        echo "Email is already used!!";
    else {

        //Prepare the SQL statement
        $query = "INSERT INTO users VALUES ('$username', '$emailid', '$Pwd');";
        $res = pg_query($conn, $query);


        if ($res){
		header("index.html"); 
	exit();
            //echo "Details are filled in the database..";
	}
        else{
            echo "Query not executed";
	}
    }
}
// Close the database connection
$conn = null;

?>



