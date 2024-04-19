<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin DashBoard</title>
<style>
    :root {
    /* --main-color: #F5E41B; */
    /* --main-color: gold; */
    --main-color: #27ae60;
    --sec-color:#219150;
    --third-col:white;
}
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    h1 {
        text-align: center;
        margin-top: 20px;
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    p{
        color: red;
        text-align: center;
    }
    .delete{
        padding: 5px;
        background: red;
        color: white;
        border-radius: 5px;
    }

    /* Styles for the form container */
.form {
    display: flex;
    justify-content: space-around;
}

/* Styles for individual forms */
.form form {
    width: 45%; /* Adjust as needed */
    margin-bottom: 20px;
}

.form h1 {
    text-align: center;
    margin-bottom: 10px;
}

/* Styles for form labels */
.form label {
    display: block;
    margin-bottom: 5px;
}

/* Styles for form inputs */
.form input[type="text"],
.form input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

/* Styles for submit buttons */
.form input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.form input[type="submit"]:hover {
    background-color: #45a049;
}
nav {
    padding: 1vw 1vw;
    width: 100%;
    background-color: var(--main-color);
    display: flex;
    align-items: center;
    position: relative;
    z-index: 100;
    justify-content: space-between;
    transition: all ease 0.4s;
    border-bottom: 2px solid var(--sec-color)0003c; 


}
nav:hover{
    background-color: var(--main-color);
}
#nav-part2 {
    display: flex;
    align-items: center;
    gap: 1vw;
}

#nav-part2 h4 {
    padding: 10px 20px;
    border: 2px solid var(--sec-color)0003c;
    border-radius: 50px;
    font-weight: 700;
    color: var(--sec-color)000bb;
    transition: all ease 0.4s;
    position: relative;
    font-size: 18px;
    overflow: hidden;
    text-transform: uppercase;
    font-family: "Poppins", sans-serif;
}

#nav-part2 h4::after {
    content: "";
    position: absolute;
    height: 100%;
    width: 100%;
    background-color: var(--sec-color);
    left: 0;
    bottom: -100%;
    border-radius: 50%;
    transition: all ease 0.4s;
}

#nav-part2 h4:hover::after {
    bottom: 0;
    border-radius: 0;
}

#nav-part2 h4 a {
    color: var(--sec-color)000bb;
    text-decoration: none;
    position: relative;
    z-index: 9;
    font-family: "Poppins", sans-serif;
    font-weight: 300;
}

#nav-part2 h4:hover a {
    color: #fff;
}

nav h3 {
    display: none;
}

.header-1{
    padding:1rem 2%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.header-1 .logo{
    font-size: 1.5rem;
    font-weight: normal;
    color: var(--black);
    text-decoration: none;
}

.header-1 .logo i{
    color:black;
}

</style>
<!-- font awesome cdn link -->
<link rel="stylesheet" href="fonts/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
</head>
<body>
<?php session_start();?>
<nav>
<div class="header-1">
            <a href="index.php" class="logo"> <i class="fas fa-book"></i>Otaku heaven</a>
</div>
        <!-- <img src="Assets/Screenshot 2024-02-02 233738.png" alt=""> -->
        <div id="nav-part2">
            <h4><a href="index.php">Home</a></h4>
            <h4><a href="Manga.html">Manga</a></h4>
            <h4><a href="Action Figures.html">Action Figure</a></h4>
            <h4><a href="Merchandise.html">Merchandise</a></h4>
            <h2><span style="float: right; font-weight: normal; font-variant-caps: all-petite-caps;"> <?php echo $_SESSION["username"]; ?></span></h2>
        <!-- Logout button -->
        <h4><a href="login_option.html" style="float: right; margin-right: 10px;">Logout</a></h4>
        </div>
        <h3>Menu</h3>
    </nav>
<h1>Manga</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Year</th>
            <th>Title</th>
            <th>Price</th>
            <th>Monthly Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $dbconn = pg_connect("host=localhost dbname=book_store user=postgres password=Bubbdya@2003");
        if (!$dbconn) {
            echo "Failed to connect to PostgreSQL database.";
            exit;
        }
        if(isset($_POST['delete_manga'])) {
            $id = $_POST['delete_manga'];
            $delete_query = "DELETE FROM manga WHERE id = $id";
            $delete_result = pg_query($dbconn, $delete_query);
            if($delete_result) {
                echo "<p>Manga with ID $id has been successfully deleted.</p>";
            } else {
                echo "<p>Failed to delete manga with ID $id.</p>";
            }
        }
        $result = pg_query($dbconn, "SELECT * FROM manga;");
        if (!$result) {
            echo "Failed to fetch data from the database.";
            exit;
        }
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td><img src='{$row['image_src']}' alt='Product Image' style='width:100px;'></td>";
            echo "<td>{$row['year']}</td>";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['monthly_price']}</td>";
            echo "<td>{$row['stock']}</td>";
            echo "<td><form method='post'><button type='submit' name='delete_manga' class='delete' value='{$row['id']}'>Delete</button></form></td>";
            echo "</tr>";
        }
        pg_close($dbconn);
        ?>
    </tbody>
</table>

<h1>merchandise</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Year</th>
            <th>Title</th>
            <th>Price</th>
            <th>Monthly Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $dbconn = pg_connect("host=localhost dbname=book_store user=postgres password=Bubbdya@2003");
        if (!$dbconn) {
            echo "Failed to connect to PostgreSQL database.";
            exit;
        }
        if(isset($_POST['delete_merchandise'])) {
            $id = $_POST['delete_merchandise'];
            $delete_query = "DELETE FROM merchandise WHERE id = $id";
            $delete_result = pg_query($dbconn, $delete_query);
            if($delete_result) {
                echo "<p>merchandise with ID $id has been successfully deleted.</p>";
            } else {
                echo "<p>Failed to delete merchandise with ID $id.</p>";
            }
        }
        $result = pg_query($dbconn, "SELECT * FROM merchandise;");
        if (!$result) {
            echo "Failed to fetch data from the database.";
            exit;
        }
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td><img src='{$row['image_src']}' alt='Console Image' style='width:100px;'></td>";
            echo "<td>{$row['year']}</td>";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['monthly_price']}</td>";
            echo "<td>{$row['stock']}</td>";
            echo "<td><form method='post'><button type='submit' name='delete_merchandise' class='delete' value='{$row['id']}'>Delete</button></form></td>";
            echo "</tr>";
        }
        pg_close($dbconn);
        ?>
    </tbody>
</table>

<h1>Action Figures</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Year</th>
            <th>Title</th>
            <th>Price</th>
            <th>Monthly Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $dbconn = pg_connect("host=localhost dbname=book_store user=postgres password=Bubbdya@2003");
        if (!$dbconn) {
            echo "Failed to connect to PostgreSQL database.";
            exit;
        }
        if(isset($_POST['delete_action_figure'])) {
            $id = $_POST['delete_action_figure'];
            $delete_query = "DELETE FROM action_figure WHERE id = $id";
            $delete_result = pg_query($dbconn, $delete_query);
            if($delete_result) {
                echo "<p>Action figure with ID $id has been successfully deleted.</p>";
            } else {
                echo "<p>Failed to delete action figure with ID $id.</p>";
            }
        }
        $result = pg_query($dbconn, "SELECT * FROM action_figure;");
        if (!$result) {
            echo "Failed to fetch data from the database.";
            exit;
        }
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td><img src='{$row['image_src']}' alt='Console Image' style='width:100px;'></td>";
            echo "<td>{$row['year']}</td>";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['monthly_price']}</td>";
            echo "<td>{$row['stock']}</td>";
            echo "<td><form method='post'><button type='submit' name='delete_action_figure' class='delete' value='{$row['id']}'>Delete</button></form></td>";
            echo "</tr>";
        }
        pg_close($dbconn);
        ?>
    </tbody>
</table>

<h1>New Content</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>File name</th>
            <th>Email Id</th>
            <th>Comment</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $dbconn = pg_connect("host=localhost dbname=book_store user=postgres password=Bubbdya@2003");
        if (!$dbconn) {
            echo "Failed to connect to PostgreSQL database.";
            exit;
        }
        if(isset($_POST['delete_new_book'])) {
            $id = $_POST['delete_new_book'];
            $delete_query = "DELETE FROM documents WHERE id = $id";
            $delete_result = pg_query($dbconn, $delete_query);
            if($delete_result) {
                echo "<p>New book with ID $id has been successfully deleted.</p>";
            } else {
                echo "<p>Failed to delete new book with ID $id.</p>";
            }
        }
        $result = pg_query($dbconn, "SELECT * FROM documents;");
        if (!$result) {
            echo "Failed to fetch data from the database.";
            exit;
        }
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['c_name']}</td>";
            echo "<td>{$row['file_name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['d_comment']}</td>";
            echo "<td><form method='post'><button type='submit' name='delete_new_book' class='delete' value='{$row['id']}'>Delete</button></form></td>";
            echo "</tr>";
        }
        pg_close($dbconn);
        ?>
    </tbody>
</table>


    <div class="form">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="padding: 20px 8rem;">
    <h2>Add New Manga</h2>
    <label for="product_id">ID:</label><br>
    <input type="number" id="product_id" name="id"><br>
    <label for="product_image_src">Image Source:</label><br>
    <input type="text" id="product_image_src" name="product_image_src"><br>
    <label for="product_year">Year:</label><br>
    <input type="number" id="product_year" name="product_year"><br>
    <label for="product_title">Title:</label><br>
    <input type="text" id="product_title" name="product_title"><br>
    <label for="product_price">Price:</label><br>
    <input type="text" id="product_price" name="product_price"><br>
    <label for="product_monthly_price">Monthly Price:</label><br>
    <input type="text" id="product_monthly_price" name="product_monthly_price"><br>
    <label for="product_url">Product URL:</label><br>
    <input type="text" id="product_url" name="product_url"><br>
    <label for="stock">Stock:</label><br>
    <input type="number" id="stock" name="stock"><br><br>
    <input type="submit" name="add_product" value="Add Manga">
</form>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="padding: 20px 8rem;">
    <h1>Add New merchandise</h1>
    <label for="product_id">ID:</label><br>
    <input type="number" id="product_id" name="id"><br>
    <label for="console_image_src">Image Source:</label><br>
    <input type="text" id="console_image_src" name="console_image_src"><br>
    <label for="console_year">Year:</label><br>
    <input type="number" id="console_year" name="console_year"><br>
    <label for="console_title">Title:</label><br>
    <input type="text" id="console_title" name="console_title"><br>
    <label for="console_price">Price:</label><br>
    <input type="text" id="console_price" name="console_price"><br>
    <label for="console_monthly_price">Monthly Price:</label><br>
    <input type="text" id="console_monthly_price" name="console_monthly_price"><br>
    <label for="console_url">Product URL:</label><br>
    <input type="text" id="console_url" name="console_url"><br>
    <label for="stock">Stock:</label><br>
    <input type="number" id="stock" name="stock"><br><br>
    <input type="submit" name="add_console" value="Add Merchandise">
</form>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="padding: 20px 8rem;">
    <h1>Add New Action figure</h1>
    <label for="product_id">ID:</label><br>
    <input type="number" id="product_id" name="id"><br>
    <label for="console_image_src">Image Source:</label><br>
    <input type="text" id="console_image_src" name="console_image_src"><br>
    <label for="console_year">Year:</label><br>
    <input type="number" id="console_year" name="console_year"><br>
    <label for="console_title">Title:</label><br>
    <input type="text" id="console_title" name="console_title"><br>
    <label for="console_price">Price:</label><br>
    <input type="text" id="console_price" name="console_price"><br>
    <label for="console_monthly_price">Monthly Price:</label><br>
    <input type="text" id="console_monthly_price" name="console_monthly_price"><br>
    <label for="console_url">Product URL:</label><br>
    <input type="text" id="console_url" name="console_url"><br>
    <label for="stock">Stock:</label><br>
    <input type="number" id="stock" name="stock"><br><br>
    <input type="submit" name="add_console" value="Add action figure">
</form>
    </div>
<?php
$dbconn = pg_connect("host=localhost dbname=book_store user=postgres password=Bubbdya@2003");
if (!$dbconn) {
    echo "Failed to connect to PostgreSQL database.";
    exit;
}

if(isset($_POST['add_product'])) {
    $id = $_POST['id'];
    $product_image_src = $_POST['product_image_src'];
    $product_year = $_POST['product_year'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_monthly_price = $_POST['product_monthly_price'];
    $product_url = $_POST['product_url'];
    $stock = $_POST['stock'];

    $insert_product_query = "INSERT INTO products (id,image_src, year, title, price, monthly_price, product_url,stock) VALUES ($id,'$product_image_src', $product_year, '$product_title', $product_price, $product_monthly_price, '$product_url',$stock);";
    $insert_product_result = pg_query($dbconn, $insert_product_query);

    if($insert_product_result) {
        echo "<p>Product added successfully.</p>";
    } else {
        echo "<p>Failed to add product.</p>";
    }
}

if(isset($_POST['add_console'])) {
    $id = $_POST['id'];
    $console_image_src = $_POST['console_image_src'];
    $console_year = $_POST['console_year'];
    $console_title = $_POST['console_title'];
    $console_price = $_POST['console_price'];
    $console_monthly_price = $_POST['console_monthly_price'];
    $console_url = $_POST['console_url'];
    $stock = $_POST['stock'];

    $insert_console_query = "INSERT INTO consoles (id,image_src, year, title, price, monthly_price, product_url,stock) VALUES ($id,'$console_image_src', $console_year, '$console_title', $console_price, $console_monthly_price, '$console_url',$stock);";
    $insert_console_result = pg_query($dbconn, $insert_console_query);

    if($insert_console_result) {
        echo "<p>Console added successfully.</p>";
    } else {
        echo "<p>Failed to add console.</p>";
    }
}

pg_close($dbconn);
?>
    </div>
</body>
</html>
