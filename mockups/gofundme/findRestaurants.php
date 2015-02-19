<?php
// connect to db
if( !$con ){
  $con = mysql_connect('medicinesimplyputcom.ipagemysql.com','codedappeal_nate','Guerrasio11{I}');
  mysql_select_db('letsseehere');
}

// check if user input has been received
if( $_POST['input'] ){
  $input = strtolower($_POST['input']);
  // run query
  $sql = "SELECT name FROM restaurants
          WHERE LOWER(name) LIKE '".$input."%'
          OR LOWER(type) LIKE '".$input."%'
          ORDER BY name";
  $result = mysql_query($sql);

  while( $row = mysql_fetch_assoc($result) ){
    $restaurants[] = $row['name'];
  }

  echo json_encode($restaurants);
  die();
}
