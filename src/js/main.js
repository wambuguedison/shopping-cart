"use strict";

const print = input => console.log(input);

function wishtest(params) {
  print(params);
}

if (navigator.cookieEnabled === false) {
  alert("Please Enable Cookies");
  if (window.location.href != "http://localhost/projects/shop/index.php") {
    window.location.assign("index.php");
  }
}

//NAvbar Toggle
$(function() {
  //"use strict"
  $('[data-toggle="offcanvas"]').on("click", function() {
    $(".offcanvas-collapse").toggleClass("open");
  });
});

//enable tooltip/popover
$(function() {
  $('[data-toggle="popover"]').popover({
    html: true,
    container: "body",
    trigger: "focus"
  });
});
//search
$(document).ready(function() {
  $("input.typeahead").typeahead({
    source: function(query, process) {
      return $.get(
        "core/search.php",
        {
          query: query
        },
        function(data) {
          data = $.parseJSON(data);
          return process(data);
        }
      );
    },
    showHintOnFocus: "all"
  });
});

//get item id
const details = function(id) {
  localStorage.detailsId = id;
  window.location.assign("details.php");
};
//details page
if (window.location.href === "http://localhost/projects/shop/details.php") {
  $.ajax({
    url: "includes/details_backend.php",
    method: "POST",
    data: { detailsId: localStorage.detailsId },
    success: function(data) {
      $("#details").html(data);
    },
    error: function() {
      alert("Something went wrong!");
    }
  });
  console.log(localStorage.InWishListStatus, "testing");
} //end checking if in details page

//get category id
const category = function(id) {
  localStorage.categoryId = id;
  window.location.assign("category.php");
};
//category Page
if (window.location.href === "http://localhost/projects/shop/category.php") {
  $.ajax({
    url: "includes/category_backend.php",
    method: "POST",
    data: { categoryId: localStorage.categoryId },
    success: function(data) {
      $("#category").html(data);
    },
    error: function() {
      alert("Something went wrong!");
    }
  });
}
//top options {filter},{stack/list}
const stack_list = function() {
  let stackList = document.querySelector("#stack_list");
  if ($("#stack_list").hasClass("fa-grip-vertical")) {
    $("#stack_list").toggleClass("fa-list");
  }
  //if ($("#stack_list").hasClass("fa-list")) {
  //$("#stack_list").toggleClass("fa-grip-vertical, fa-list");
  //}
};

//add to wishlist

function wishLisst(id, loginStatus) {
  let url = "core/add_to_wishlist.php";
  let wishListId = id;
  if (loginStatus == 0) {
    //login First
    $("#added-to-cart h5").html("login");
    $("#modal-info p").html("You Need to Login / Register first.");
    $("#modal-info #btnOne").html("REGISTER");
    $("#modal-info #btnTwo").html("LOGIN");
    $("#added-to-cart").modal();
  }
  if (loginStatus == 1) {
    fetch(url, {
      method: "post",
      headers: {
        "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
      },
      body: wishListId
    })
      .then(json)
      .then(function(data) {
        print("request succeeded with ...." + data);
        $("#added-to-cart h5").html("login");
        $("#modal-info p").html("Your item was saved successfully");
        $("#modal-info #btnOne").html("CONTINUE SHOPPING");
        $("#modal-info #btnTwo").html("VIEW SAVED ITEMS");
        $("#added-to-cart").modal();
      })
      .catch(function(error) {
        print("request failed", error);
      });
  }
}
//rate
/* /THIS BE GIVING ME HELL/
let totalRating = document.getElementById("totalRating");
let rateStar = document.getElementsByClassName("rateStar");
let rating = 0;

const one = function() {
  print(rateStar[0].classList);
  if (rateStar[0].classList[0] == "far") {
    rating = 1;
    rateStar[0].classList.remove("far");
    rateStar[0].classList.add("fas");
    totalRating.innerHTML = rating;
  } else {
    if (rateStar[0].classList[2] == "far") {
      rating = 1;
      rateStar[0].classList.remove("far");
      rateStar[0].classList.add("fas");
    } else {
      rateStar[0].classList.add("far");
      rateStar[0].classList.remove("fas");
      rating = 0;
    }
  }
}; */
//add  to cart
const addToCart = function(id) {
  $.ajax({
    url: "core/add_to_cart.php",
    method: "POST",
    data: { addToCartID: id },
    success: function(data) {
      console.log(data);
    },
    error: function() {
      alert("Something went wrong!");
    }
  });
  var cart = document.getElementById("cart");
  /*Var to Ensure we access it in RemShake */
  let bdg = document.getElementById("bdg");
  let total = Number(bdg.innerHTML);
  total += 1;

  $("#added-to-cart h5").html("Success");
  $("#modal-info p").html("Your Item has been added to cart.");
  $("#modal-info #btnOne").html("CONTINUE SHOPPING");
  $("#modal-info #btnTwo").html("VIEW CART AND CHECKOUT");

  cart.classList.add("shake");
  bdg.innerHTML = String(total);
};
const remShake = function() {
  /* Remove shake class */
  cart.classList.remove("shake");
};

/* top picks
var topPicksTitle = document.querySelectorAll("#topPicksName");
var titleLength = topPicksTitle.innerHTML.match(/\S+/g);
//var titleLength = topPicksTitle[index].innerHTML.match(/\S+/g);
if (titleLength.length > 5) {
  topPicksTitle[index].innerHTML = titleLength.slice(0, 4).join(" ") + "...";
  print("yes");
} */

// keep us upto date on the copyright
document.addEventListener("DOMContentLoaded", function(event) {
  var date = new Date();
  var date = date.toDateString();
  var year = date.split(" ")[3];
  var footer = document.getElementById("copyright");
  var copyright = footer.innerHTML;
  var copyrightYear = copyright.split(" ")[1];

  if (year > copyrightYear) {
    footer.innerHTML = copyright + " - " + year;
  } else {
    footer.innerHTML = copyright.split(" ")[0] + " " + year;
  }
});
