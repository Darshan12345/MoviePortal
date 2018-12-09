<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <a href="AddMovie.php"></a>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
        
   
    </head>
    <body>
   <?php
        // put your code here
        include('MasterPageEmployee.php');
        
        
        function display()
{
 
            $supplier=$_POST['supplier'];
                        
                    $category=$_POST['Category'];
                  $MovieName=$_REQUEST['MovieName'];
                  $publishdate=$_REQUEST['PublishDate'];
                  $director=$_REQUEST['director'];
                  $Quntity=$_REQUEST['Quntity'];
               
                  $Award=$_POST['Award'];
                 
                  $actor=$_POST['Actor'];
                     
                  $p_id= rand(100, 999);
 $price=$_POST['price'];
                     
                  
                //  echo $category;
            
                
                $nl="images/".$_FILES['uploadfile']['name'];
                
							$tmpp=$_FILES['uploadfile']['tmp_name'];
							$size=$_FILES['uploadfile']['size'];
							$type=$_FILES['uploadfile']['type'];
							
							move_uploaded_file($tmpp,$nl);
                                          
                                                       
                                               
                                               
                 // echo $category;
                  
                  
              
		// Check if name has been entered
	
 $link = mysqli_connect("localhost", "root", "", "gmshop");
 if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "INSERT INTO gmproduct VALUES ('$p_id','$publishdate','$Award','0','Movie','$MovieName','$Quntity','$nl','$price')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully for gmproduct.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sql4="insert into supplies values ('$p_id','$supplier')";

 if(mysqli_query($link, $sql4)){
    echo "Records added successfully for supplier.";
} else{
    echo "ERROR: Could not able to execute $sql4. " . mysqli_error($link);
}
   



$sql1="insert into movie values('$director','$actor','$p_id')";

 if(mysqli_query($link, $sql1)){
    echo "Records added successfully for movie table.";
} else{
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link);
}

    foreach ($category as $selectedOption)
    {
        
$sql3="insert into categoryproduct (p_id,c_id) values('$p_id','$selectedOption')";

 if(mysqli_query($link, $sql3)){
    echo "Records added successfully for categoryPROduct.";
} else{
    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link);
}

     
    }
                 
// close connection
mysqli_close($link);

}
if(isset($_POST['submit']))
{
   display();
} 
        ?>
        
        
        <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Add Movie</legend>
<div class="form-group">
  <label class="col-md-4 control-label" for="image">Select Supplier name:</label>
  <div class="col-md-4">
    <select name= "supplier" id= "update_indication_id" class="form-control" required>
  <?php
  	
 $link = mysqli_connect("localhost", "root", "", "gmshop");
      $sql = "SELECT * from gmsupplier";
      $result=mysqli_query($link,$sql);
      while($row=mysqli_fetch_array($result))
          echo "<option value='" . $row['S_Id'] . "'>" . $row['S_Name'] . "</option>";
   ?>
</select>
  </div>
</div>
<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="image">Upload Movie Image</label>
  <div class="col-md-4">
    <input id="uploadfile" name="uploadfile" class="input-file" type="file">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="MovieName">Movie Name:</label>  
  <div class="col-md-5">
  <input id="MovieName" name="MovieName" type="text" placeholder="Enter Movie Name" class="form-control input-md" required="">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="MovieName">Price:</label>  
  <div class="col-md-5">
  <input id="price" name="price" type="number" placeholder="price" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="director">Director</label>  
  <div class="col-md-5">
  <input id="director" name="director" type="text" placeholder="Director" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Actor">Actor</label>  
  <div class="col-md-5">
  <input id="Actor" name="Actor" type="text" placeholder="Actor" class="form-control input-md">
    
  </div>
</div>

<!-- Select Multiple -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Category">Category</label>
  <div class="col-md-5">
    <select id="Category" name="Category[]" class="form-control" multiple="multiple">
      <option value="1">Action</option>
      <option value="2">Adventure</option>
      <option value="3">Sport</option>
      <option value="4">Romantic</option>
      <option value="5">Educative</option>
      <option value="6">Drama</option>
      <option value="7">Comedy</option>
      <option value="8">Fantasy</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PublishDate">PublishDate</label>  
  <div class="col-md-5">
      <input id="PublishDate" name="PublishDate" type="date" placeholder="PublishDate" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Quntity">Quntity</label>  
  <div class="col-md-5">
  <input id="Quntity" name="Quntity" type="number" placeholder="Enter Available Quantity" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Award">Award</label>  
  <div class="col-md-5">
  <input id="Award" name="Award" type="text" placeholder="Award" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit">Submit</label>
  <div class="col-md-4">
      <input id="submit" name="submit" type="submit" value="submit" class="btn btn-primary">  
  </div>
</div>




</fieldset>
</form>

        
        
        
        
             <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    </body>
    
    
</html>
