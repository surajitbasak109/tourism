<?php

require 'init.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {
  $pack_code = $_POST['pack_code'];
  $city_txt = $_POST['city_txt'];
  $tm_cmd2 = $_POST['tm_cmd2'];
  $name_txt2 = $_POST['name_txt2'];
  $ph_txt2 = $_POST['ph_txt2'];
  $email_txt2 = $_POST['email_txt2'];
  $add_txt2 = $_POST['add_txt2'];

  $conn = dbconnect();
  $query = $conn->prepare("INSERT INTO tbl_enquiry (fullname, phno, email, pack_code, `month`, remarks) VALUES (:fn, :phno, :email, :pcode, :mnth, :rem);");
  $query->execute([
    ":fn" => $name_txt2,
    ":phno" => $ph_txt2,
    ":email" => $email_txt2,
    ":pcode" => $pack_code,
    ":mnth" => $tm_cmd2,
    ":rem" => $add_txt2
  ]);

  echo "Your enquiry details has been saved. Please wait...";
  header("Refresh:2; url=index.php");
} else {
  header('Location: /');
}
