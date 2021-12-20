<?php
if(empty($_SESSION['userId'])){
  echo('
<div class="button__wrapper"><a class="button__login" href="index.php?page=login">login</a></div>' );
}
else{
  echo('<p class="welcome__text">welcome back ' . $_SESSION['username'] . '</p>');
  echo('<br><div class="button__wrapper"><a href="index.php?page=profile">Profile</a></div>
');
echo('<br><div class="button__wrapper"><a href="destroy.php"> Log Out</a></div>
');
}
?>
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

<script src="./js/search.js"></script>


