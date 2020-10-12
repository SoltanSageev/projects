<?php

session_start();

require_once '../db/db.php';

if(isset($_POST['id'])){
  $id = $_POST['id'];
  $_SESSION['sumProduct'] = $_SESSION['sumProduct'] ? $_SESSION['sumProduct']+=1 : $_SESSION['sumProduct']=1;
  $products = $connect->query("SELECT * FROM mushroom WHERE id='$id'");
  $products = $products->fetch();
  $_SESSION['priceProduct'] = $_SESSION['priceProduct'] ? $_SESSION['priceProduct']+=$products['price'] : $_SESSION['priceProduct']=$products['price'];
  if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]['quantity']+=1;
  } else { 
    $_SESSION['cart'][$id] = [
      'title'=>$products['title'],
      'img'=>$products['img'],
      'name'=>$products['name'],
      'price'=>$products['price'],
      'quantity' =>1
    ];
  } 
}
header("Location: {$_SERVER['HTTP_REFERER']}");