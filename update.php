<?php
include("db.php");
$id=$_GET['id'];
$sel=mysqli_query($conn,"select * from users where id=$id");

$arr=mysqli_fetch_assoc($sel);
$Euname=$Ename=$Eage=$Egen=$Ecity=$Eimg="";
if(isset($_POST['submit'])){
    
    $u_name=$_POST['uname'];
    $name=$_POST['name'];

    $age=$_POST['age'];
    $gen=@$_POST['gender'];
    $city=$_POST['city'];

    $date=DATE("y/m/d h:i:s");

    $tmp=$_FILES['att']['tmp_name'];
    $fname=$_FILES['att']['name'];
        
    // $ext = strtolower(pathinfo($fname,PATHINFO_EXTENSION ));
    // $fn="img-".rand()."-".time().".$ext";
    $dest="Image/$fname";   
    
   
    if(empty($u_name)){
      $Euname="plz enter username";
    }
    if(empty($name)){
      $Ename="plz enter name";
    }
    
    if(empty($age)){
      $Eage="plz enter age";
    }
    if(empty($gen)){
      $Egen="plz enter gender";
    }
    

    if(empty($city)){
        $Ecity= "plz enter city";
    }
   
    else{

    if($city!='' && $age!='' && $u_name!='' && $name!='' && $gen!=''){
      move_uploaded_file($tmp,$dest);
     }
    else{
      $emailErr="Invalid";
    }
    
  }
  
if( $Ename=="" && $Euname=="" && $Eage=="" && $Egen=="" && $Ecity==""){
    if(mysqli_query($conn,"update users set uname='$u_name',name='$name',age='$age',gender='$gen',city='$city',image='$dest',update_at='$date'  where id=$id ")){
        header("location:dashboard.php?con=dashboard.php");
    }
    else{
        echo "Already added";
    }


}

    
}


?>


<html>
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
  <h1 class="display-4 text-center">Update Panel</h1>
  
</div>
    
    
  <div class="container border border-warning bg-primary" style="width:700px;">
<form method="post" enctype="multipart/form-data">
    <h1>Register</h1>
  
    
    User name <span class="error">* <?php echo $Euname;?></span>
    <input type="text" class="form-control" name="uname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" value="<?php echo $arr['uname'];?>">
    
    Name <span class="error">* <?php echo $Ename;?></span>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your name" name="name" value="<?php echo $arr['name'];?>">
    
   
    Age <span class="error">* <?php echo $Eage;?></span>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Age" name="age" value="<?php echo $arr['age'];?>">
    
    gender: 

    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" <?php if($arr['gender']=="male"){echo 'checked="checked"';}?>>
    <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" <?php if($arr['gender']=="female"){echo 'checked="checked"';}?>>
    <label class="form-check-label" for="inlineRadio2">Female</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="other" <?php if($arr['gender']=="other"){echo 'checked="checked"';}?>>
    <label class="form-check-label" for="inlineRadio3">Others</label>
   
    </div><span class="error">* <?php echo $Egen;?></span>
    <br><br>
    City <span class="error">* <?php echo $Ecity;?></span>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your name" name="city" value="<?php echo $arr['city'];?>">
    

    <div class="form-group">  <span class="error">* <?php echo $Eimg;?></span>
    <label for="exampleFormControlFile1">Image</label>
    <input type="file" class="form-control-file"  name="att">
    </div>

  

   
  <button type="submit" class="btn btn-dark" name="submit">submit</button>
  
</form>
</div>
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
