<main>
  <link rel="stylesheet" href="css/detail.css">
<?php
        // de fouten weergeven: in de praktijk bij de velden zelf
        if(!empty($error)){
            var_dump($error);
        }
        if(!empty($private)){
            var_dump($private);
        }
    ?>
 <h2 class="idvalue hidden"><?php echo($_SESSION["detailBucketlist"])?></h2>
 <?php
 //echo($user->likes->contains(Bucketlist::find($_GET["id"])));
  //likes, als de user hem geliked heeft checkbox = checked anders unchecked, submit moet met js gebeuren op eventlistener change
  if(isset($_SESSION["userId"]) && $_SESSION["userId"] != $bucketlist["user_id"]){
  // echo('
  // <form class="likeForm" method="post">
  //   <input type="hidden" name="action" value="like">
  //            <input class="like" type="checkbox" name="like" value="');
  echo('
  <div class="detail__wrapper--other">
  <div class="bucketlist__title--other">'. $bucketlist["name"] .'</div>
  <div class="description__wrapper--other">
    <p>'. $bucketlist["description"] .'</p>
  </div>
  <div class="like">
  <form class="likeForm" method="post">
    <input type="hidden" name="action" value="like">
    <input class="" type="submit" value="like"></form>
  </div>
  <div class="activ__wrapper--other">
    <ul class="activityList">
    </ul>
  </div>
  </div>');
  }
?>
<?php
if(isset($_SESSION["userId"]) && $_SESSION["userId"]=== $bucketlist["user_id"]){
echo('
<div class="detail__wrapper">
  <div class="bucketlist__title">'. $bucketlist["name"] .'</div>
  <div class="editDiv"><a class="edit-link">Edit</a></div>
  <div class="threedot">
    <a class="threedot__link">...</a>
    <div class="threedotDropdown hidden">
      <a class="delete-link delete" href="index.php?page=profile&action=delete&id='. $_SESSION["detailBucketlist"].'"> Delete Bucketlist </a>
    </div>

  </div>
  <div class="description__wrapper">
    <p>'. $bucketlist["description"] .'</p>
  </div>
  <div class="activ__wrapper">
    <ul class="activityList">
    </ul>
      <li>
      <a class="addActivityLink" href="">Add new activity</a>'
      );

if(isset($_SESSION["userId"]) && $_SESSION['userId']=== $bucketlist["user_id"]){
echo('
<div class="addActivity hidden ">
  <form id="addActivityForm" method="post" action="index.php?page=detail&id='. $_SESSION["detailBucketlist"].'">
  <input type="hidden" name="action" value="addActivity">
  <input class="addName" type="text" name="name" required placeholder="Activity name" size="32"></br>
    <input class="addDate" type="date" name="date" required placeholder="Date"></br>
    <input class="addPlace" type="text" name="place" required placeholder="Place" size="255"></br>
    <input class="addPrice" type="number" name="price" required placeholder="Price" ></br>
    <input class="addCompany" type="text" name="company" required placeholder="Company" size="255"></br>
    <input class="addCategory" list="categorydatalist" id="categories" placeholder="category" name="category" required/>
    <datalist  id="categorydatalist" name="categorydatalist">
            <select class="categorydatalist--list" name="categorieDataListSelect">');

            foreach($categories as $category){
             echo ('<option>'.$category->name.'</option>');
            }
          echo('
            </select>
          </datalist>
  <input class="button button__submit" type="submit" value="add new activity">
  </form>
      </div>
          ');}
echo('</li>');


echo('
  </div>
</div>


</div>
<div class="editFormDiv hidden">
  <form class="editForm" method="post">
    <input type="hidden" name="action" value="editBucketlist">
    <label for="name">Bucketlist name</label></br>
    <input type="text" name="name" required placeholder="Bucketlist Name" size="32" value="'. $bucketlist["name"] .'"></br>
    <label for="description">Bucketlist description</label>
    <input type="text" name="description" required placeholder="Bucketlist description" size="255" value="'. $bucketlist["description"] .'">
    <label for="isPrivate">Make bucketlist private</label></br>
    <input type="checkbox" name="isPrivate" value="'); if($bucketlist->isPrivate == 1){echo('0"');}else{echo('1"');}if($bucketlist->isPrivate == 1){echo("checked>");}else{echo(">");}

     echo('
  <button type="submit" >Submit</button>
  </form>
</div>
');}?>

<?php
// if(isset($_SESSION["userId"]) && $_SESSION['userId']=== $bucketlist["user_id"]){
// echo('
// <a class="addActivityLink" href="">Add new activity</a>
// <div class="addActivity hidden ">
//   <form id="addActivityForm" method="post" action="index.php?page=detail&id='. $_SESSION["detailBucketlist"].'">
//   <input type="hidden" name="action" value="addActivity">
//   <input type="text" name="name" required placeholder="Bucketlist name" size="32"></br>
//     <input type="date" name="date" required placeholder="Bucketlist date"></br>
//     <input type="text" name="place" required placeholder="Bucketlist place" size="255"></br>
//     <input type="number" name="price" required placeholder="Bucketlist price" ></br>
//     <input type="text" name="company" required placeholder="Bucketlist company" size="255"></br>
//     <input list="categorydatalist" id="categories" name="category" required/>
//     <datalist  id="categorydatalist" name="categorydatalist">
//             <select class="categorydatalist--list" name="categorieDataListSelect">');

//             foreach($categories as $category){
//              echo ('<option value="'.$category->id.'">'.$category->name.'</option>');
//             }
//           echo('
//             </select>
//           </datalist>
//   <input type="submit" value="add new activity">
//   </form>
//       </div>
//           ');}?>

<?php
if(isset($_SESSION["userId"]) && $_SESSION["userId"] == $bucketlist["user_id"]){
  echo('
<script src="./js/detail.js"></script>');
}
else{
   echo('
<script src="./js/detailGuest.js"></script>');
}
?>
</main>

