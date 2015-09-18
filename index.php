<?
  /*$userIP = $_SERVER['REMOTE_ADDR'];
  date_default_timezone_set('America/Los_Angeles');
  $timeStamp = date("g:ia T D, n/j/Y");
  $info = "$userIP, $timeStamp\r\n";
  $fileName = "visitors.txt";
  $fp = fopen($fileName, 'a') or die("Sorry, file could not write.");
  flock($fp, LOCK_EX);
  fwrite($fp, "$info\r\n");
  flock($fp, LOCK_UN);
  fclose($fp);*/
?>
<!doctype html>
<html>
  <head lang="en">
    <title>Nathaniel Bockoven | web developer | portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
    <!-- font -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300|Roboto+Condensed:300italic,400,700|Roboto+Slab:700,300' rel='stylesheet' type='text/css'>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css?r=1">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
      if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement("style")
        msViewportStyle.appendChild(
          document.createTextNode(
            "@-ms-viewport{width:auto!important}"
          )
        )
        document.getElementsByTagName("head")[0].appendChild(msViewportStyle)
      }
      if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function(searchElement, fromIndex){
          var i, pivot = (fromIndex) ? fromIndex : 0, length;
          if (!this)
            throw new TypeError();

          length = this.length;

          if (length === 0 || pivot >= length)
            return -1;

          if (pivot < 0)
            pivot = length - Math.abs(pivot);

          for (i = pivot; i < length; i++) {
            if (this[i] === searchElement)
              return i;
          }
          return -1;
        };
      }

      // GOOGLE ANALYTICS
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-47878808-1', 'nbockoven.name');
      ga('send', 'pageview');
    </script>
  </head>
  <body data-spy="scroll" data-target=".navbar-nav">
    <div id='top'></div>
    <? include 'navbar.html' ?>

    <div class='container'>
      <? include 'web.html' ?>
      <? //include 'app.html' ?>
      <? include 'skillset.html' ?>
      <? include 'about.html' ?>
      <? if( $_GET['pricing'] ) include 'pricing.html' ?>
    </div><!--.container-->
    <? include 'contact.php' ?>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="js/magic.js"></script>
  </body>
</html>
