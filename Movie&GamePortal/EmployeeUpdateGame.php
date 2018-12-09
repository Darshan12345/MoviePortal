h<!DOCTYPE html>
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
        include('MasterPageEmployee.php');
        $con=mysqli_connect("localhost","root","","gmshop");
        
        
        $oldimage;
  
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
                 $oldimage=$image;


        
                     if(isset($_POST['submit'])){
     
         $name1=$_POST['GameName'];
                  $price1=$_POST['price'];
                  $Developer1=$_POST['Developer'];
                  $AvgRating1=$_POST['AvgRating'];
                  $publishdate1=$_POST['PublishDate'];
                  $Award1=$_POST['Award'];
                  $PlatForm1=$_POST['PlatForm'];
                 $Quntity1=$_POST['Quntity'];
                // $image=$_POST['Image'];
                 
   $nl="images/".$_FILES['uploadfile']['name'];
   $filename=$_FILES['uploadfile']['name'];
  
 
   if(strcmp($filename,""))
   {
       $n1=$oldimage;
    
    
   }
echo $nl;
   
                
							$tmpp=$_FILES['uploadfile']['tmp_name'];
							$size=$_FILES['uploadfile']['size'];
							$type=$_FILES['uploadfile']['type'];
							
							move_uploaded_file($tmpp,$nl);
                                          
       
      
    
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
               
           
      $sql = "update  gmproduct set PublishDate='$publishdate1',Award='$Award1', Product_Name='$name1',price='$price1',Quantity='$Quntity1',image='$nl' where Product_ID='$product_id'";
          
          

                if ($con->query($sql)) {
                         
                      
                    
 
            
    $sqlupdate="update game set Developer='$Developer1' ,Platform='$PlatForm1' where Product_ID='$product_id'";
        if($con->query($sqlupdate)){}
            
    } else {
    echo "Error: " . $sql . "<br>" . $con->error;
        }
          
         
               header("Refresh:0");
   
      }
          
          
          
          
          
          
          
          
          
          
          
          
          
    
//end of post
        
      
      
      
                     
    
    
                        
        
        
     
        ?>
        
        
        <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
<fieldset>
<div class="image-container1">
    <img src="<?php echo $image ?>" alt="" width="200" height="200" class="" name="uploadfile"/>
</div>
<!-- Form Name -->
<legend>Game</legend>




<!-- File Button --> 
<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="image">Upload Game Image</label>
  <div class="col-md-4">
    <input  class="input-file" type="file" name="uploadfile">
  </div>
</div>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="GameName">Game Name:</label>  
  <div class="col-md-5">
      <input id="GameName" name="GameName" type="text" value="<?php echo $name;?>" class="form-control input-md"  >
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="MovieName">Price:</label>  
  <div class="col-md-5">
      <input id="price" name="price" type="text" value="<?php echo $price;?>" class="form-control input-md" >
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Developer">Developer</label>  
  <div class="col-md-5">
      <input id="Developer" name="Developer" type="text" placeholder="Developer" class="form-control input-md" value="<?php echo $Developer;?>" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PlatForm">PlatForm</label>  
  <div class="col-md-5">
      <input id="PlatForm" name="PlatForm" type="text" placeholder="PlatForm" class="form-control input-md" value="<?php echo $PlatForm;?>" >
    
  </div>
</div>

<!-- Select Multiple -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PublishDate">PublishDate</label>  
  <div class="col-md-5">
      <input id="PublishDate" name="PublishDate" type="date" placeholder="PublishDate" class="form-control input-md" value="<?php echo $publishdate;?>" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Quntity">Quntity</label>  
  <div class="col-md-5">
      <input id="Quntity" name="Quntity" type="number" class="form-control input-md" value="<?php echo $Quntity;?>"  >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Award">Award</label>  
  <div class="col-md-5">
      <input id="Award" name="Award" type="text" placeholder="Award" class="form-control input-md"  value="<?php echo $Award;?>">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Award">Average Rating</label>  
  <div class="col-md-5">
      <input id="Award" name="AvgRating" type="text" placeholder="Award" class="form-control input-md" readonly="" value="<?php echo $AvgRating;?>" >
    
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

