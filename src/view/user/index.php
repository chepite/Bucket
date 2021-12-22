<main>
  <?php
if(!empty($_SESSION['userId'])){
echo('<p class="welcome__text">welcome back ' . $_SESSION['username'] . '</p>');
}?>
  <!-- search form -->
<form action="index.php" class="searchform">
    <div class="formLine search">
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
  <div class="placeholder__slogan">
      <p class="slogan">Buck it! Just live a little!</p>
  </div>
  <div class="leaderboard__wrapper">
    <div class="leaderboard__title--wrapper">
        <h4 class="leaderboard__title">
          ...Most popular lists...
        </h4>
    </div>
    <div class="leaderboard">
        <?php
    if(isset($popular[0])){
      echo('
        <div class="bucketlist__wrapper">
          <a href="index.php?page=detail&id='. $popular[0]->id .'">
            <div class="placement"><p>1st</p></div>
            <div class="bucketlist__name">' . $popular[0]->name . '</div>
            <div class="bucketlist__description"><p>Description:</p>'. $popular[0]->description .'</div>
          </a>
        </div>');}
      if(isset($popular[1])){
      echo('
        <div class="bucketlist__wrapper">
          <a href="index.php?page=detail&id='. $popular[1]->id .'">
            <div class="placement"><p>2nd</p></div>
            <div class="bucketlist__name">' . $popular[1]->name . '</div>
            <div class="bucketlist__description"><p>Description:</p>'. $popular[1]->description .'</div>
          </a>
        </div>');}
      if(isset($popular[2])){
      echo('
        <div class="bucketlist__wrapper">
          <a href="index.php?page=detail&id='. $popular[2]->id .'">
            <div class="placement"><p>3rd</p></div>
            <div class="bucketlist__name">' . $popular[2]->name . '</div>
            <div class="bucketlist__description"><p>Description:</p>'. $popular[2]->description .'</div>
          </a>
        </div>');}
    ?>
    

  </div>

</main>

<script src="./js/search.js"></script>


