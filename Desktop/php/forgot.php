<html>
<head>
<title>Forgot Form</title> 
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
<body class="bg-dark">
    <div class="container mt-4">
    <div class="row justify-content-center">
    <div class="col-lg-4" id="alert">
        <div class="alert alert-success">
        
        <strong id="result2"></strong>
        <style>
            
        </style>
        </div>
        
    </div>    
    </div>
    
    
    
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-4 bg-light rounded">
            <h2 class="text-center mt-4">Reset Password</h2>

        <form action="" method="post" class="p-2" id="forgot-frm">
        <div class="form-group">
            <p class="text-muted">
            To reset your password enter your email address and link will be sent to mail Id
            </p>
            <input type="email" name="femail" class="form-control" placeholder="E-Mail" minlength="2">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" name="Reset" value="Reset" id="reset">        
            <a href="login1.html"></a>            </div>
            <div class="form-group">
            
            <p class="text-center"><a href="login1.html">Back</a></p>
            </div>
            </form>
            </div>
    </div>
    </div>
    </div>

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    
    
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    $("#forgot-frm").validate();
       
           $("#reset").click(function(e){
          if(document.getElementById('forgot-frm').checkValidity())
        {
        e.preventDefault();
        $.ajax({
           url:'action1.php',
            method:'post',
            data:$('#forgot-frm').serialize()+'&action=forget',
            success:function(response)
        {
            $('#alert').show();
            $('#result2').html(response);
        }
            
            
        });
    
        }
          return true;
      });
    });
    </script>
</body>
</html>
