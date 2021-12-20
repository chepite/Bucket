<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__.'/../model/Bucketlist.php';
require_once __DIR__.'/../model/Activity.php';
require_once __DIR__.'/../model/Category.php';

class BucketlistController extends Controller {

  public function detail(){
  $bucketlist = Bucketlist::find($_GET['id']);
   $_SESSION['detailBucketlist'] = $_GET["id"];
   $categories= Category::get();
   $_SESSION['categories'] = $categories;
  //  if(!empty($_GET['action']) && !empty($_GET["id"])){
  //     // check if action is delete
  //     if($_GET['action'] == 'delete'){
  //       $bucketlistToDelete = Bucketlist::find($_GET['id']);
  //       $bucketlistToDelete->delete();
  //       header("Location: index.php?page=profile");
  //       exit();
  //       //Bucketlist::destroy($_GET['id']);
  //     }
  //   }

   if(!empty($_POST['action']) && !empty($_GET["id"])){
      if($_POST['action'] == 'editBucketlist'){
        //if checkbox isn't checked which means the playlist isn't private the post var isn't set -> workaround with function var $private
        $private= 1;
        $bucketlist->name= $_POST["name"];
        $bucketlist->description = $_POST["description"];
        if(!isset($_POST["isPrivate"])){$private= 0;}
        $bucketlist->isPrivate = $private;
        $errors =Bucketlist::validateBucketlist($bucketlist);
        if(empty($errors)){
          $bucketlist->save();
        }
        else{
          $this->set('errors', $errors);
        }
      }
    }
    if(!empty($_POST['action']) && !empty($_GET["id"])){
      // check if action is adding an activity
      if($_POST['action'] == 'addActivity'){
        $bucketlist= Bucketlist::where("id",$_GET["id"])->first();
          $activity = new Activity();
          $activity->name= $_POST["name"];
          $activity->date= $_POST["date"];
          $activity->place= $_POST["place"];
          $activity->price= $_POST["price"];
          $activity->company= $_POST["company"];
          $activity->category_id= $_POST["category"];
          $error= Activity::validate($activity);
          if(empty($error)){
            $bucketlist->activities()->save($activity);
            header("Location:index.php?page=detail&id=".$_GET["id"]);
            exit();
          }

      }
    }
       if(!empty($_GET['action']) && !empty($_GET["id"])){
      // check if action is adding an activity
      if($_GET['action'] == 'deleteActivity'){
          $bucketlist= Bucketlist::where("id",$_SESSION["detailBucketlist"])->first();
          $activityToDelete= $bucketlist->activities()->where("activity_id", $_GET["Activityid"])->delete();
          //$activityToDelete->delete();
          header("Location:index.php?page=detail&id=".$_SESSION["detailBucketlist"]);
          exit();
      }
    }
  $this->set("bucketlist", $bucketlist);
     $this->set("categories", $categories);

  }

  public function detailApi(){
    $activities = Bucketlist::where("id", $_SESSION["detailBucketlist"])->first()->activities;
    echo $activities->toJson();
    exit();
  }

  public function addActivity(){

  }
}
?>
