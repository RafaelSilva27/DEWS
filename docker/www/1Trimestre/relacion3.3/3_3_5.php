<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $array = [];

    for ($i = 0; $i < 8; $i++){
      $array[$i] = rand(0,100);
      
      if ($array[$i] % 2 == 0) {
        echo '<font color="red">'.$array[$i]. " " .'</font>';
      } else {
        echo '<font color="blue">'.$array[$i]. " " .'</font>';
      }
    }
  ?>
</body>
</html>