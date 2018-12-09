<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
function buyconfig(){

var del=confirm("Are you sure you want to Buy this record?");
if (del==true){
   alert ("Item Purchased")
}
return del;
}

function rentconfig(){

var del=confirm("Are you sure you want to rent this product for 7 days?");
if (del==true){
   alert ("Item Rented succesfully")
}
return del;
}
</script>
    </head>
    <body>
        <?php
        // put your code here
        include('MasterPageEmployee.php');
        ?>
        
        
        <div class="container">
            <div class="row">
              
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                        <th>Image</th>
                      <th>Movie Name</th>
                      <th>Publish Date</th>
                      <th>Director</th>
                      <th>Actor</th>
                      <th>price</th>
                      <th>Available Quantity</th>
                      <th>Category</th>
                      
                      <th>Average Rating</th>
                      
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                 
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'select  * from gmproduct,movie,categoryproduct,category where gmproduct.Product_ID=movie.Product_ID and categoryproduct.p_id=gmproduct.Product_ID and categoryproduct.c_id=category.Cat_Id GROUP by gmproduct.Product_ID';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>';
                            echo '<img width="200"  height="150" src="'.$row['Image'].' ">';
                            
                            echo '</td>';
                            echo '<td>';
                            
                            echo '<a class="btn-info btn" href="GameProduct.php?id='.$row['Product_ID'].'"> '
                          .$row['Product_Name'];
                  echo '</a>';
                            echo '</td>';
                            echo '<td>'. $row['PublishDate'] . '</td>';
                            echo '<td>'. $row['Director'] . '</td>';
                            echo '<td>'. $row['Actor'] . '</td>';
                            
                             echo '<td>'. $row['price'] . '</td>';
                            echo '<td>'. $row['Quantity'] . '</td>';
                            
                             echo '<td>'. $row['Cat_Name'] . '</td>';
                            
                             echo '<td>'. $row['AvgRating'] . '</td>';
                            
                            
                            echo '<td width=250>';
                                
                                echo '<a  onclick="return buyconfig()"  class="btn btn-success" href="CustomerBuyHistory.php?id='.$row['Product_ID'].';&amp;type=buy">Buy</a>';
                                echo ' ';
                                echo '<a   onclick="return rentconfig()" class="btn btn-danger" href="CustomerBuyHistory.php?id='.$row['Product_ID'].';&amp;type=rent">Rent</a>';
                                
                                
                                
                                echo '</td>';
                            
                            
                            
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
