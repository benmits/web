<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {     
    $name = htmlspecialchars($_POST['name']);     
    $email = htmlspecialchars($_POST['email']);     
    $age = htmlspecialchars($_POST['age']);     
    $password = htmlspecialchars($_POST['password']);
    $passwordValid = preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).+$/', $password);
 if (!empty($name) && !empty($email) && !empty($age) && !empty($password)) {                 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='alert alert-danger text-center' role='alert'>Invalid email format.</div>";
        } 
        elseif (!$passwordValid) {
            echo "<div class='alert alert-danger text-center' role='alert'>
                    Password must be alphanumeric and include at least one symbol.
                  </div>";
        }
        else { 
            echo "<div class='alert alert-success text-center' role='alert'>
                    Form submitted successfully!<br>
                    Name: $name<br>
                    Email: $email<br>
                    Age: $age
                  </div>";
        }
    } 
    else {         
        echo "<div class='alert alert-danger text-center' role='alert'>
                Please fill in all fields.
              </div>";
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center my-4">User Information Form</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="border p-4 bg-light">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
  </section>
    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
