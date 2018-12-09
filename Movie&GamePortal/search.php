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
         include ('MasterPageCustomer.php');
        ?>
        
        
   
         <div class="well well-lg">Product Search</div>
        <div class="container">
          
            <div class="row">
                 
                <table class="table table-striped table-bordered" width="400" >
                  <thead>
                    <tr>
                        <th>Image</th>
                      <th>Product Name</th>
                 
                     <th>Product Type</th>
                     <th>Quantity</th>
                     <th>Price </th>
                     <th>Publish Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                     
                include('Database.php');
                   $pdo = Database::connect();
                 
                   $search=$_POST["search"];
                    $sql = "select * from gmproduct where  Product_Name like '$search%'";
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr >';
                            
                              echo '<td width=150><img width="150"  height="150" src="'.$row['Image'].' "></td>';
                            
                            
                           
                          
                            
                            echo '<td width=150>'. $row['Product_Name'] . '</td>';
                            echo '<td width=150>'. $row['ProductType'] . '</td>';
                             echo '<td width=150>'. $row['Quantity'] . '</td>';
                            echo '<td width=150>'. $row['price'] . '</td>';
                               echo '<td width=150>'. $row['PublishDate'] . '</td>';
                            
                        
                        
                            
                            
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
