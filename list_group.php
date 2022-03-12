<?
include_once 'pass.php';


$list_group = "SELECT DISTINCT groupss FROM students";
$result = $mysqli->query($list_group);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<option value=\"".$row["groupss"]."\">".$row["groupss"]."</option>";
  }
} else {
  echo "0 results";
}
?>