<?php
  session_start();

  if (!isset($_SESSION['username'])) {
    header("Location: login.php");
  }

  require_once("index-process.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/themes.css">
    <link rel="stylesheet" type="text/css" href="css/framework.css">
    <link rel="stylesheet" type="text/css" href="includes/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="includes/css/footer.css">

    <script type="text/javascript" src="includes/js/navbar.js"></script>

    <title>Dashboard | MiTek Tracking System</title>
</head>
<body>
  <?php require($DOCUMENT_ROOT . "includes/navbar.php"); ?>
  <div class="wrapper dashboard">
      <div class="box col-1-1fr">
          <div class="welcome-pane">
              <h3>Welcome to MiTeck Tracking System dashboard <span class="username"><?php echo $_SESSION['username']; ?></span></h3>
              <p>Find out everything you need to know about the status of each individual product</p>
          </div>
      </div>
      <br>
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
              <table>
                <tr>
                  <th>ID</th>
                  <th>Timestamp</th>
                </tr>
                <!-- PHP script for displaying truss data-->
                <?php
                  $conn = getConnection();
                  $results = getTrussStates("Pick Materials");

                  foreach ($results as $result) {
                    echo "<tr><td>{$result['truss_id']}</td><td>{$result['timestamp']}</td></tr>";
                  }
                ?>
              </table>
          </div>
          <div class="dashboard-pane">
              <h1>Latest Cutting Jobs</h1>
              <hr />
              <table>
                <tr>
                  <th>ID</th>
                  <th>Timestamp</th>
                </tr>
                <!-- PHP script for displaying truss data-->
                <?php
                  $conn = getConnection();
                  $results = getTrussStates("Cut Timber");

                  foreach ($results as $result) {
                    echo "<tr><td>{$result['truss_id']}</td><td>{$result['timestamp']}</td></tr>";
                  }
                ?>
              </table>
          </div>
          <div class="dashboard-pane">
              <h1>Latest Making Jobs</h1>
              <hr />
              <table>
                <tr>
                  <th>ID</th>
                  <th>Timestamp</th>
                </tr>
                <!-- PHP script for displaying truss data-->
                <?php
                  $conn = getConnection();
                  $results = getTrussStates("Make");

                  foreach ($results as $result) {
                    echo "<tr><td>{$result['truss_id']}</td><td>{$result['timestamp']}</td></tr>";
                  }
                ?>
              </table>
          </div>
          <div class="dashboard-pane">
              <h1>Latest Loading Jobs</h1>
              <hr />
              <table>
                <tr>
                  <th>ID</th>
                  <th>Timestamp</th>
                </tr>
                <!-- PHP script for displaying truss data-->
                <?php
                  $conn = getConnection();
                  $results = getTrussStates("Load");

                  foreach ($results as $result) {
                    echo "<tr><td>{$result['truss_id']}</td><td>{$result['timestamp']}</td></tr>";
                  }
                ?>
              </table>
          </div>
      </div>
  </div>
  <?php require($DOCUMENT_ROOT . "includes/footer.php"); ?>
</body>
</html>
