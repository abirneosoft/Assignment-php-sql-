<?php
include("db.php");
$id=$_GET['id']; 
$select="select * from users where id=$id ";
$query=mysqli_query($conn,$select);
$data=mysqli_fetch_assoc($query);
$old=$data['password'];

$opErr=$npErr=$cpErr=""; 

if(isset($_POST['sub'])){

    $op=$_POST['op'];
    $np=$_POST['np'];
    $cp=$_POST['cp'];

    if(empty($op)){
        $opErr="plz Enter old password";
    }
    if(empty($np)){
        $npErr="plz Enter new password";
    }
    if(empty($cp)){
        $cpErr="plz Enter confirm password";
    }
    if($cpErr=='' && $opErr=='' && $npErr==''){
        echo "success";
    }

    if($old==$op){
        if($np==$cp){
            $update="update users set password= '$np' where id = $id";
            $query=mysqli_query($conn,$update); 
            header("location:dashboard.php");
          }
        if($query){
            echo "success";
            
        }
        else{
            echo "not success";
        }
    }   
}

?>

<html>
    <head>
        <title>change password</title>
        <?php include("head.php"); ?>
        <style>
        .error{
            color:red;
        }
        </style>
    </head>
    <body >
    
  <div class="container border border-warning bg-secondary" style="width:700px;">
        <h1 style="color:white">Change Password</h1>
    <form method="post">
    <div class="form-group"> 
    <label for="exampleInputPassword1">old Password</label> <span class="error">* <?php echo $opErr;?></span>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="old Password" name="op">
  </div>
  
    <div class="form-group"> 
    <label for="exampleInputPassword1">New Password</label> <span class="error">* <?php echo $npErr;?></span>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password" name="np">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>  <span class="error">* <?php echo $cpErr;?></span>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="cp">
  </div>
  
  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
</form>
</div>

    <?php include("foot.php"); ?>
    </body>
</html>