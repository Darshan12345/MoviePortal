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
        <style>
            
            
            .image-container1 {
    width:100%;
    position:absolute;
    float:left;
    left:20;
    margin-left: 90px;
    clear:both;
    bottom: 30;
}
        </style>
    </head>
    <body>
        <?php
        // put your code here
        include('MasterPageCustomer.php');
        $con=mysqli_connect("localhost","root","","gmshop");
                     if(isset($_POST['submit'])){
                            
    if(!empty($_POST['rating'])){
      $rating=$_POST['rating'];
      
      if(isset($_SESSION['c_id']) && !empty($_SESSION['c_id'])) {
   
           $product_id=  $_SESSION['product_id']; 
           $c_id=$_SESSION['c_id'];
          $sql = "SELECT * FROM rate WHERE C_ID ='$c_id' and Product_ID = '$product_id'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count >0) {
         
               
           $product_id =$_SESSION['product_id'];
      $sql = "update  rate set Rating='$rating' where C_ID='$c_id' and Product_ID='$product_id'";
          
          

                if ($con->query($sql) === TRUE) {
                         $sqlcountavg = "SELECT AVG(Rating) AS AveragePrice FROM rate where Product_ID = '$product_id'";
      $getavgresult = mysqli_query($con,$sql);
     
                      
                    
    echo "Record updated successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $con->error;
        }
          
         
         
      }else {
      
          
           $product_id =$_SESSION['product_id'];
      $sql = "INSERT INTO rate values ('$rating','$c_id','$product_id')";
          
          

                if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $con->error;
        }
          
      }
          
          
          
          
          
          
          
          
          
          
          
          
          
          
   $c_id=$_SESSION['c_id'];
   
           
}
      
        
      
      
    }      
                     }
    
    
                          
      $c_id= $_SESSION["c_id"];
                   if ( !empty($_GET['id'])) {
        $product_id = $_REQUEST['id'];
        $_SESSION['product_id']=$product_id;
                   }
                   else{
                       
                     $product_id=  $_SESSION['product_id'];              }
              
        
           $sql = "select * from gmproduct ,game where   game.Product_ID=gmproduct.Product_ID  and gmProduct.Product_ID='$product_id'";
                 $result = mysqli_query($con,$sql);
                 
                  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                
                  $name=$row['Product_Name'];
                  $price=$row['price'];
                  $Developer=$row['Developer'];
                  $AvgRating=$row['AvgRating'];
                  $publishdate=$row['PublishDate'];
                  $Award=$row['Award'];
                  $PlatForm=$row['Platform'];
                 $Quntity=$row['Quantity'];
                 $image=$row['Image'];
                 
      

                        
        
        
     
        ?>
        
        
        <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
<fieldset>
<div class="image-container1">
    <img src="<?php echo $image ?>" alt="" width="200" height="200" class=""/>
</div>
<!-- Form Name -->
<legend>Game</legend>




<!-- File Button --> 



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="GameName">Game Name:</label>  
  <div class="col-md-5">
      <input id="GameName" name="GameName" type="text" value="<?php echo $name;?>" class="form-control input-md" readonly="" >
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="MovieName">Price:</label>  
  <div class="col-md-5">
      <input id="price" name="price" type="text" value="<?php echo $price;?>" class="form-control input-md" readonly="">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Developer">Developer</label>  
  <div class="col-md-5">
      <input id="Developer" name="Developer" type="text" placeholder="Developer" class="form-control input-md" value="<?php echo $Developer;?>" readonly="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PlatForm">PlatForm</label>  
  <div class="col-md-5">
      <input id="PlatForm" name="PlatForm" type="text" placeholder="PlatForm" class="form-control input-md" value="<?php echo $PlatForm;?>" readonly="">
    
  </div>
</div>

<!-- Select Multiple -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PublishDate">PublishDate</label>  
  <div class="col-md-5">
      <input id="PublishDate" name="PublishDate" type="date" placeholder="PublishDate" class="form-control input-md" value="<?php echo $publishdate;?>" readonly="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Quntity">Quntity</label>  
  <div class="col-md-5">
      <input id="Quntity" name="Quntity" type="number" class="form-control input-md" value="<?php echo $Quntity;?>" readonly="" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Award">Award</label>  
  <div class="col-md-5">
      <input id="Award" name="Award" type="text" placeholder="Award" class="form-control input-md" readonly="" value="<?php echo $Award;?>">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Award">Average Rating</label>  
  <div class="col-md-5">
      <input id="Award" name="AvgRating" type="text" placeholder="Award" class="form-control input-md" readonly="" value="<?php echo $AvgRating;?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Award">Give Rating</label>  
  <div class="col-md-5">
      <input id="rating" name="rating" type="number" placeholder="Give Rating out of 5" class="form-control input-md" max="5" min="0" >
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-4">
      <input id="submit" name="submit" type="submit" value="submit" class="btn btn-primary">  </div>
</div>

</fieldset>
</form>
    </body>
</html>
