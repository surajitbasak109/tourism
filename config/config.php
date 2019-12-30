<?php


function base_url($uri = "")
{
  $base_url = "https://tripanthem.herokuapp.com/";
  return !empty($uri) ? $base_url . $uri : $base_url;
}

// date default timezone
date_default_timezone_set('Asia/Kolkata');

// a simple function to connect mysql database using PDO
function dbconnect()
{
  $dbhost = "r4919aobtbi97j46.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
  $port = "3306";
  $dbname = "zpqb302gpzzx267m";
  $username = "rqvn2xsldkrzt0j8";
  $password = "rqi9h9p4hoawqrpn";
  $pdo = new PDO("mysql:host={$dbhost}:{$port};dbname={$dbname};", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

  return $pdo;
}
