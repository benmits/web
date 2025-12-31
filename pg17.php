<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM student"; 
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Student Details</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result)> 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . $row['rollno'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['phone'] . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php $conn->close(); ?>
    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
