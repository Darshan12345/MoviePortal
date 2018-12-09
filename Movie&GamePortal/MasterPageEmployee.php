<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <style>
            
            body{
             
                
            }
        </style>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body  >
        
        <?php
        // put your code here
        
        session_start();
        
        ?>
        
              <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">GM Shop</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="EmployeeGameView.php">Game</a></li>
      <li><a href="EmployeeMovieView.php">Movie</a></li>
      <li><a href="AddGame.php">Add Game</a></li>
      <li><a href="AddMovie.php">Add Movie</a></li>
      <li><a href="AddSupplier.php">Add Supplier</a></li>
      <li><a href="AddEmployee.php">Add Employee</a></li>
    </ul>
      <form class="navbar-form navbar-left" action="EmployeeSearch.php" method="post">
      <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
       <ul class="nav navbar-nav navbar-right">
           <li><a href="AddCustomer.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="UserLogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
    </body>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
</html>
