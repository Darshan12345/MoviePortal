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

var del=confirm("Are you sure you want to Delete this product?");
if (del==true){
   alert ("Item Deleted succesfully")
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
                      <th>Developer</th>
                      <th>Platform</th>
                      <th>price</th>
                      <th>Available Quantity</th>
                      <th>Category</th>
                      
                      <th>Average Rating</th>
                      <th>User Buy</th>
                      <th>User Rent</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                 
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   
                 
                   $sql = 'select  * from gmproduct,game,categoryproduct,category where gmproduct.Product_ID=game.Product_ID and categoryproduct.p_id=gmproduct.Product_ID and categoryproduct.c_id=category.Cat_Id GROUP by gmproduct.Product_ID';
                   foreach ($pdo->query($sql) as $row) {
                       $pid=$row['Product_ID'];
                       
                    $selectbuynumber="SELECT count(*) as buycount FROM buy where buy.Product_ID='.$row[Product_ID].'";
                      $rentnumber="select count(*) as rentcount FROM rent where rent.Product_ID='$pid'";
                      
                   
                    
                      $buy =$pdo ->prepare($selectbuynumber);
                      $buy -> execute();
                      $resultbuy = $buy -> fetch();
                      
                       $rent= $pdo->query($rentnumber);

                       $countrent= $rent->fetch();
                       
                       
                       
                      $rc= $countrent["rentcount"];

                   
                    $bc= $resultbuy['buycount'];
                      
                      
                            echo '<tr>';
                            echo '<td>';
                            echo '<img width="220"   height="170" src="'.$row['Image'].' ">';
                            
                            echo '</td>';
                            echo '<td>';
                  echo '<a class="btn-success btn  " href="EmployeeUpdateGame.php?id='.$row['Product_ID'].'"> '
                          .$row['Product_Name'];
                  echo '</a>';
                             
                  echo '</td>';
                            echo '<td>'. $row['PublishDate'] . '</td>';
                            echo '<td> '. $row['Developer'] . '</td>';
                            echo '<td>'. $row['Platform'] . '</td>';
                            
                             echo '<td>'. $row['price'] . '</td>';
                            echo '<td>'. $row['Quantity'] . '</td>';
                            
                             echo '<td>'. $row['Cat_Name'] . '</td>';
                            
                             echo '<td>'. $row['AvgRating'] . '</td>';
                            
                            echo '<td>' .$bc. '</td>';
                            
                            echo '<td>'. $rc. '</td>';
                            
                            
                            echo '<td width=250>';
                                
                                echo '<a    class="btn btn-success" href="EmployeeUpdateGame.php?id='.$row['Product_ID'].'">Update</a>';
                                echo ' ';
                              
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
