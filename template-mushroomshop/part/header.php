<?

session_start();

require_once 'db/db.php';
$categories = $connect->query("SELECT * FROM categories");
$categories = $categories->fetchAll();
?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Главная</a></li>
        <? foreach ($categories as $category){?>
          <li><a href="index.php?cats=<?= $category['name']?>"><?= $category['rus_name']?></a></li>
        <?}?>
        <li><a href="cart.php">Корзина (Товаров: <?if(isset($_SESSION['sumProduct'])){echo $_SESSION['sumProduct'];}else{ echo 0;}?> на сумму <?if(isset($_SESSION['priceProduct'])){echo $_SESSION['priceProduct'];}else{ echo 0;}?> руб)</a></li>
    </ul>
</nav>
<hr>