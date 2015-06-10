<?php

if(isset($_POST['action'])){
  switch ($_POST['action']) {
    case 'getResults':
      getResults();
      break;
    case 'pick':
      pick();
      break;
  }
}

function connectDB(){
  $host = "medicinesimplyputcom.ipagemysql.com";
  $user = "codedappeal_nate";
  $pass = "Guerrasio11{}";
  $db = "letsseehere";
  $link = mysql_connect($host, $user, $pass);
  if(!link) die("Could not connect");
  mysql_select_db($db, $link) or die("Couldn't open database! :( ".mysql_error());
}


function login($email){
  $sql = "SELECT user_id, first_name FROM movieClub_users_email JOIN movieClub_users ON user_id = id WHERE email = '".$email."'";
  $result = mysql_query($sql);
  $row = mysql_fetch_row($result);
  if($row){
    $_SESSION['user_id']       = $row[0];
    $_SESSION['first_name']    = $row[1];
    return true;
  }
  else{
    return false;
  }
}

function usersMovies(){
  //sort by code group first, then voted, then watched
  $query = "SELECT * FROM movies_users";
  $result = mysql_query($query);
  $theArray = array();
  while($row = mysql_fetch_row($result)){
    $theArray[] = $row;
  }
  return $theArray;
}

function getResults(){
  connectDB();
  $sql = "SELECT m.movie_id, movie_title, movie_photo, user_id, count(*) as voteCount FROM movies m JOIN movies_users mu ON m.movie_id = mu.movie_id WHERE code = 'voted' GROUP BY movie_id ORDER BY 5 DESC, 2 ASC";
  $results = mysql_query($sql);
  $string = '';
  while($row = mysql_fetch_row($results)){
    if(strlen($string) > 0){
      $string .= '~';
    }
    $string .= $row[0].'**'.$row[1].'**'.$row[2].'**'.$row[3].'**'.$row[4];
  }

  echo $string;
}

function pick(){
  connectDB();

  $userID = (int)$_POST['user_id'];
  $movieID = (int)$_POST['movie_id'];
  $movieTitle = $_POST['movie_title'];
  $moviePhoto = $_POST['movie_photo'];
  $newCode = $_POST['code'];
  $userAction = $_POST['userAction'];

  if($newCode == 'voted'){
    $sql = "SELECT * FROM movies_users WHERE user_id = $userID AND code = 'voted'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result)){
      $sql = "UPDATE movies_users SET movie_id = $movieID WHERE user_id = $userID AND code='voted'";
    }
    else{
      $sql = "INSERT INTO movies_users (user_id, movie_id, code) VALUES ($userID, $movieID, 'voted')";
    }
  }
  elseif($newCode == 'watched'){
    if($userAction == 'watched'){
      $sql = "SELECT * FROM movies_users WHERE user_id = $userID AND movie_id = $movieID AND code = 'voted'";
      $result = mysql_query($sql);
      if(mysql_num_rows($result)){
        $sql = "UPDATE movies_users SET code = 'watched' WHERE user_id = $userID AND movie_id = $movieID AND code = 'voted'";
        mysql_query($sql);
      }
      $sql = "INSERT INTO movies_users (user_id, movie_id, code) VALUES ($userID, $movieID, '$newCode')";
    }
    else{
      $sql = "DELETE FROM movies_users WHERE user_id = $userID AND code = 'watched' AND movie_id = $movieID";
    }
  }

  mysql_query($sql);

  $result = mysql_query("SELECT * FROM movies WHERE movie_id = $movieID");
  if(!mysql_num_rows($result)){
    $sql = "INSERT INTO movies (movie_id, movie_title, movie_photo) VALUES ($movieID, '$movieTitle', '$moviePhoto')";
    mysql_query($sql);
  }
  $sql = "DELETE FROM movies WHERE movie_id NOT IN (SELECT DISTINCT movie_id FROM movies_users)";
  mysql_query($sql);
}

function watched(){
  connectDB();
}

function bitCount($num){
  $theCount = 0;
  for ($i = 1; $i <= $num; $i = $i<<1){
    if ($num & $i){
      ++$theCount;
    }
  }
  return $theCount;
}

?>
