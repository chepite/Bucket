<main>
  <?php
if(!empty($_SESSION['userId'])){
echo('<p class="welcome__text">welcome back ' . $_SESSION['username'] . '</p>');
}?>
  <!-- search form -->
<form action="index.php" class="searchform">
    <div class="formLine">
    <label for="search"></label>
    <input class="search__bar" type="text" placeholder="Looking for new lists?" required name="searchtext" value="<?php
          if (!empty($_GET['searchtext'])) echo $_GET['searchtext'];?>">
    <input class="submit__button hidden" type="submit">
    </div>


</form>
<!-- end search form -->

<div class="bucketlists">
</div>
  <div class="main__content--wrapper">
    <img class="main__illustration" src="./assets/buckitlayerillustration.svg" alt="responsive buck it illustration">
    <div class="CTA__wrapper">
      <div class="CTA__content--wrapper">
        <h3 class="CTA__title">Plan your future with us!</h3>
      <p class="CTA__paragraph">With bucket, you can prepare and personalise bucket lists and start living your life</p>
      <a href="
      <?php 
      if(empty($_SESSION['userId'])){
      echo('index.php?page=login');}
      else{echo('index.php?page=profile');} ?>" class="actual__CTA">Buck it!</a>
      </div>
    </div>
  </div>
  
</main>

<script src="./js/search.js"></script>


