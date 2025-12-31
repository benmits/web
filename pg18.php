<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "exam";
$conn = mysqli_connect($server, $user, $pass, $dbname);
if (!$conn) {
    die("Database Connection Failed: " . $conn->connect_error);
}
$message = "";
// INSERT BOOK RECORD
if (isset($_POST['submit'])) {
    $bookno = $_POST['bookno'];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];
   if (!empty($bookno) && !empty($name) && !empty($author) && !empty($edition) && !empty($publisher)) {
        $sql = "INSERT INTO book (bookno, name, author, edition, publisher) 
                VALUES ('$bookno', '$name', '$author', '$edition', '$publisher')";
      if (mysqli_query($conn, $sql)) {
           $message = "
    <div class='alert alert-success text-center'>
        <strong>Book added successfully!</strong><br>
        <b>Book No:</b> $bookno <br>
        <b>Title:</b> $name <br>
        <b>Author:</b> $author <br>
        <b>Edition:</b> $edition <br>
        <b>Publisher:</b> $publisher
    </div>";
        } else {
            $message = "<div class='alert alert-danger text-center'>Error: Book No already exists or invalid data.</div>";
        }
    } else {
        $message = "<div class='alert alert-danger text-center'>All fields are required.</div>";
    }
}
// SEARCH BY AUTHOR
if (isset($_POST['search'])) {
    $searchno = $_POST['bookno'];
     $sqls="SELECT * FROM book WHERE bookno='$searchno'";
    $result = mysqli_query($conn, $sqls);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center">Book Entry Form</h2>
    <?php echo $message; ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>" class="border p-4 bg-light">
        <div class="mb-3">
            <label class="form-label">Book No</label>
            <input type="number" name="bookno" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Book Title</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Edition</label>
            <input type="text" name="edition" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Publisher</label>
            <input type="text" name="publisher" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100">Add Book</button>
    </form>
    <hr class="my-4">
    <h2 class="text-center">Search Books by Book No</h2>
    <form method="POST"   action="<?php echo $_SERVER['PHP_SELF'];  ?>" class="border p-4 bg-light mb-4">
        <div class="mb-3">
            <label class="form-label">Author Name</label>
            <input type="text" name="bookno" class="form-control">
        </div>
        <button type="submit" name="search" class="btn btn-success w-100">Search</button>
    </form>
    <!-- DISPLAY SEARCH RESULTS -->
    <?php
    if (isset($_POST['search'])) {
        echo "<h4>Search Results:</h4>";
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-bordered table-striped text-center'>
                    <thead class='table-dark'>
                        <tr>
                            <th>Book No</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Publisher</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['bookno']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['author']}</td>
                        <td>{$row['edition']}</td>
                        <td>{$row['publisher']}</td>
                      </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning'>No books found for this author.</div>";
        }
    }
   ?>
</div>
</body>
</html>
<?php
$conn->close();
?>
