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
           include ('MasterPageEmployee.php');
        $name;
        $email;
        $message;
        $human;
        $subject;$body;
        
        if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$number = $_POST['number'];
		$address=$_POST['address'];
                
                echo $name;
                echo $number;
                echo $address;
		// Check if name has been entered
	
 $link = mysqli_connect("localhost", "root", "", "gmshop");
 
 // attempt insert query execution
$sql = "INSERT INTO gmsupplier (S_Name,S_Address,S_ContactInfo) values ('$name', '$address', '$number')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
}

	
        ?>
        
        
        
        
        <form class="form-horizontal" role="form" method="post" action="AddSupplier.php">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label"> Supplier Name</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="name" name="name" placeholder="Supplier Name" value="">
			
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Supplier Contact</label>
		<div class="col-sm-3">
                    <input type="number" class="form-control" id="number" name="number" placeholder="Phone Number" value="" maxlength="10" minlength="10"  pattern="[0-9]{10}">
			
		</div>
	</div>
	<div class="form-group">
		<label for="message" class="col-sm-2 control-label">Address</label>
		<div class="col-sm-4">
                    <textarea class="form-control" rows="4" name="address" placeholder="Address"></textarea>
			
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
		</div>
	</div>
	<div class="form-group">
		
	</div>
</form> 
        
             <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    </body>
    
    
</html>
