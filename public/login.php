<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="styles/site.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
    <script src="scripts/site.js"></script>
    <title>Форма ввода логина и пароля</title>
</head>
<body>
<form action="checklogin.php" method="POST">
Логин <input name="login" type="text"><br>
Пароль <input name="pwd" type="password"><br>
<input name="submit" type="submit" value="Войти">
</form>
</body>
</html>