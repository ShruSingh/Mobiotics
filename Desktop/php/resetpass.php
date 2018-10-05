<?php

require 'config.php';
$msg="";
if(isset($_GET['email']) && isset($_GET['token']) ) 
{
    $email=$_GET['email'];
    $token=$_GET['token'];
    $stmt=$conn->prepare("select id from users where email=? AND token=?");
    $stmt->bind_param("s",$email,$token);
     $stmt->execute();
    $res=$stmt->get_result();
    if($res->num_rows>0)
    {
        if(isset($_POST['submit']))
        {
            $newpass=sha1($_POST['npass']);
            $cnewpass=sha1($_POST['cpass']);
            if($newpass=$cnewpass)
            {
                $stmt1=$conn->prepare("update users set token='',password=? where email=?");
                $stmt1->bind_param("s",$newpass,$email);
     $stmt1->execute();
                $msg="password changed<br><a href='login1.php'>Login Here</a>";
            }
            else
            {
                $msg="password didnot matched";
            }
            
        }
   
    
}
//else
//{
    //header('location:login1.php');
  //  exit();
    
//}
}
//else
//{
  //  header('location:login1.php');
    //exit();
//}
?>
<html>
<head>
<title>Login Form</title> 
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
</head>
<body class="bg-secondary">
    <div class="container-fluid mt-4">
    <div class="row justify-content-center">
    <div class="col-lg-5" id="alert">
        <h3 class="text-center bg-text bg-light p-2 rounded">Reset your password</h3>
        <h4 class="text-success text-center"><?= $msg; ?></h4>
        <form action="" method="post">
        <div class="form-group">
            
            <label for="password">Enter new password</label>
            <input type="password" name="npass" class="form-control" placeholder="new password" required>
            </div>
        
        <div class="form-group">
            
            <label for="password">Enter new password</label>
            <input type="password" name="cpass" class="form-control" placeholder="new password" required>
            </div>
            
            
            <div class="form-group">
            
           <input type="submit" name="submit" class="btn btn-success" value="resetpassword">
            </div>
        
        </form>
        
        
        <style>
            
        </style>
        </div>
        </div>
    </div>
    </body>
</html>