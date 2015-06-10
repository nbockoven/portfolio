<?php
session_start();
session_destroy();
unset($_SESSION);
header('location: http://nbockoven.name/movieClub/');
?>
