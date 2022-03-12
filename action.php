<?
$customers=$_POST['customers'];
$subject=$_POST['subject'];
$student = $_POST['studentskip'];

$mysqli = new mysqli("localhost", "mysql", "", "message_table");
if($mysqli->connect_error) {
  exit('Could not connect');
};

  if(empty($student)) 
  {
    echo("Вы не выбрали ни одного здания.");
  } 
  else
  {
    $N = count($student);

    for($i=0; $i < $N; $i++)
    {
        // работающая форма отправки
       
    $one_subject=mysqli_real_escape_string($mysqli,$subject);    
$msql = "INSERT INTO attendance (teacher, student, skip_lesson, skip_date, type_lesson)
VALUES ('$student[$i]', '7777','$one_subject', Now(), '$customers')";
if ($mysqli->query($msql) === TRUE) {
    echo "";
  } else {
    echo "Error: " . $msql . "<br>".$mysqli->error;
  };
    }
  };
  $mysqli->close();
echo "Данные добавдены. Передейте на главную: ". "<a href=\"\statisitka.php\">Здесь</a>";
?>
