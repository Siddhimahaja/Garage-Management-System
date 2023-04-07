<?php
$servername="localhost:3307";
$username="root";
$password="";
$database="gms";
//create connection

$connection = new mysqli($servername,$username,$password,$database);


$name="";
$email="";
$phone="";
$address="";

$errorMessage="";
$successMessage ="";

if($_SERVER['REQUEST_METHOD'] =='POST'){
  $name=$_POST["name"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $address=$_POST["address"];

  do{
    if(empty($name)|| empty($email)||empty($phone)||empty($address)){
      $errorMessage ="all the fields are required";
      break;
    }
// add new client to databse

$sql="INSERT INTO clients (name,email,phone,address)"."VALUES('$name','$email','$phone','$address')";
$result=$connection->query($sql);

if(!$result)
{
  $errorMessage="Invalid query:";
  break;
    
}

$name="";
$email="";
$phone="";
$address="";

$successMessage = "client added successfully";

header("location:/sid/employee.php");
exit;

  }while(false);

}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gms</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   
</head>

<body class="bg">
  <div class="container  my-5">
    <center><h2 style=" color:white;">New Employee</h2></center>
    <br>
    <br>
    <br>
    <?php
 if(!empty($errorMessage)){
  echo"
  <div class'alert alert-warning alert-dismissible fade show' role='alert'>
  <strong> $errorMessage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
  </div>";

 }
?>
    <form method="post"style=" color:white;" >
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label" >Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control " name="name" value="<?php echo $name;?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="text" class="form-control " name="email" value="<?php echo $email;?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Phone</label>
        <div class="col-sm-6">
          <input type="text" class="form-control " name="phone" value="<?php echo $phone;?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-6">
          <input type="text" class="form-control " name="address" value="<?php echo $address;?>">
        </div>
      </div>

      <?php
if(!empty($successMessage)){
  echo"
  <div class=row mb-3'>
  <div class 'offset-sm-3 col-sm-6'>
  <div class'alert alert-warning alert-dismissible fade show' role='alert'>
  <strong> $successMessage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
  </div>
  </div>
  </div>
  ";
}
?>
      <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
          <button type="submit" class="btn btn-primary">submit</button>
          <div class="col-sm-3 d-grid">
            <br>
            <a class="btn btn-outline-primary" href="/sid/employee.php" role="button">cancle</a>
          </div>
        </div>
      </div>

    </form>


  </div>
 <center> <a class="btn btn-primary" href="employee.php" role="button">back</a></center>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>