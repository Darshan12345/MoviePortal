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
    </head>
    <body>
        <?php
        // put your code here
        include 'MasterPageEmployee.php';
        
          if (isset($_POST["submit"])) {
	
             
                  
                 $SSN=$_POST['SSN']; 
          
                 $fname=$_POST['fname'];
                 $lname=$_POST['lname'];
                 $gender=$_POST['gender'];
                 $Birtdhate=$_POST['Birtdhate'];
                  
                 $salary=$_POST['salary'];
                 $address=$_POST['address'];
                  
              
		// Check if name has been entered
	
 $link = mysqli_connect("localhost", "root", "", "gmshop");
 if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "INSERT INTO gmemployee VALUES ('$SSN','$fname','$lname','$address','$salary','$Birtdhate','$gender')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully for Employee.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


 
                 
// close connection
mysqli_close($link);
 
// close connection
//mysqli_close($link);
}

	
        
        ?>
        
         
        <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<fieldset>

<!-- Form Name -->
<legend>Insert Employee</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Enter First Name">Enter Employee SSN</label>  
  <div class="col-md-5">
      <input id="Enter First Name" name="SSN" type="number" maxlength="9" minlength="9" placeholder="Enter SSN:" class="form-control input-md" required="" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Enter First Name">Enter First Name</label>  
  <div class="col-md-5">
      <input id="Enter First Name" name="fname" type="text" maxlength="15" min="3" placeholder="Enter First Name:" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lname">Enter Last Name</label>  
  <div class="col-md-5">
      <input id="lname" name="lname" type="text" maxlength="15" placeholder="Enter Last Name:" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="gender">Select Gender</label>
  <div class="col-md-5">
    <select id="gender" name="gender" class="form-control">
      <option value="M">Male</option>
      <option value="F">Female</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Birtdhate">BirthDate</label>  
  <div class="col-md-5">
      <input id="Birtdhate" name="Birtdhate" type="Date" placeholder="Birthdate" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="salary">Enter Salary</label>  
  <div class="col-md-5">
      <input id="salary" name="salary" type="number" min="0" maxlength="10" placeholder="Enter Salary" class="form-control input-md" >
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="address" >Enter Address</label>
  <div class="col-md-4">                     
      <textarea class="form-control" id="address" name="address" maxlength="20" minlength="3"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
     <input id="submit" name="submit" type="submit" value="submit" class="btn btn-primary">
  </div>
</div>

</fieldset>
</form>


        
    </body>
</html>
