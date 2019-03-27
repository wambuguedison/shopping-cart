<?php
  include "init.php";
  $addToCartID = $_POST['addToCartID'];
  $addToCartID = (int)$addToCartID;
  $cartSql = "SELECT * FROM products WHERE id = {$addToCartID}";
  $cartQuery = $connect->query($cartSql);
  $cart = mysqli_fetch_assoc($cartQuery);
  //details
  $id = $cart['id'];
  $price = $cart['price'];

  $quantity = 1;
  $yes='...';
  $cartItems = [];

  if (in_array($addToCartID, $cartItems)) {
    $quantity += 1;
    $cartItems = array(
      $id=>array('quantity'=>$quantity)
    );
  } else {
    $cartItems = array(
      $id=>array('quantity'=>$quantity)
    );
  }
  
  /* if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = $cartItems;
  } else {
    $arrayKeys = array_keys($_SESSION['cart']);
    if(in_array($id, $arrayKeys)){
      $yes = "item in cart already";
      $cartItems[$id]['quantity'] = $cartItems[$id]['quantity']++;
    } else {
      $_SESSION['cart'] = array_merge(
        $_SESSION['cart'],
        $cartItems
      );
    }
  } */

?>
<?php ob_start(); ?>
  <?=$cartItems[$id]['quantity'];?>
  <?=$yes;?>
  <?=$addToCartID;?>
<?php echo ob_get_clean();?>