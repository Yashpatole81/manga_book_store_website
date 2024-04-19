<?php

$conn = pg_connect("host=localhost dbname=book_store user=postgres password=Bubbdya@2003");
if ($conn) {
    echo "Connection established!!<br>";
} else {
    echo "Connection Failed!!<br>";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];

    // Check if file was uploaded without errors
    if (isset($_FILES["contentFile"]) && $_FILES["contentFile"]["error"] == 0) {
        // Check if the uploaded file is a PDF
        $fileType = strtolower(pathinfo($_FILES["contentFile"]["name"], PATHINFO_EXTENSION));
        if ($fileType != "pdf") {
            echo "Error: Only PDF files are allowed.";
            exit;
        }

        // Get content of the uploaded file
        $contentFile = file_get_contents($_FILES["contentFile"]["tmp_name"]);

        // Prepare SQL statement
        $sql = "INSERT INTO documents (c_name, file_name, email, d_comment) VALUES ($1, $2, $3, $4)";
        $stmt = pg_prepare($conn, "", $sql);

        // Bind parameters and execute SQL statement
        $result = pg_execute($conn, "", array($name, $_FILES["contentFile"]["name"], $email, $comment));

        // Check if insertion was successful
        if ($result) {
            // Store file content in a separate table column
            $file_insertion = "UPDATE documents SET content_file = $1 WHERE c_name = $2";
            $stmt = pg_prepare($conn, "", $file_insertion);
            $result = pg_execute($conn, "", array($contentFile, $name));

            if ($result) {
                echo "Content uploaded successfully.";
            } else {
                echo "Error uploading content file.";
            }
        } else {
            echo "Error uploading content.";
        }
    } else {
        echo "Error uploading content file.";
    }
}

// Close database connection
pg_close($conn);
?>
