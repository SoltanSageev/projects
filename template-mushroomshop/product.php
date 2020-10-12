<?
require_once 'part/header.php';
$name = $_GET['mush'];
$product = $connect->query("SELECT * FROM mushroom WHERE title='$name'");
$product = $product->fetch();
?>

<div class="product-card">
    <a href="index.php">Вернуться на главную</a>

    <h2><?= $product['rus_name']?> (<?= $product['price']?> рублей)</h2>
    <div class="descr"><?= $product['discr']?>.</div>
    <img width="300" src="img/<?= $product['img']?>" alt="Фото">
    <form method="post" action="part/add.php">
                <input type="hidden" name="id" value="<?= $product['id']?>">
                <input type="submit" value="Добавить в корзину">
            </form>
</div>
