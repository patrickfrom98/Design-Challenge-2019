<?php
  session_start();

  if (!isset($_SESSION['username'])) {
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/picking.css">
    <link rel="stylesheet" type="text/css" href="css/themes.css">
    <link rel="stylesheet" type="text/css" href="css/framework.css">
    <link rel="stylesheet" type="text/css" href="includes/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="includes/css/footer.css">

    <title>Picking | MiTek Tracking System</title>
</head>
<body>
  <?php require($DOCUMENT_ROOT . "includes/navbar.php"); ?>
  <div class="wrapper">
    <h3>This is the picking page so far</h3>
  </div>
  <?php require($DOCUMENT_ROOT . "includes/footer.php"); ?>
</body>
</html>
