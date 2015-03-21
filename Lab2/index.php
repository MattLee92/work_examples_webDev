<?php
    $posts = array(
        
        array('date'=> '12/12/12','message' =>'Hello1','image' => 'images/Penguins.jpg'),
        array('date'=> '12/12/12','message' =>'Hello2','image' => 'images/Desert.jpg'),
        array('date'=> '12/12/12','message' =>'Hello3','image' => 'images/Koala.jpg'),
        array('date'=> '12/12/12','message' =>'Hello4','image' => 'images/Jellyfish.jpg'),
        array('date'=> '12/12/12','message' =>'Hello5','image' => 'images/Lighthouse.jpg'),
        array('date'=> '12/12/12','message' =>'Hello6','image' => 'images/Tulips.jpg'),
        array('date'=> '12/12/12','message' =>'Hello7','image' => 'images/Penguins.jpg'),
        array('date'=> '12/12/12','message' =>'Hello8','image' => 'images/Desert.jpg'),
        array('date'=> '12/12/12','message' =>'Hello9','image' => 'images/Koala.jpg'),
        array('date'=> '12/12/12','message' =>'Hello10','image' => 'images/Jellyfish.jpg')
        );
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Social Network</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  
  </head>
  
  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Social Network</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="./">Photos</a></li>
              <li><a href="../navbar-static-top/">Friends</a></li>
              <li><a href="../navbar-fixed-top/">Login</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main body -->
      <div class='row'>
          <div class='col-xs-4'>
              <form>
                  Name: <br>
                  <input type = 'text' name = 'name'><br>
                  Message: <br>
                  <textarea name="msgpost" rows='4'cols='16'>Enter Message...</textarea><br>
                    <button>Post</button>
              </form>
          </div>
          <div class='col-xs-8'>
              
              <?php
              $Rnumber = rand(1,count($posts));
              echo  "<br> $Rnumber <br>";
              
              for ($i=0; $i < $Rnumber; $i++){
              $image = $posts[$i]['image'];
              $mssge = $posts[$i]['message'];
              $date = $posts[$i]['date'];
              
              echo"<div class= 'post'>";
              echo"<img class= 'photo' src='$image' alt='photo'>";
              echo "$date <br> $mssge";
              echo"</div>";
              }
              
              ?>
          </div>
          
      </div>

    </div> <!-- /container -->
  </body>
</html>