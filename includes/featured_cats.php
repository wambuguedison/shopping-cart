<?php
  $featuredSql = "SELECT * FROM categories WHERE parent != 0 LIMIT 8";
  $featured = $connect->query($featuredSql);
?>
<div class="container-fluid featured-cats">
  <h5>Featured categories</h5>
  <div class="container-fluid p-0">
    <div class="row">
      <?php while($feature = mysqli_fetch_assoc($featured)) : ?>
      <div class="col-3 p-1 text-center">
        <a href="#">
          <img src="src/img/test_sq.png" alt="test" width="60px">
          <p class="pt-1 mb-2" style="line-height: 12px; font-size: 12px;"><?=$feature['category'];?></p>
        </a>
      </div>
      <br>
      <?php endwhile; ?>
    </div>
  </div>
</div>