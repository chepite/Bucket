<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__.'/../model/Bucketlist.php';
require_once __DIR__.'/../model/Activity.php';


class BucketlistController extends Controller {



  public function detail(){
  $bucketlist = Bucketlist::find($_GET['id']);

   $_SESSION['detailBucketlist'] = $_GET["id"];
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
      // check if action is delete
      if($_POST['action'] == 'editBucketlist'){
        //if checkbox isn't checked which means the playlist isn't private the post var isn't set -> workaround with function var $private
        $private= 1;
        $bucketlist->name= $_POST["name"];
        $bucketlist->description = $_POST["description"];
        if(!isset($_POST["isPrivate"])){$private= 0;}
        $bucketlist->isPrivate = $private;

        $errors =Bucketlist::validate($bucketlist);
        if(empty($errors)){
          $bucketlist->save();
          // header("Location: index.php?page=detail?id=".$_SESSION["id"]);
          // exit();
        }
        else{
          $this->set('errors', $errors);
        }
      }
    }
  $this->set("bucketlist", $bucketlist);
  }

  public function detailApi(){
    $activities = Bucketlist::where("id", $_SESSION["detailBucketlist"])->first()->activities;
    echo $activities->toJson();
    exit();
  }
}
?>