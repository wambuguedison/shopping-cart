<?php
  $id = $_POST['detailsId'];
  $id = (int)$id;
  include "../core/init.php";
?>
<?php
  $detailsSql = "SELECT * FROM products WHERE id = {$id}";
  $detailsQuery = $connect->query($detailsSql);
  $productDetails = mysqli_fetch_assoc($detailsQuery);
  $brandId = $productDetails['brand'];
  $brandSql = "SELECT * FROM brand WHERE id = {$brandId}";
  $brandQuery = $connect->query($brandSql);
  $brand = mysqli_fetch_assoc($brandQuery);
  $wishlistSql = "SELECT saved_items FROM users WHERE id = 1";
  $wishlistQuery = $connect->query($wishlistSql);
  $wishlist = mysqli_fetch_assoc($wishlistQuery);
  $savedItems = $wishlist['saved_items'];
?>
<?php ob_start(); ?>
<div class="details" onload="test()">
  <a href="index.php<?='';?>" class="go-back"><i class="fas fa-angle-double-left"></i> Go Back To <?='';?></a>
  <hr class="m-1" />
  <!-- <p id="wishlistStatus"></p> -->
  <button class="btn btn-outline-light add-to-wishlist text-primary border-0">
    <i
      class="far fa-heart"
      id="wishlistIcon"
      onclick="wishtest(<?=$productDetails['id'];?>)"
    ></i>
  </button>
  <script>
    "use strict"
    console.log("Login Status : " + <?=$loginStatus;?> + " FOR DEBUGGING PURPOSES");

    //Change WishList Icon if Item in wishlist
    /*$.ajax({
      url: "core/add_to_wishlist.php",
      method: "POST",
      data: { wishListId: localStorage.detailsId },
      success: function(data) {
        if (data.replace(/\s+/, "") === "IN_wishlist") {
          $("#wishlistIcon").removeClass("far").addClass("fas").css("color","red");
          localStorage.InWishListStatus = true;
        } else {
          $("#wishlistIcon").removeClass("fas").addClass("far").css("color","#007bff");
          localStorage.InWishListStatus = false;
        }
      },
      error: function() {
        alert("Something went wrong");
      }
    }); */
  </script>
  <script>
    //Testing !!!!!!!
    console.log(localStorage.InWishListStatus);
  </script>
  
    <!--Test-->
    <?=$productDetails['id'];?>

  <img class="mx-auto d-block main-img" src="<?=$productDetails['image'];?>" alt="test" />
  <p class="text-right mr-3 mb-0"><b>1</b>/8</p>
  <hr class="m-0" />
  <div class="container">
    <span class="text-muted"><?=$brand['brand'];?></span>
    <h6 class="m-0"><?=$productDetails['name'];?></h6>
    <p class="text-primary m-0 rating" id="rating">
      <b id="totalRating">0</b>/5
      <i class="far fa-star rateStar" onclick="one()"></i>
      <i class="far fa-star rateStar" onclick="two()"></i>
      <i class="far fa-star rateStar" onclick="three()"></i>
      <i class="far fa-star rateStar" onclick="four()"></i>
      <i class="far fa-star rateStar" onclick="five()"></i>
    </p>
    <div class="d-flex flex-row">
      <div class="p-2 mr-5">
        <h5 class="mb-0">Ksh <?=$productDetails['price'];?></h5>
        <h5 class="text-muted m-0 old-price"><small><?=oldprice($productDetails['old_price']);?></small></h5>
      </div>
      <div class="p-2 ml-5 mt-2">
        <p class="percent badge badge-primary"><?=percent($productDetails['old_price'], $productDetails['price']);?></p>
      </div>
    </div>
    <div class="jumbotron p-1 m-1 pl-3">
      <h6 class="m-0 p-0">Express</h6>
      <small>Delivery in main Estates. <a href="#">Details</a></small>
    </div>
    <button
      type="button"
      class="btn btn-primary text-center btn-block"
      data-toggle="modal"
      data-target=".added-to-cart"
      onclick="addToCart(<?=$productDetails['id'];?>)"
    >
      BUY NOW
    </button>
    <button type="button" class="btn btn-outline-light btn-block text-success"><i class="fas fa-phone"></i> &nbsp; CALL TO BUY</button>
  </div>
  <hr class="m-2"/>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="card-text" id="description">
          <h6 class="mb-2">Description</h6>
          Test Item is one of the most 
          Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Ratione odio voluptates est cum reiciendis vitae temporibus. Quidem, natus eaque,
          obcaecati iure et accusantium omnis non, incidunt architecto quos quis quod?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Ratione odio voluptates est cum reiciendis vitae temporibus. Quidem, natus eaque,
          obcaecati iure et accusantium omnis non, incidunt architecto quos quis quod?
        </div>
      </div>
      <div class="card-footer pt-0 pb-0 text-center">
        <button class="btn btn-outline-light text-primary" id="readMore" onclick="readMoree()">READ MORE...</button>
      </div>
    </div>
  </div>
  
  <div class="container mb-5" id="seller-info">
  <h6 class="text-muted mt-1"><small>SELLER INFORMATION</small></h6>
    <div class="card">
      <div class="card-body border-bottom pt-0 pb-1">
      <div class="d-flex flex-row bd-highlight">
        <div class="bd-highlight mr-5 mt-2"><h6>Description</h6></div>
        <div class="bd-highlight ml-5 mt-2"><a href="#">See Store <i class="fas fa-angle-double-right"></i></a></div>
      </div>
      <div class="d-flex flex-column bd-highlight">
        <div class="bd-hightlight">Seller Score: </div>
        <div class="bd-hightlight">Successful Sales:</div>
        <div class="bd-hightlight">Selling on Our Shop: -- months</div>
      </div>
      </div>
      <div class="card-body border-bottom">
        <div class="row text-center">
          <div class="col-4">5/5</div>
          <div class="col-4">3/5</div>
          <div class="col-4">4/5</div>
        </div>
      </div>
      <div class="card-body">
      <div class="row text-center">
        <div class="col-4"> <img src="/projects/shop/src/img/test_sq.png" alt="" width="80px"> </div>
        <div class="col-4"> <img src="/projects/shop/src/img/test_sq.png" alt="" width="80px"> </div>
        <div class="col-4"> <img src="/projects/shop/src/img/test_sq.png" alt="" width="80px"> </div>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade added-to-cart" id="added-to-cart" tabindex="-1" role="dialog" onclick="remShake()">
  <div class="modal-dialog modal-dialog-centered modal-xs">
    <div class="modal-content p-1 text-center">
      <div class="modal-header pt-0 pb-0" style="border: 0;">
        <h5 class="modal-title">Success!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="remShake()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-info">
        <p>TEST ITEM added to cart.</p>
        <button class="btn btn-outline-light btn-block text-success btn-sm" data-dismiss="modal" id="btnOne">CONTINUE SHOPPING</button>
        <button class="btn btn-primary btn-block btn-sm" id="btnTwo">VIEW CART AND CHECKOUT</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  "use strict"
</script>

<script type="text/javascript">
//Read More Functionality
  var desc = document.getElementById("description");
  var readmore = document.getElementById("readMore");
  var descText = desc.innerHTML.match(/\S+/g);
  var test = descText ? descText.length : 0;
  if (descText.length > 30) {
    desc.innerHTML = descText.slice(0, 25).join(" ") + "...";
    //readmore.innerHTML = "READ MORE...";
  } else {
    // we'll figure out sth
  }
  //read more
  const readMoree = function() {
    if (readmore.innerHTML === "READ MORE...") {
      desc.innerHTML = descText.join(" ");
      readmore.innerHTML = "LESS";  
    } else {
      desc.innerHTML = descText.slice(0, 29).join(" ");
      readmore.innerHTML = "READ MORE...";
    }
    
  };
</script>
<?php echo ob_get_clean();?>