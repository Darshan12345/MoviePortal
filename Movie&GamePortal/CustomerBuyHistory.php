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
           include ('MasterPageCustomer.php');
           
           include 'database.php';
                   //$pdo = Database::connect();
                   
                           $con=mysqli_connect("localhost","root","","gmshop");
      $c_id= $_SESSION["c_id"];
                   if ( !empty($_GET['id'])) {
        $product_id = $_REQUEST['id'];
        
      
          $type=$_REQUEST['type'];
       
          
          if($type=='buy')
          {
              
                     $sql = "INSERT INTO buy (Product_ID, C_ID)
                VALUES ('$product_id','$c_id')";

                if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $con->error;
        }
          }
      else if($type=='rent')
      {
          
          $date=date('Y-m-d');
         // echo $date;
          echo $product_id;
                   $sql = "INSERT INTO rent(`Duration`, `C_ID`, `Product_ID`, `date`)
                VALUES (7,'$c_id','$product_id','$date')";

                if ($con->query($sql) === TRUE) {
    echo "New rent  record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $con->error;
        }
      }
        
        
    }?>
        
        
        
                
        
        
        
         <div class="well well-lg">Customer Movie Purchase Detail</div>
        <div class="container">
          
            <div class="row">
                 
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                        <th>Image</th>
                      <th>Movie Name</th>
                 
                      <th>Actor</th>
                      <th>Director</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                
                   $pdo = Database::connect();
                    $sql = "select * from customer,buy,gmproduct ,movie where buy.C_ID=customer.C_ID and buy.Product_ID=movie.Product_ID and buy.Product_ID=gmproduct.Product_ID and movie.Product_ID=gmproduct.Product_ID and customer.C_ID='$c_id'";
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            
                              echo '<td>';
                            echo '<img width="200"  height="150" src="'.$row['Image'].' ">';
                            
                            echo '</td>';
                          
                            
                            echo '<td>'. $row['Product_Name'] . '</td>';
                         
                           echo '<td>'. $row['Actor'] . '</td>';
                            echo '<td>'. $row['Director'] . '</td>';
                             echo '<td>'. $row['price'] . '</td>';
                         ;
                            
                            
                            
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    <div class="well well-lg">Customer Movie Rent Detail</div>
    
     <div class="container">
          
            <div class="row">
                 
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Movie Name</th>
                 
                      <th>Duration</th>
                      <th>Date Rented</th>
                      <th>Rent Price</th>
                      <th>Date Rented</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                
                   $pdo = Database::connect();
                   $sql = "select * from customer,rent,gmproduct ,movie where rent.C_ID=customer.C_ID and rent.Product_ID=movie.Product_ID and rent.Product_ID=gmproduct.Product_ID and movie.Product_ID=gmproduct.Product_ID and customer.C_ID='$c_id' group by gmproduct.Product_ID";
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                 
                              echo '<td>';
                            echo '<img width="200"  height="150" src="'.$row['Image'].' ">';
                            
                            echo '</td>';
                          
                            
                            echo '<td>'. $row['Product_Name'] . '</td>';
                         
                           echo '<td>'. $row['Duration'] . '</td>';
                            echo '<td>'. $row['date'] . '</td>';
                             echo '<td>$2/Day </td>';
                             
                         ;
                            
                            
                            
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    
    <div class="well well-lg">Customer Game Purchase Detail</div>
  <div class="container">
           
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                        <th >Image</th>
                      
                      <th>Game Name</th>
                      <th>Price</th>
                      <th>
                          Developer
                      </th>
                      <th>Platform</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                
                   $pdo = Database::connect();
                   $sql = "select * from customer,buy,gmproduct ,game where buy.C_ID=customer.C_ID and buy.Product_ID=game.Product_ID and game.Product_ID=gmproduct.Product_ID and game.Product_ID=gmproduct.Product_ID and customer.C_ID='$c_id'";
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            
                            echo '<td >';
                            echo '<img width="200"  height="150" src="'.$row['Image'].' ">';
                            
                            echo '</td>';
                            echo '<td>'. $row['Product_Name'] . '</td>';
                          
                           echo '<td>'. $row['price'] . '</td>';
                            echo '<td>'. $row['Developer'] . '</td>';
                             echo '<td>'. $row['Platform'] . '</td>';
                         
                            
                            
                            
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
<div class="well well-lg">Customer Game Purchase Detail</div>
  <div class="container">
           
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                        <th >Image</th>
                      
                      <th>Game Name</th>
                      <th>Price</th>
                      <th>
                          Developer
                      </th>
                      <th>Platform</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                
                   $pdo = Database::connect();
                   $sql = "select * from customer,rent,gmproduct ,game where rent.C_ID=customer.C_ID and rent.Product_ID=game.Product_ID and game.Product_ID=gmproduct.Product_ID and game.Product_ID=gmproduct.Product_ID and customer.C_ID='$c_id' group by gmproduct.Product_ID";
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            
                            echo '<td >';
                            echo '<img width="200"  height="150" src="'.$row['Image'].' ">';
                            
                            echo '</td>';
                            echo '<td>'. $row['Product_Name'] . '</td>';
                          
                           echo '<td>'. $row['price'] . '</td>';
                            echo '<td>'. $row['Developer'] . '</td>';
                             echo '<td>'. $row['Platform'] . '</td>';
                         
                            
                            
                            
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->

    </body>
</html>

        
    
    