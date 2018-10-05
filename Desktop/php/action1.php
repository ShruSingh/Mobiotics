<?php
require 'config.php';
//header("location:new.php");
if(isset($_POST['action']) && $_POST['action'] == 'register')
{
$name=input_check($_POST['username']);
$email=input_check($_POST['email']);
$pass=input_check($_POST['password']);
$cpass=input_check($_POST['cpwd']);
$pass=sha1($pass);
$cpass=sha1($cpass);
$created=date('Y-m-d');
if($pass!=$cpass)
{
    echo "Password doesn't matched";
    exit();
}
else
{
    $sql=$conn->prepare("select username,email from users where username=? OR email=?");
    $sql->bind_param("ss",$name,$email);
    $sql->execute();
      $result=$sql->get_result();
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if($row['username']==$name)
    {
        echo "user not available! Try different one";
    }
    elseif($row['email']==$email)
    {
        echo "email is already registered try different";
    }
    else
    {
        $stmt=$conn->prepare("insert into users(username,email,password,confirmpass,created) values(?,?,?,?,?)");
        $stmt->bind_param('sssss',$name,$email,$pass,$cpass,$created);
        if($stmt->execute())
        {
            echo "registered successfully";
        }
        else
        {
            echo "something is wrong!";   
        }
    }
        
}
}
if(isset($_POST['action']) && $_POST['action']=='login1')
{
    
    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    $stmt_l=$conn->prepare("select * from users where username=? AND password=?");
    $stmt_l->bind_param('ss',$username,$password);
    $stmt_l->execute();
    $user=$stmt_l->fetch();
    if($user!=null)
    {
        $_SESSION['username']=$username;
        echo 'success';
        header('location:new.php');
    
           
    }
    else
    {
        echo "failed";
        header('location:login1.php');
    }
}

if(isset($_POST['action']) && $_POST['action']=='forget')
{
   echo 'hey';
    $email=$_POST['femail'];
    $stmt_p=$conn->prepare("select id from users where email=? ");
    $stmt_p->bind_param("s",$email);
     $stmt_p->execute();
    $res=$stmt_p->get_result();
    if($res->num_rows>0)
    {
        $token="qwertyuioplsjdhfg0987654321";
        $token=str_shuffle($token);
        $token=substr($token,0,10);
        $stmt_i=$conn->prepare("update users SET token=?,tokenExpire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE email=?");
        $stmt_i->bind_param("ss",$token,$femail);
        
        
        require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 2;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = "ssl://smtp.gmail.com";   // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mail@gmail.com';                 // SMTP username
$mail->Password = 'password';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mail@gmail.com', 'Shruti');
$mail->addAddress('mail@gmail.com');     // Add a recipient
          // Name is optional
$mail->addReplyTo('mail@gmail.com');


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'PHP Mailer';
$mail->Body= 'This is the HTML message body';

echo !extension_loaded('openssl')?"Not Available":"Available";
$mail->SMTPKeepAlive = true; 


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else 
{
    echo 'Message has been sent';
}



        
}
}

function input_check($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

?>