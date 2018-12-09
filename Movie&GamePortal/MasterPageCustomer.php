<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
 
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
      <li><a href="DisplayGame.php">Game</a></li>
      <li><a href="DisplayMovie.php">Movie</a></li>
      <li><a href="CustomerBuyHistory.php">History</a></li>
    </ul>
      <form class="navbar-form navbar-left" action="search.php" method="post">
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
