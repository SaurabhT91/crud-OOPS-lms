<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Login</h1>
<form method="post" action="action_performed.php">
    <label for="username">User Name</label>
    <input type="text" name="USER_NAME"><br>
    <br>
    <label for="password">Password</label>
    <input type="password" name="PASSWORD"><br>
    <br>

    <input type="hidden" name="action_type" value="<?php $action_type = "Login"; echo $action_type; ?>"/>
    <button>Login</button>

</form>
</body>
</html>