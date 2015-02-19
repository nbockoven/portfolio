<?php
session_start();
$loggedIn = false;
if(empty($allMovies)){
  $allMovies = array();
}
include 'functions.php';
connectDB();

if($_SESSION['user_id']){
  $loggedIn = true;
}

if(isset($_POST['email'])){
  $loggedIn = login($_POST['email']);
  /*
  if(!$loggedIn){
    die("Oh no!  I don't know who you be.");
  }
  else{
    header('location: http://nbockoven.name/movieClub/movies/');
  }
  */
}
if(!$loggedIn){
  header('location: http://nbockoven.name/movieClub/login/');
}
else{
  if(isset($_POST['email'])){
    header('location: http://nbockoven.name/movieClub/');
  }
  $apikey = '57ef6dvgcrkbuvczfhfm55p5';
  //in theaters movies
  // construct the query with our apikey and the query we want to make
  $endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/lists/movies/in_theaters.json?apikey=' . $apikey;
  // setup curl to make a call to the endpoint
  $session = curl_init($endpoint);
  // indicates that we want the response back
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
  // exec curl and get the data back
  $data = curl_exec($session);
  // remember to close the curl session once we are finished retrieveing the data
  curl_close($session);
  // decode the json data to make it easier to parse the php
  $search_results = json_decode($data);
  if ($search_results === NULL) die('Error parsing json');
  // play with the data!
  $in_theaters_movies = $search_results->movies;



  //opening movies
  // construct the query with our apikey and the query we want to make
  $endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/lists/movies/opening.json?apikey=' . $apikey;
  // setup curl to make a call to the endpoint
  $session = curl_init($endpoint);
  // indicates that we want the response back
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
  // exec curl and get the data back
  $data = curl_exec($session);
  // remember to close the curl session once we are finished retrieveing the data
  curl_close($session);
  // decode the json data to make it easier to parse the php
  $search_results = json_decode($data);
  if ($search_results === NULL) die('Error parsing json');
  // play with the data!
  $opening_movies = $search_results->movies;





  // upcoming movies
  $endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/lists/movies/upcoming.json?apikey=' . $apikey . '&page_limit=50&page=2';
  // setup curl to make a call to the endpoint
  $session = curl_init($endpoint);
  // indicates that we want the response back
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
  // exec curl and get the data back
  $data = curl_exec($session);
  // remember to close the curl session once we are finished retrieveing the data
  curl_close($session);
  // decode the json data to make it easier to parse the php
  $search_results = json_decode($data);
  if ($search_results === NULL) die('Error parsing json');
  // play with the data!
  $upcoming_movies = $search_results->movies;

  if(is_array($in_theaters_movies) || is_array($opening_movies) || is_array($upcoming_movies)){
    $allMovies = array_merge($in_theaters_movies, $opening_movies, $upcoming_movies);
  }
  else{
    $allMovies = array();
  }
  

  include 'header.html';
  include 'topBar.php';
  include 'content.php';
  include 'popup.html';
  include 'footer.html';
}
  
?>
