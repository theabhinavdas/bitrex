<?php
$baseUrl = Yii::app()->theme->baseUrl;
?>
<html>
<head>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  	<style type="text/css">
  		/* Show it's not fixed to the top */
  		body {
  		  min-height: 75rem;
  		}
      .example6 .navbar-brand { 
        background: url(../images/science-blockchain.png) center / contain no-repeat;
        width: 200px;
        margin-top: 10px;
      }
  	</style>
	<link rel="stylesheet" href="../css/bitrex-styles.css">
</head>
<body>
<nav class="navbar navbar navbar-static-top example6">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand text-hide" href="#">Brand Text
      </a>
    </div>
    <div id="navbar6" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">

        <li class="active"><a href="userdashboard">Home</a></li>
        <?php 
          if (Yii::app()->session['user_level'] == 10) {
            echo '
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../icodata/admin">Data CRUD</a></li>
                <li><a href="../icosocial/admin">Social CRUD</a></li>
                <li><a href="../icotokens/admin">Tokens CRUD</a></li>
                <li><a href="../icousers/admin">Users CRUD</a></li>
              </ul>
            </li>';
          } 
        ?>
        <li><a href="logout">Logout</a></li>
        
      </ul>
    </div>
    <!--/.nav-collapse -->
  </div>
  <!--/.container-fluid -->
</nav>
<div class="container">

    <?php echo $content; ?>

</div>

<!-- JS files -->
<!--<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" ></script>-->
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>