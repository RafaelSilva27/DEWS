<?
session_start();

if (isset($_POST['reset'])) {
  $_SESSION["cont"] = 0;
} 

if (!isset($_SESSION["cont"])) {
  $_SESSION["cont"] = 0;
} else {
  $_SESSION["cont"]++;
}
echo $_SESSION["cont"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post">
    <br><input type="submit" name="reset" value="Reset">
  </form>
</body>
</html>