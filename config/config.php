<?php


function base_url($uri = "")
{
  $base_url = "https://travel.test/";
  return !empty($uri) ? $base_url . $uri : $base_url;
}

// date default timezone
date_default_timezone_set('Asia/Kolkata');

// a simple function to connect mysql database using PDO
function dbconnect()
{
  $dbhost = "localhost";
  $dbname = "travel";
  $username = "root";
  $password = "mntz";
  $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

  return $pdo;
}
