<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__.'/../model/Bucketlist.php';
require_once __DIR__.'/../model/Activity.php';
require_once __DIR__.'/../model/Category.php';
require_once __DIR__.'/../model/Like.php';


class BucketlistController extends Controller {

  public function detail(){
  //find user for likes
  $user= User::find($_SESSION["userId"]);
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
          $bucketlist= Bucketlist::where("id",$_GET["id"])->first();
          $activityToDelete= $bucketlist->activities()->where("activity_id", $_GET["Activityid"])->delete();
          //$activityToDelete->delete();
          header("Location:index.php?page=detail&id=".$_GET["id"]);
          exit();
      }
    }
    //liking bucketlists
    if(!empty($_POST['action']) && !empty($_GET["id"])){
      // check if action is liking
      if($_POST['action'] == "like"){
        $like= $user->likes()->where("bucketlist_id", $_GET["id"])->first();
        if($like === null){
          $newLike= new Like();
          $newLike->user_id= $_SESSION["userId"];
          $newLike->bucketlist_id= $_GET["id"];
          $errors= Like::validate($newLike);

          if(empty($errors)){
            $user->likes()->save($newLike);
            //$newLike->save();
           // header("Location:index.php?page=detail&id=".$_GET["id"]);
            //exit();
           }
          else{
            echo($errors);
          }
        }
        else{
          $user->likes()->where("bucketlist_id", $_GET["id"])->delete();
          echo("del");
          echo($user->likes);
        }
      }
    }
    $this->set("title", "detail");
    $this->set("user", $user);
  $this->set("bucketlist", $bucketlist);
     $this->set("categories", $categories);

  }

  public function detailApi(){
    $activities = Bucketlist::where("id", $_GET["id"])->first()->activities;
    echo $activities->toJson();
    exit();
  }

  public function addActivity(){

  }

}
?>
