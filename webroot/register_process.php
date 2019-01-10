<!DOCTYPE html>

<html>
  <head>
    <title>Register Process</title>
  </head>
  <body>
    <?php
        //Create database connection
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=u1756102", 'u1756102', '08nov98');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        //Define variables
        $user  = trim($_POST['username']);
        $pwd   = trim($_POST['password']);
        echo "Password is before hash: {$pwd}";

        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        echo "Password is after hash: {$hashed_pwd}";

        echo "Aaaand, begin the debugging process";

        //Inserts details into DB
        $sql  = "INSERT INTO employee (employee_id, username, password, role)
                               VALUES (NULL, :username, :password, 'Employee')";
        echo "You reached this bit right?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $user);
        $stmt->bindValue(':password', $hashed_pwd);
        $stmt->execute();

      echo "have you reached here?";

        //Check for successful registration
        $sql = "SELECT * FROM employee WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $user);
        $stmt->execute();
        $validUser = $stmt->fetch();

        //Inserts users role detials into database
        if ($validUser) {
          echo "<h1>Go to</h1><a href='login.php'>login</a>";
        }

    ?>
  </body>
</html>
