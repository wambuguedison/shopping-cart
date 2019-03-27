<?php
  include "init.php";
  $sql = "SELECT name FROM products WHERE name LIKE '%".$_GET['query']."%'";
  $results = $connect->query($sql);
  $json = [];
  while ($rows = mysqli_fetch_assoc($results)) {
    $json[] = $rows['name'];
  }
  echo json_encode($json);