




<link rel="stylesheet" href="css/detail.css">
<?php
        // de fouten weergeven: in de praktijk bij de velden zelf
        if(!empty($errors)){
            var_dump($errors);
        }
        if(!empty($private)){
            var_dump($private);
        }
    ?>
<h2><?php echo("listId ".$_SESSION["detailBucketlist"])?></h2>
<div>    <a class="edit-link">Edit</a>
<a class="threedot">...</a>
</div>
<div class="editFormDiv">
  <form class="editForm" method="post">
    <input type="hidden" name="action" value="editBucketlist">
    <label for="name">Bucketlist name</label></br>
    <input type="text" name="name" required placeholder="Bucketlist Name" size="32" value="<?php echo $bucketlist['name'] ?>"></br>
    <label for="description">Bucketlist description</label>
    <input type="text" name="description" required placeholder="Bucketlist description" size="255" value="<?php echo $bucketlist['description'] ?>">
    <label for="isPrivate">Make bucketlist private</label></br>
    <input type="checkbox" name="isPrivate" value="<?php if($bucketlist->isPrivate == 1){echo("0");}else{echo("1");}?>" <?php if($bucketlist->isPrivate == 1){echo("checked");}else{echo("");}?>>
      </br>

  <button type="submit" >Submit</button>
  </form>
</div>
<div class="threedotDropDown">
  <ul>
    <li>                <a
                    class="delete-link"
                    href="index.php?page=profile&action=delete&id=<?php echo $_SESSION['detailBucketlist']; ?>"> Delete
                </a></li>
  </ul>
</div>
<ul class="activityList">
</ul>
<a class="addActivityLink" href="">Add new activity</a>
<div class="addActivity">
<form method="post" action="index.php?page=detail&id=<?php echo($_SESSION["detailBucketlist"]);?>">
<input type="hidden" name="action" value="addActivity">
<input type="text" name="name" required placeholder="Bucketlist name" size="32"></br>
    <input type="date" name="date" required placeholder="Bucketlist date"></br>
    <input type="text" name="place" required placeholder="Bucketlist place" size="255"></br>
    <input type="number" name="price" required placeholder="Bucketlist price" ></br>
    <input type="text" name="company" required placeholder="Bucketlist company" size="255"></br>
  <input list="categorydatalist" id="categories" name="category" required/>
    <datalist  id="categorydatalist" name="categorydatalist">
            <select class="categorydatalist--list" name="categorieDataListSelect">
            <?php
            foreach($categories as $category){
             echo ('<option value="'.$category->id.'">'.$category->name.'</option>');
            }
          ?>
            </select>
          </datalist>
<input type="submit" value="add new activity">
</form>
      </div>
  </br>
<a class="addExistingAcitivityLink" href="">Add existing activity</a>
<div class="addExistingActivity">
<form method="post" action="index.php?page=detail&id=<?php echo($_SESSION["detailBucketlist"]);?>">
    <input type="hidden" name="action" value="addExistingActivity">
    <!--option list of activities that the user has made/liked-->
    <!--datalist
      select
        add options
      select
    datalist-->
<input type="submit" value="add existing activity">
</form>
      </div>

<script src="./js/detail.js"></script>
