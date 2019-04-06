<!DOCTYPE html>

<html>
  <head>
    <title>Login Process</title>
  </head>
  <body>
    <?php
      session_start();

      //Create database connection
      try {
          $pdo = new PDO("mysql:host=localhost; dbname=", '', '');
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }

      //Define POSTed variables for query
      $user = trim($_POST['username']);
      $pwd = trim($_POST['password']);

      //Get valid login details
      $stmt = $pdo->prepare("SELECT * FROM employee WHERE username=:username");
      $stmt->bindValue(':username', $user);
      $stmt->execute();
      $validUser = $stmt->fetch();

      //Allow or deny access
      if ($validUser) {
          if (password_verify($pwd, $validUser['password'])) {
              $_SESSION["username"] = $user;

              //Get Users role (Admin/Customer/etc...)
              $stmt = $pdo->prepare("SELECT role FROM employee WHERE employee_id=:id");
              echo $validUser['userid'];
              $stmt->bindValue(':id', $validUser['employee_id']);
              $stmt->execute();
              $title = $stmt->fetch();

              $_SESSION['role'] = $title['role'];
              header("Location: index.php");
          } else {
              echo "<h1>Wrong login details. Go back, try again</h1>";
          }
      } else {
          echo "<h1>No login details found, try again</h1>";
      }
    ?>
  </body>
</html>
