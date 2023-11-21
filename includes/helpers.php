<?php

// Any helper methods you may need to use across 
// pages.

function dd($var) {
  echo'<pre>';
  var_dump($var); 
  echo '</pre>';
  die(); 
}

// get databse table

function getTable($table_name) {
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM $table_name");
  $stmt->execute();
  $fetch_user_table = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return  $fetch_user_table;
}

?>
