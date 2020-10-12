<?
session_start();
require_once '../db/db.php';

if($_POST['phone']){
  $name = htmlspecialchars($_POST['username']);
  $phone = htmlspecialchars($_POST['phone']);
  $email = htmlspecialchars($_POST['email']);
  $addOrder = $connect->prepare("INSERT INTO mushmail (username,phone,email) VALUES (:name,:phone,:email)");
  $addOrder->bindParam(':name',$name);
  $addOrder->bindParam(':phone',$phone);
  $addOrder->bindParam(':email',$email);
  $addOrder->execute();

  $message = "<h2>Ваш заказ принят</h2>";
  $message .= "<h3>Состав заказа:</h3>";
  foreach ($_SESSION['cart'] as $key ) {
    $message.= "<div>{$key['name']} в количестве  {$key['quantity']}</div>";
  }

  $message.="<p>Сумма заказа: {$_SESSION['priceProduct']} рублей</p>";


  $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$subject = "Отправка заказа";
mail($email, $subject, $message, $headers);
header("Location: {$_SERVER['HTTP_REFERER']}");
unset($_SESSION['cart']);
unset($_SESSION['priceProduct']);
unset($_SESSION['sumProduct']);
}

 