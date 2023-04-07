<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   
   
</head>

<body  class="bg" >

  <div class="container my-5">
    <center><h2 style="color:white;">List Of Employee</h2></center>
    <br>
    <a class="btn btn-success" href="/sid/create.php" role="button">New Employee</a>
    <br>
    <br>
    <table class="table" style="color:white;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>phone</th>
          <th>Address</th>
          <th>Created At</th>
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
        $sql="SELECT*FROM clients";
        $result=$connection->query($sql);

        if(!$result){
          die("Invalid query:" . $connection->error);
        }
//read data of each row
while($row=$result->fetch_assoc()){
  echo"
  <tr>
          <td>$row[id]</td>
          <td>$row[name]</td>
          <td>$row[email]</td>
          <td>$row[phone]</td>
          <td>$row[address]</td>
          <td>$row[created_at]</td>
        
          <td>
          <a class='btn btn-primary btn-sm' href='/sid/edit.php?$row[id]' role='button'>edit</a>      
          <a class='btn btn-danger btn-sm' href='/sid/delete.php?$row[id]'role='button'>delete</a>      
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