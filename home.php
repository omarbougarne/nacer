<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="navbar">
        <h1>Electro</h1>
    </div>
    <div class="sidebar">
  <a class="active" href="#home">Graphics cards</a>
  <a href="#news">Ardiuno</a>
  <a href="#contact">Rasberrypy</a>
</div>


    <?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}
?>
</body>
</html>