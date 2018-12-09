<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
      
              <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
             
    </head>
    <body>
      
         <?php
        // put your code here
           include ('MasterPageCustomer.php');
           
           ?>
        
        
        
        
              <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>User Login:</legend>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="image">Customer Name</label>
  <div class="col-md-3">
     <input type="" class="form-control" id="name" name="name">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="MovieName">Use phone number as Password:</label>  
  <div class="col-md-3">
    <input type="text" class="form-control" id="number" name="number" maxlength="10" minlength="10"  pattern="[0-9]{10}">
 
  </div>
</div>








<!-- Text input-->



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-4">
      <input id="submit" name="submit" type="submit" value="submit" class="btn btn-primary">  
  </div>
</div>




</fieldset>
</form>

        
        
        
        
   
       <?php
function display()
{
  $link = mysqli_connect("localhost", "root", "", "gmshop");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$myusername = mysqli_real_escape_string($link, $_REQUEST['name']);
$mypassword = mysqli_real_escape_string($link, $_REQUEST['number']);


      $sql = "SELECT C_ID FROM customer WHERE C_Name = '$myusername' and C_Phone = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['C_ID'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_start();
         
         $_SESSION['c_id'] = $active;
        echo $active;
         header("location: DisplayMovie.php");
      }else {
         echo "Your Login Name or Password is invalid";
      }


// close connection
mysqli_close($link);
}
if(isset($_POST['submit']))
{
   display();
} 
?> 
     
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    </body>
</html>
