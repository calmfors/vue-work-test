<html>
<body>

Du sökte efter "<?php echo $_GET["searchLocation"]; ?>".<br>
<?php

if ($_GET["searchLocation"] == "stockholm") {
  echo "Info om Stockholm";
}
elseif ($_GET["searchLocation"] == "london") {
  echo "Info om London";
}
else {
  echo 'Sök efter "stockholm" eller "london".';
}
?>
</body>
</html>