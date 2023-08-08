<?php
$db = new mysqli("localhost","root","","users");

// Check connection
if ($db -> connect_errno) {
  echo "<b style='color: red'>no connection</b>";
  exit();
}
?>