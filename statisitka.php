<?include_once 'pass.php';?>

<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title><? echo "Список самых прогуливающих студентов";?></title>
  </head>
  <body>
      <div class="container">
        <h1><? echo "Список самых прогуливающих студентов";?></h1>

          <div class="row">
              <div class="col-md-6">
   <h4>Сегодня <? echo date("d-m-Y"); ?> пропустили:</h4>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ф.И.О</th>
      <th scope="col">Группа</th>
      <th scope="col">Пропущенная пара</th>
    </tr>
  </thead>
  <tbody>
<?
$day_skip=date("Y-m-d");
$student_list = "SELECT teacher, type_lesson, skip_lesson FROM attendance WHERE skip_date='$day_skip'";
$student_list_result = $mysqli->query($student_list);
$i=1;
if ($student_list_result->num_rows > 0) {
  // output data of each row
  while($row = $student_list_result->fetch_assoc()) {

   echo "<tr><th scope=\"row\">".$i."</th>";
   echo "<td>".$row["teacher"]."</td>";   
   echo "<td>".$row["type_lesson"]."</td>"; 
   echo "<td>".$row["skip_lesson"]."</td></tr>";   
   
   
   $i++;
  }
} else {
  echo "Сегодня посещаемость 100%";
}
unset($day_skip);
//вывести количества дней в месяце
/*$mysqli->close();
$month=date("m");
$year=date("Y");
$number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
echo $number;*/
?>    
  </tbody>
</table>
</div>
</div>
</div>
    <!-- Необязательный JavaScript; выберите один из двух! -->

    <!-- Вариант 1: пакет Bootstrap с Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Вариант 2: отдельные JS для Popper и Bootstrap -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>