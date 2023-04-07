<?php
$servername="localhost:3307";
$username="root";
$password="";
$database="gms";


//create connection
$connection = new mysqli($servername,$username,$password,$database);

$id="";
$name="";
$email="";
$phone="";
$address="";



$errorMessage="";
$successMessage ="";

if($_SERVER['REQUEST_METHOD'] =='GET'){
//GET method: show the data of the client 
    if(!isset($_GET["id"])){
        header("location:/sid/employee.php");
        exit;
    }

    $id=$_GET["id"];
// read the row of the selected client from the database table
$sql="SELECT* FROM clients WHERE id=$id";
$result=$connection->query($sql);
$row=$result->fetch_assoc();

if(!$row){
    header("location:/sid/employee.php");
    exit;
}
$name=$row["name"];
$email=$row["email"];
$phone=$row["phone"];
$address=$row["address"];


}

else{
    //POST method:Update the data of the client
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];

    
  do{
    if( empty($id)||empty($name)|| empty($email)||empty($phone)||empty($address)){
      $errorMessage ="all the fields are required";
      break;
    }
    $sql="UPDATE clients".
    "SET name='$name',email='$email',phone='$phone',address='$address'"."WHERE id =$id";

    $result=$connection->query($sql);

    if(!$result){
        $errorMessage= "Invalid query:";
        break;
      }
      $successMessage = "client added successfully";

header("location:/sid/employee.php");
exit;

}while(true);
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
</head>

<body>
  <div class="container  my-5">
    <h2>new client</h2>
    <?php
 if(!empty($errorMessage)){
  echo"
  <div class'alert alert-warning alert-dismissible fade show' role='alert'>
  <strong> $errorMessage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
  </div>";

 }
?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>">
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">name</label>
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
        <label class="col-sm-3 col-form-label">phone</label>
        <div class="col-sm-6">
          <input type="text" class="form-control " name="phone" value="<?php echo $phone;?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">address</label>
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
            <a class="btn btn-outline-primary" href="/sid/employee.php" role="button">cancle</a>
          </div>
        </div>
      </div>

    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>