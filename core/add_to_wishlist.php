<?php
  include "init.php";
  $id = $_POST['wishListId'];
  $id = (int)$id;
?>
<?php
//1 en 0 need to be swapped later
  $isTrue = "NOT_in_wishlist";
  if ($loginStatus === 0) {
    $isTrue = "NOT_in_wishlist";
    $ItemsArray = [];
  } elseif ($loginStatus === 1) {
    $savedItemsSql = "SELECT * FROM users WHERE id = 1";
    $savedItemsQuery = $connect->query($savedItemsSql);
    $savedItems = mysqli_fetch_assoc($savedItemsQuery);
    $Items = $savedItems['saved_items'];
    $ItemsArray = explode(",", $Items);
  }
  //check if item in saved items
  if (array_key_exists($id, $ItemsArray)) {
    # code...
    $isTrue = "IN_wishlist";
  }
?>
<?php ob_start(); ?>
  <?php
  #debugging purposes
    #print_r($ItemsArray);
    echo $isTrue;
  ?>
<?php echo ob_get_clean();?>