<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbot</title>
</head>
<body>
  <p>Model</p>
  <form action="" method="post">
    <input type="text" placeholder="Wert" name="wert">
    <input type="submit" value="Speichern">
  </from>
  <?php
  if (!isset($_POST['wert'])) {
    die();
  }

  $wert = strtolower($_POST['wert']);

  $filecon = file_get_contents('info.json');

  $json = json_decode($filecon, true);

  for ($i = 0; $i < count($json); $i++) {
    for ($ii = 0; $ii < count($json[$i]['anfrage']); $ii++) {
      if ($wert === $json[$i]['anfrage'][$ii]) {
        $antwortX = rand(0, (count($json[$i]['antwort']) - 1));
        echo $json[$i]['antwort'][$antwortX];
      }
    }
  }

  //$filename = 'info.json';

  //$file = fopen('info.json', 'a+');

  //  fwrite($file, ',{"tag": "Hallo Welt"}');

  // $data_to_import = ['name'=>'John','surname'=>'Doe'];
  //  $data_array = json_decode(file_get_contents($filename), true);
  //  array_push($data_array, $data_to_import);
  //  $f = fopen("log", 'a');
  //  fwrite($f, json_encode($data_array));

  //    fclose($file);
  ?>
</body>
</html>