<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__.'/../model/Bucketlist.php';
require_once __DIR__.'/../model/Activity.php';


class BucketlistController extends Controller {



  public function detail(){
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
  }

  public function detailApi(){
    $activities = Bucketlist::where("id", $_SESSION["detailBucketlist"])->first()->activities;
    echo $activities->toJson();
    exit();
  }
}
?>
