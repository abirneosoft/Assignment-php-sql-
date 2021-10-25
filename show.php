<html>
    <head>
        <title></title>
        <?php include("head.php"); ?>

    </head>
    <body>
   <?php 

$email=$_SESSION['sid'];    
$selectquery="select * from users where email='$email' ";
$query=mysqli_query($conn,$selectquery);
$res=mysqli_fetch_array($query);

?>
    <table class="table table-bordered">
    <thead>
    <tr>
        <th colspan="2"><img src="<?php echo $res['image'];?>" alt=""></th>
    </tr>
    <tr>
        <th> Id</th>
        <td><?php echo $res['id'];?></td>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <th>uname</th>
        <td><?php echo $res['uname'];?></td>
      </tr>
      
      <tr>
        <th>name</th>
        <td><?php echo $res['name'];?></td>
             </tr>
      <tr>
        <th>Age</th>
        <td><?php echo $res['age'];?></td>
       </tr>
      
       <tr>
        <th>Gender</th>
        <td><?php echo $res['gender'];?></td>
       </tr>
      
       <tr>
        <th>City</th>
        <td><?php echo $res['city'];?></td>
       </tr>
      
       <tr>
        <th>Image path</th>
        <td><?php echo $res['image'];?></td>
       </tr>
      
      <tr>
      <th>Time</th>
      <td><?php echo $res['update_at'];?></td>

      </tr>
      <tr>
          <th rowspan="2">Operation</th>
          <td><a href="update.php?id=<?php echo $res['id'];?>" class="text-dark">Edit</td>
        
      </tr>
          <td><a href="change.php?id=<?php echo $res['id'];?>" class="text-dark">change password</td>
      
    </tbody>
  </table>

   
   
    <?php include("foot.php"); ?>
    </body>
</html>