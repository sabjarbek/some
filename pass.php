<?
$mysqli = new mysqli("localhost", "mysql", "", "message_table");
if($mysqli->connect_error) {
  exit('Could not connect');
}
?>