<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   
   
</head>

<body  class="bg" >

  <div class="container my-5">
    <center><h2 style="color:white;">List Of Customer</h2></center>
    <br>
    <a class="btn btn-success" href="/sid/create2.php" role="button">New Customer</a>
    <br>
    <br>
    <table class="table" style="color:white;">
      <thead>
        <tr>
          <th>C_ID</th>
          <th>C_Name</th>
          <th>Vehical No.</th>
          <th>Vehical color</th>
          <th>Date of  Entry</th>
          <th>Date Of Exit</th>
          <th>Action</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $servername="localhost:3307";
        $username="root";
        $password="";
        $database="gms";

        //create connection
        $connection = new mysqli($servername,$username,$password,$database);

        // cheak connection 
        if($connection->connect_error){
          die("connection failed:".$connection->connect_error);
        }

        //read all row from database table
        $sql="SELECT*FROM customer";
        $result=$connection->query($sql);

        if(!$result){
          die("Invalid query:" . $connection->error);
        }
//read data of each row
while($row=$result->fetch_assoc()){
  echo"
  <tr>
          <td>$row[c_id]</td>
          <td>$row[c_name]</td>
          <td>$row[veh_no]</td>
          <td>$row[veh_color]</td>
          <td>$row[date_of_entry]</td>
          <td>$row[date_of_exit]</td>
        
          <td>
          <a class='btn btn-primary btn-sm' href='/sid/edit1.php?' role='button'>edit</a>      
          <a class='btn btn-danger btn-sm' href='/sid/delete1.php?'role='button'>delete</a>      
            </td>
        </tr>";}
        ?>
      </tbody>
    </table>
  </div>
  <center><a class="btn btn-primary" href="index.html" role="button">back</a></center>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>