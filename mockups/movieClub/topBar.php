<nav class="top-bar">
  <ul class="title-area left" style='margin-left:2%'>
    <!-- Title Area -->
    <li class="name">
      <h1>The Best, Most Attractive and Awesome Movie Club</h1>
    </li>
  </ul>
  <ul class='right' style='margin-right:2%'>
    <li style='color:white;font-weight:bold'><?php echo $_SESSION['first_name'] ?>, the results are here <i class='foundicon-right-arrow' style='vertical-align:sub'></i></li>
    <li><a href='javascript:void(0)'><h3 class='label secondary' style='font-size:2em;border-radius:0 0 3px 3px'><i class='foundicon-graph' style='vertical-align:sub'></i> results</h3></a></li>
  </ul>
  <?php include 'results.php' ?>
</nav>
 
