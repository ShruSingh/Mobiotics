<?php

include 'config.php';

if(isset($_POST['done'])){

  $title = $_POST['title'];
 $category = $_POST['category'];
 $initiator=$_POST['initiator'];
    $email=$_POST['email'];
    $assignee=$_POST['assignee'];
    $priority=$_POST['priority'];
    $status=$_POST['status'];
    $created=$_POST['created'];
 $q = "INSERT INTO `request`(`title`, `category`, `initiator`, `email`, `assignee`, `priority`, `status`, `created`) VALUES ('$title','$category','$initiator','$email','$assignee','$priority','$status','$created')";

  $query = mysqli_query($conn,$q);
}
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
</head>
<body>

  <div class="col-lg-6 m-auto">
  
  <form method="post">
   
   <br><br><div class="card">
    
    <div class="card-header bg-dark">
     <h1 class="text-white text-center">Create New Request</h1>
    </div><br>

     <label> title: </label>
    <input type="text" name="title" class="form-control"> <br>

     <label> category: </label>
    <input type="text" name="category" class="form-control"> <br>
 
     <label>Initator</label>
      <select name="initiator" class="form-control">
      <option>Select an initiator</option>
        <option>Sunil</option>
        <option>Abhi</option>
          <option>Karthik</option>
      </select>
      <br>
      
      <label> title: </label>
    <input type="email" name="email" class="form-control"> <br>
    
      <label>Assigned</label>
      <select name="assignee" class="form-control">
      <option>Select an Assignee</option>
        <option>Abhi</option>
        <option>Gagan</option>
         <option>Sunil</option>
           <option>Gagan</option>
           <option>Sunny</option>
           <option>sunnysdsdsd</option>
      </select>
      <br>
      
      <label>Priority</label>
      <select name="priority" class="form-control">
      <option>Select the Priority</option>
        <option>High</option>
        <option>Normal</option>
         <option>Low</option>
          
      </select>
      <br>
      
      <label>Request Status</label>
      <select name="status" class="form-control">
      <option>Select the status</option>
        <option>Created</option>
        <option>Assigned</option>
         <option>Closed</option>
           
      </select>
      <br>
      
      <label> Created: </label>
    <input type="date" name="created" class="form-control"> <br>
      
      <button class="btn btn-success" type="submit" name="done"><a href="display.php">Submit</a></button><br>

    </div>
  </form>
 </div>
</body>
</html>