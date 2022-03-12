<?php
include_once 'pass.php';

$sql = "SELECT * FROM students WHERE groupss = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $cname);
while ($stmt->fetch()) {
  echo "<div class=\"form-check\">";
  echo "<input class=\"form-check-input\" type=\"checkbox\" name=\"studentskip[]\" value=\"$cname\" id=\"flexCheckDefault\">";
  echo "<label class\form-check-label\" for=\"flexCheckDefault\">";
  echo $cname;
  echo "</label>";
  echo "</div>";  
};
$stmt->close();
$skip_week=2; //date("W")%2;
$skip_day=date("w");

echo "<br/>";
$subsql = "SELECT subject FROM schedule WHERE day='$skip_day' AND groupss='$cid' AND week='$skip_week' ";
$result = $mysqli->query($subsql);

echo "<select class=\"form-select\" name=\"subject\" aria-label=\"Default select example\">";
  
 

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["subject"]!=""){
    echo "<option value=\"".$row["subject"]."\"> ". $row["subject"]."</option>";
  

  }
  else{
    continue;
  };
  }
} else {
  echo "0 results";
}
echo "</select>";
$mysqli->close();
// работающая форма отправки
/*$msql = "INSERT INTO attendance (teacher, student, skip_lesson, skip_date, type_lesson)
VALUES ('John', '7777','$cname', '1111', 'lab')";

if ($mysqli->query($msql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $msql . "<br>".$mysqli->error;
}*/


?> 