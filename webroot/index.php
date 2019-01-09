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
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/themes.css">
    <link rel="stylesheet" type="text/css" href="css/framework.css">
    <link rel="stylesheet" type="text/css" href="includes/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="includes/css/footer.css">

    <title>Dashboard | MiTek Tracking System</title>
</head>
<body>
  <?php require($DOCUMENT_ROOT . "includes/navbar.php"); ?>
  <div class="wrapper">
    <h3>Welcome to MiTeck Tracking System dashboard <?php echo $_SESSION['username']; ?></h3>
    <p>Find out everything you need to know about the status of each individual product</p>
  </div>
  <div class="wrapper dashboard">
      <div class="box col-1-1fr">
          <div class="notifications-pane">
              <h1>Notifications</h1>
              <hr />
          </div>
      </div>
      <br>
      <div class="box col-2-1fr">
          <div class="dashboard-pane">
              <h1>Latest Materials Jobs</h1>
              <hr />
          </div>
          <div class="dashboard-pane">
              <h1>Latest Cutting Jobs</h1>
              <hr />
          </div>
          <div class="dashboard-pane">
              <h1>Latest Making Jobs</h1>
              <hr />
          </div>
          <div class="dashboard-pane">
              <h1>Latest Loading Jobs</h1>
              <hr />
          </div>
      </div>
  </div>
  <?php require($DOCUMENT_ROOT . "includes/footer.php"); ?>
</body>
</html>
