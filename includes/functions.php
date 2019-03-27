<?php
  function checkLogin() {
    if (!isset($_SESSION['id'])) {
      return 0;
    } else {
      return 1;
    }
  }
  $loginStatus = checkLogin();


  function login() {
    return "
        <div class='card card-body' style='width: 8rem;'>
          <a href='index.php?'>Login</a>
          <hr/>
          <a href='index.php?'>Register</a>
        </div>
        ";
  }

  function loggedIn() {
    return "
        <div class='card card-body' style='width: 8rem;'>
          <a href='index.php'>My Saved Items</a>
          <hr/>
          <a href='index.php?'>My Orders</a>
          <hr/>
          <a href='index.php'>My Reviews & R...</a>
          <hr/>
          <a href='index.php'>Newsletter</a>
          <hr/>
          <a href='index.php'>Log Out</a>
        </div>
        ";
  }
  /*function rating($total, $no) {
    $rate = $total / $no;
    if ($rate === 1) {
      return "
          <b>$rate</b>/5
          <i class='fas fa-star'></i>
          <i class='far fa-star'></i>
          <i class='far fa-star'></i>
          <i class='far fa-star'></i>
          <i class='far fa-star'></i>
          ";
    }
    # To Be continued
  } */
  function percent($old, $new) {
    //not working as required
    if ($old != 0) {
      $_percent = $old - $new;
      $string = (string)(($_percent / $old) * 100);
      return '-'.$string[0].$string[1].' %';
    }
  }

  function oldprice($old){
    if ($old != 0) {
      return "Ksh ".$old;
    }
  }