<?php
$servername="localhost:3307";
$username="root";
$password="";
$database="gms";
//create connection

$connection = new mysqli($servername,$username,$password,$database);


$c_name="";
$veh_no="";
$veh_color=" ";
$date_of_entry="";
$date_of_exit="";

$errorMessage="";
$successMessage ="";

if($_SERVER['REQUEST_METHOD'] =='POST'){
  $c_name=$_POST["c_name"];
  $veh_no=$_POST["veh_no"];
  $veh_color=$_POST["veh_color"];
 
  $date_of_entry=$_POST["date_of_entry"];
  $date_of_exit=$_POST["date_of_exit"];

  do{
    if(empty($c_name)|| empty($veh_no)||empty($veh_color)||empty($date_of_entry)||empty($date_of_exit)){
      $errorMessage ="all the fields are required";
      break;
    }
// add new client to databse

$sql="INSERT INTO customer (c_name, veh_no, veh_color, date_of_entry, date_of_exit)"."VALUES('$c_name','$veh_no','$veh_color','$date_of_entry','$date_of_exit')";
$result=$connection->query($sql);



if(!$result)
{
  $errorMessage="Invalid query:";
  break;
    
}

$c_name="";
$veh_no="";
$veh_color=" ";
$date_of_entry="";
$date_of_exit="";

$successMessage = "client added successfully";

header("location:/sid/customer.php");
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
   <center> <h2  style=" color:white;">New customer</h2></center>
   <br>
   <br>
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
    <form method="post"  style=" color:white;">
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label"style=" color:white;" >Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control " name="c_name" value="<?php echo $c_name;?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Veh_no</label>
        <div class="col-sm-6">
          <input type="text" class="form-control " name="veh_no" value="<?php echo $veh_no;?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Veh_color</label>
        <div class="col-sm-6">
          <input type="text" class="form-control " name="veh_color" value="<?php echo $veh_color;?>">
        </div>
      </div>

      

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Date Of Entry</label>
        <div class="col-sm-6">
          <input type="text" class="form-control " name="date_of_entry" value="<?php echo $date_of_entry;?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Date Of Exit</label>
        <div class="col-sm-6">
          <input type="text" class="form-control " name="date_of_exit" value="<?php echo $date_of_exit;?>">
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
          <button type="submit" class="btn btn-primary">Submit</button>
          <div class="col-sm-3 d-grid">
            <br>
            <a class="btn btn-outline-primary" href="/sid/customer.php" role="button">Cancle</a>
          </div>
        </div>
      </div>

    </form>


  </div>

  <center><a class="btn btn-primary" href="customer.php" role="button">back</a></center>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>