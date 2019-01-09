<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
        <link rel="stylesheet" type="text/css" href="css/framework.css">
        <link rel="stylesheet" type="text/css" href="css/themes.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">

        <title>PHP Login System.</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="box col-1-1fr login-form">
                <h1>PHP Login System</h1>
                <h3>with a few added features</h3>
                <form action="login_process.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                    <label for="password" >Password:</label>
                    <input type="password" id="password" name="password">
                    <input type="submit" name="login" value="Login">
                    <h4><a href='register.php'>Sign Up</a></h4>
                </form>
            </div>
        </div>
    </body>
</html>
