<?php
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = htmlspecialchars($_POST['name']);
    $customerId = htmlspecialchars($_POST['id']);
    $units = htmlspecialchars($_POST['units']);
    $billAmount = 0;
  if($units <= 100){
    $billAmount = $units * 5;
  }
  elseif($units <= 200){
    $billAmount = (100 * 5) + (($units - 100) * 7);
  }
  elseif($units >=201){
    $billAmount = (100 * 5) + (100 * 7) + (($units - 200) * 10);
  }
}
  if(isset($billAmount)){
    echo "<div class='alert alert-success text-center' role='alert'>
            Electricity Bill Details:<br>
            Name: $name<br>
            Customer ID: $customerId<br>
            Units Consumed: $units<br>
            Total Bill Amount: ₹$billAmount
          </div>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricty</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="title">
            <h2 class="text-center mt-4">Electricity Bill Calculator</h2>
          </div>
        </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="border p-4 bg-light">
         <div class="mb-3">
            <label for="name" class="form-label">Enter Your Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
         </div>
         <div class="mb-3">
            <label for="id" class="form-label">Enter Your Customer ID</label>
            <input type="text" class="form-control" id="id" name="id" required>
         </div>
         <div class="mb-3">
            <label for="units" class="form-label">Enter Units Consumed</label>
            <input type="number" class="form-control" id="units" name="units" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Calculate Bill</button>
        </form>
      </div>
    </div>
   </div>
    </section>
    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
