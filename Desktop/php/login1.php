<?php
session_start();
if(!isset($_SESSION['username']))
{
header('location:display.php');
}
?>
<html>
<head>
<title>Login Form</title> 
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
     <style>
        #alert{
            display: none;
        }
    
    </style>

<!-- jQuery library -->

</head>
<body class="bg-secondary">
    <div class="container-fluid mt-4">
    <div class="row justify-content-center">
    <div class="col-lg-12" id="alert">
        <div class="alert alert-success">
        
        <strong id="result1"></strong>
        <style>
            
        </style>
        </div>
        
    </div>    
    </div>
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-4 bg-light rounded" id="loginbox">
        <h2 class="text-center mt-2">Login</h2>
         <form action="" method="post" class="p-2" id="login-frm">
            <div class="form-group">
             <input type="text" name="username" class="form-control required" placeholder="email" id="user" minlength="3">
            </div>
             
             <div class="form-group">
             <input type="password" name="password" class="form-control required" placeholder="password" id="pass" minlength="5">
            </div>
             
             <div class="form-group">
             <div class="custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" id="customcheck" name="customch">
                
             <a href="forgot.html" id="forgot-btn" class="float-right">Forget Password?</a>
             </div>
             </div>
             
             <div class="form-group">
                 <input class="btn btn-primary btn-block" name="login" value="login" type="submit" id="login1">
            </div>
            
             <div class="form-group">
             
                 <p class="text-center">New User? <a href="registration.html" id="register">Register Here</a></p>
             </div>
        </form>
            
            
            
            </div>    
            
            </div>
        
        </div>
       
        
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
//<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    
   
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<!-- Latest compiled JavaScript -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    
    
    
    <script type="text/javascript">
     
       $(document).ready(function()
                     {
    $("#login-frm").validate();
           $("#login1").click(function(e){
          if(document.getElementById('login-frm').checkValidity())
        {
        e.preventDefault();
        $.ajax({
           url:'actions.php',
            method:'post',
            data:$('#login-frm').serialize()+ '&action=login1',
        
            success:function(response)
        {       
            var msg = "";
            if(response==1)
            {
                window.location.href='display.php';
            }
            else{
                        msg = "Invalid username and password!";
                    }
        
            
                    
                
                 $("#alert").show();
            $('#result1').html(response);
        
        }
           
            
            
        });
    
        }
          return true;
      });
      
    });

    </script>
        

    </body>
</html>