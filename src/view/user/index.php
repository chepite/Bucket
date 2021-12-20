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


