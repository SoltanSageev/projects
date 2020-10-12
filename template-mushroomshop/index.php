<?

session_start();

require_once 'part/header.php';
if(isset($_GET['cats']))
{
   $cat = $_GET['cats'];
    $mushrooms = $connect->query("SELECT * FROM mushroom WHERE category = '$cat'");
    $mushrooms = $mushrooms->fetchAll(PDO::FETCH_ASSOC);
    if(empty($mushrooms)){
        $mushrooms = $connect->query("SELECT * FROM mushroom");
        $mushrooms = $mushrooms->fetchAll(PDO::FETCH_ASSOC);
    }
} else {
    $mushrooms = $connect->query("SELECT * FROM mushroom"); 
    $mushrooms = $mushrooms->fetchAll(PDO::FETCH_ASSOC);
}

?>

    <div class="main">
    <? foreach ($mushrooms as $mushroom) {?>
        <div class="card">
       
            <a href="product.php?mush=<?= $mushroom['title']?>">
                <img src="img/<?= $mushroom['img']?>" alt="<?= $mushroom['title']?>">
            </a>
            <div class="label"><?= $mushroom['name']?> (<?= $mushroom['price']?> рублей)</div>
            <form method="post" action="part/add.php">
                <input type="hidden" name="id" value="<?= $mushroom['id']?>">
                <input type="submit" value="Добавить в корзину">
            </form>
        </div>
        <?}?>
     
    </div>

</body>
</html>

