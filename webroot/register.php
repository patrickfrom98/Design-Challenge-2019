<!DOCTYPE html>

<html>
<head>
    <title>Login Form : XYZ inc.</title>
</head>

<body>

<h1>Welcome to XYZ inc.</h1>

<form action="register_process.php" method="post">
    <label for="fname">Firstname:</label>
    <input type="text" id="fname" name="fname">
    <label for="lname">Lastname:</label>
    <input type="text" id="lname" name="lname">
    <br /><br />
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <br /><br />
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <label for="password" >Password:</label>
    <input type="password" id="password" name="password">
    <br /><br />
    <input type="submit" name="register" value="Register">
</form>

</body>
</html>