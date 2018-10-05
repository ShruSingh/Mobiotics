<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>

  <div class="container">
 <div class="col-lg-12">
  <br><br>
  <h1 class="text-success text-center" > Display Table Data </h1>
  <br><br>
     <button type="submit" class="btn btn-success float-right" ><a href="insert.php">Create New request</a></button><br><br>
  <table  id="tabledata" class=" table table-striped table-hover table-bordered">
   
   <tr class="bg-dark text-white text-center">
    
    <th> Title</th>
    <th> Category </th>
    <th> Initiator </th>
    <th> Initiator Email</th>
    <th> Assignee</th>
    <th> Priority</th>
    <th> Request Status</th>
    <th>Closed</th>
    <th> Created</th>
    <th>Updated</th>
    <th>Deleted</th>

    </tr >

  <?php

   $q = "select * from request ";

    $query = mysqli_query($conn,$q);

    while($res = mysqli_fetch_array($query)){
 ?>
   <tr class="text-center">
    <td> <?php echo $res['id'];  ?> </td>
    <td> <?php echo $res['title'];  ?> </td>
    <td> <?php echo $res['category'];  ?> </td>
    <td> <?php echo $res['initiator'];  ?> </td>
       <td> <?php echo $res['email'];  ?> </td>
       <td> <?php echo $res['assignee'];  ?> </td>
       <td> <?php echo $res['priority'];  ?> </td>
       <td> <?php echo $res['created'];  ?> </td>
       <td> <?php echo $res['status'];  ?> </td>
    <td> <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['id']; ?>" class="text-white"> Delete </a>  </button> </td>
    <td> <button class="btn-primary btn"> <a href="update.php?id=<?php echo $res['id']; ?>" class="text-white"> Update </a> </button> </td>

    </tr>

   <?php 
   }
   ?>
   
  </table>  

  </div>
 </div>

  <script type="text/javascript">
  
  $(document).ready(function(){
   $('#tabledata').DataTable();
  }) 
  
 </script>

</body>
</html>