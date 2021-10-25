<html>
<?php
error_reporting(0);
    include("db.php");
     $errormail=$errorpass="";  
     
    if(isset($_POST['submit'])){
     $email=$_POST['email'];
     $pass=$_POST['password'];
    
     if(empty($email)){
         $errormail="plz enter email ";
     }
     if(empty($pass)){
         $errorpass="plz enter password ";
     }
     if($errormail=='' and $errorpass=''){
      echo "success";  
     }
     if(!empty($email) && !empty($pass)){
      $sql=mysqli_query($conn,"select * from users where email='$email' AND password='$pass';");
      $num=mysqli_fetch_assoc($sql);
      
      if($num['email']==$email ){
      echo "success";  
      session_start();
      //$_SESSION['sid']=$email;  
      if($num['password']==$pass){
        $_SESSION['sid']=$email;  
        header("location:dashboard.php");
      }else{
        $errormail=$errorpass="invalid user";
      }
      
    }

  }    
     else{
      // header("location:login.php");
      $errormail=$errorpass="invalid user";
                      
     
     }
      
        
  }
    ?>
    
    <head>
    
    <?php include("head.php") ;?>
    
    <style>
        .error{
          color:red;
        }
    </style>
    </head>
    <body>

  <div class="jumbotron bg-info">
  <h1 class="display-4 text-center">Login Panel</h1>
  
</div>
    
  <div class="container border border-warning bg-success" style="width:700px;">
<form method="post">
    <h1>Login </h1><br>
  
    Email address <span class="error">* <?php echo $errormail; ?></span>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" >
    Password  <span class="error">* <?php echo $errorpass; ?></span>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rem">
    <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Login</button>
  <a href="Register.php" class="text-light">New User?</a>
</form>
</div>
<br><br><br><br>

<div class="footer-copyright">
<div class="container-fluid">
<div class="row">
<div class="col-md-12 text-center bg-dark text-white ">
<p>Copyright  © 2021. All rights reserved.</p>
</div>
</div>
</div>
</div>
<?php include("foot.php");?>
    </body>
</html>

