<?php 
 session_start();
 $sid=$_SESSION['sid'];
 
 if(empty($sid)){
   header("location:index.php");
 }

?>
<html>
    <head>
    <?php include("head.php") ;?>
    </head>
    <body>
    <?php include("nav.php");
    ?>
    <div class="container-fluid border">
        <div class="row">
            <div class="col-md-4 border bg-info">
            
           
          <aside class="col-sm-4 ">
               <?php include("sidebar.php");?></aside>
          </div>
            <div class="col-md-8 border bg-info">
            <?php 
              switch(@$_GET['con']){
                case 'feedback' : include("feedback.php");
                  break;
                case 'product' : include("product.php");
                  break;
                case 'order' : include("order.php");
                  break;
               } 
          ?>

                <?php include("show.php"); ?>
              
        </div>

        </div>
    </div>

    
<footer id="footer" class="footer-1">
<div class="main-footer widgets-dark typo-light">
<div class="container-fluid bg-primary">
<div class="row">

  <div class="col-xs-12 col-sm-6 col-md-3">
<div class="widget subscribe no-box">
<h5 class="widget-title text-dark">COMPANY NAME<span></span></h5>
<p>About the company, little description will goes here.. </p>
</div>
</div>

  
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="widget no-box">
<h5 class="widget-title">Quick Links<span></span></h5>
<ul class="thumbnail-widget">
<li>
<div class="thumb-content"><a href="#.">&nbsp;Get Started</a></div> 
</li>
<li>
<div class="thumb-content"><a href="#.">&nbsp;Top Leaders</a></div> 
</li>
<li>
</ul>
</div>
</div>

  

      <div class="col-xs-12 col-sm-6 col-md-3">
<div class="widget no-box">
<h5 class="widget-title">Follow up<span></span></h5>
            <a href="#"> <i class="fa fa-facebook"> </i> </a>
            <a href="#"> <i class="fa fa-twitter"> </i> </a>
            <a href="#"> <i class="fa fa-youtube"> </i> </a>
</div>
</div>
<br>
  <br>


<div class="col-xs-12 col-sm-6 col-md-3">
<div class="widget no-box">
<h5 class="widget-title">Contact Us<span></span></h5>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
  <div class="emailfield">
<input type="text" name="email" value="Email">
<input name="uri" type="hidden" value="arabiantheme">
<input name="loc" type="hidden" value="en_US">
<input class="submitbutton ripplelink" type="submit" value="Subscribe">
</form>  
</div>
</div>

</div>
</div>
</div>
  
<div class="footer-copyright">
<div class="container-fluid">
<div class="row">
<div class="col-md-12 text-center bg-dark text-light ">
<p>Copyright  © 2021. All rights reserved.</p>
</div>
</div>
</div>
</div>
</footer>




<?php include("foot.php");?>
    </body>
</html>

    
        
   