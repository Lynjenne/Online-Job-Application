<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


// no session
if (!isset($_SESSION['uid'])) {
  // secured pages
  if(strpos($_SERVER['REQUEST_URI'], 'employer_login.php') <= 0 && strpos($_SERVER['REQUEST_URI'], 'employer_registration.php') <= 0) {
    header('location: '.BASE_URL.'/login.php?redirect_to='.$currentURL);
  }

  // has session
} else {
  //
  if(strpos($_SERVER['REQUEST_URI'], 'employer_login.php') >= 1) {
    header('location: '.BASE_URL.'/index.php');
  }
}
