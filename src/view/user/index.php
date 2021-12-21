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
  </div>
</main>

<script src="./js/search.js"></script>


