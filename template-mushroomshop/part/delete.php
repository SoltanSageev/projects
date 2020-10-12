<?php
session_start();


if(isset($_POST['id'])){
  $id = $_POST['id'];
  $_SESSION['sumProduct']-= $_SESSION['cart'][$id]['quantity'];
  $_SESSION['priceProduct']-= $_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['quantity'];
  unset($_SESSION['cart'][$id]);
  header("Location: {$_SERVER['HTTP_REFERER']}");
}