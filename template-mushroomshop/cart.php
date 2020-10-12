<?
require_once 'part/header.php';


if(count($_SESSION['cart'])==0){?>
    <div style="text-align:center;">
        <h2>Товаров пока нет :(</h2>
        <a href="index.php"> Вернуться на главную</a>
    </div>
<?
}else{

if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $key=>$product) {
    ?>
    
            <div class="cart">
               <a href="product.php?mush=<?= $product['title']?>"> <img src="img/<?= $product['img']?>" alt="<?= $product['title']?>"></a>
                <div class="cart-descr">
                <?= $product['name']?> в количестве <?= $product['quantity']?> шт на сумму <?= $product['quantity']*$product['price']?> рублей
                </div>
                <form method="post" action="part/delete.php">
                <input type="hidden" name="id" value="<?=$key?>">
                <input type="submit" value="Удалить">
            </form>
            </div>
            
    <?}}?>
    <form class="order" method="post" action="part/mail.php">
                <input type="text" name="username" required placeholder="Введите имя">
                <input type="text" name="phone" required placeholder="Введите телефон">
                <input type="text" name="email" required placeholder="Введите email">
                <input type="submit" value="Отправить">
            </form>
</body>
    <?}?>
</html>

