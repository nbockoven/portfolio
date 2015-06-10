<?php
  if( file_exists('restaurants.csv') ){
    $file = fopen('restaurants.csv', 'r');
    $counter = 0;
    while( !feof( $file ) ){
      $counter++;
      if( $counter === 1 ){
        $keys = fgetcsv( $file );
      }
      else{
        $csv = fgetcsv( $file );
        if( count( $csv ) && strlen($csv[0]) ){
          $restaurants[$counter][$keys[0]] = $csv[0];
          $restaurants[$counter][$keys[1]] = $csv[1];
        }
      }
    }
    fclose($file);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GoFundMe Code Sample</title>
    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/superhero/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="jumbotron">
      <h1 class="container">
        <!-- <a href="http://www.gofundme.com/code-sample" target="_blank"><img src="**http://www.gofundme.com/mvc/css/images/press/gfm_logo_300dpi.png**" alt="GoFundMe" style="width:40%"></a> -->
        <br>
        Coding Sample
        <br>
        <small>by <a href="/" target="_blank">Nathaniel Bockoven <img src="../images/nate.jpg" alt="photo" class="img-circle" style="width:95px"></a></small>
      </h1>
    </div><!-- .jumbotron -->
    <div class="container">
      <div class="well well-sm">
        <span class="text-warning">method to use</span>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary active">
            <input type="radio" name="method" value="jquery" checked> jQuery
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="method" value="ajax"> AJAX
          </label>
        </div><!-- .btn-group -->
      </div><!-- .well -->
      <div class="input-group input-group-lg">
        <label for="restaurant" class="input-group-addon">choose restaurant</label>
        <input type="text" class="form-control" id="restaurant" autofocus>
        <ul class="predict-list hide"></ul>
        <span class="input-group-addon hide">
          <i class="fa fa-circle-o-notch fa-spin"></i>
        </span><!-- .input-group-addon -->
        <div class="input-group-btn">
          <button class="btn btn-success" disabled>map it</button>
        </div><!-- .input-group-btn -->
      </div><!-- .input-group -->
      <div id="map-canvas" class="well well-sm" style="height:500px"></div><!-- #map-canvas -->
    </div><!-- .container -->


    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVrzfxpWtxcQ4F4lJhkuDFO3x7gyt38dE&sensor=false&language=en&libraries=places"></script>
    <script>
      var restaurants = [];
      <?php
        foreach( $restaurants as $restaurant ){
          ?>
          restaurants.push({label: "<?php echo $restaurant['restaurant_name']?>", value: "<?php echo $restaurant['restaurant_name'].'|'.$restaurant['cuisine_type']; ?>" });
          <?php
        }
      ?>
      // $('input').autocomplete({source: restaurants});
    </script>
    <script src="js/magic.js"></script>
  </body>
</html>
