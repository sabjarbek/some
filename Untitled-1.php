<?
// Создаём поток
$opts = array(
    'http'=>array(
      'method'=>"GET",
      'header'=>"X-Yandex-API-Key: 52af6026-c93c-4000-8356-6a49915b9fd8"
                
    )
  );
  
  $context = stream_context_create($opts);
  
  // Открываем файл с помощью установленных выше HTTP-заголовков
  $file = file_get_contents('https://api.weather.yandex.ru/v2/informers?lat=40.103093&lon=65.373970', false, $context);
  
  $obhavo = json_decode($file,true);
  echo $obhavo["fact"]["temp"];
  
?>                                                                                                          