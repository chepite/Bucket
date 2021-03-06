<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Bucketlist.php';
require_once __DIR__ . '/../model/Like.php';




class UserController extends Controller {


 public function profile(){
    if (!empty($_POST['action'])) {
            if ($_POST['action'] == 'addBucketlist') {
              //vind nog manier hoe we de bucketlist gaan maken qua flow
              //main form op profile of eerst klikken en dan bucketlist aanpassen op de
              //detail page van de bucketlist zoals op spotify zelf
              $newBucket = new Bucketlist();
              //tel hoeveel bucketlists de user al heeft en dan
              //is de naam van de bucktlist "bucketlist #x"
              $amountLists= Bucketlist::where('user_id', $_SESSION['userId'])->count();

              $newBucket->name="Bucketlist ".$amountLists;
              $newBucket->description="description";
              $newBucket->user_id=$_SESSION["userId"];
              $newBucket->isPrivate=true;
              $errors= Bucketlist::validatinitialCreate($newBucket);
              if(empty($errors)){
                $newBucket->save();
                header('Location:index.php?page=profile');
                exit();
              }
              else{
                $this->set('errors', $errors);
              }
              $this->set('amountlists', $amountLists);
            }
          }

          if(!empty($_GET['action']) && !empty($_GET["id"])){
      // check if action is delete
      if($_GET['action'] == 'delete'){
        $bucketlistToDelete = Bucketlist::find($_GET['id']);
        $bucketlistToDelete->delete();
        header("Location: index.php?page=profile");
        exit();
        //Bucketlist::destroy($_GET['id']);
      }
    }
    $this->set('title', 'profile');
  }




  public function index(){
    $bucketlists = $this->_getFormSearchResults();
    $this->set('bucketlists', $bucketlists);
    $this->set("title", "home");

    //test leaderboard
    $popularid= Like::select("Bucketlist_id")->groupBy('Bucketlist_id')->orderByRaw('COUNT(*) DESC')
    ->limit(3)
    ->get();
    //how to get the id
    // echo($popular[0]["Bucketlist_id"]);
    $popular = [];
     if(isset($popularid[0])){
      array_push($popular,Bucketlist::where("id", $popularid[0]["Bucketlist_id"])->first());}
       if(isset($popularid[1])){
      array_push($popular,Bucketlist::where("id", $popularid[1]["Bucketlist_id"])->first());}
       if(isset($popularid[2])){
      array_push($popular,Bucketlist::where("id", $popularid[2]["Bucketlist_id"])->first());}
    $this->set("popular", $popular);
    //end test leaderboard
  }
 public function login()
    {
        // $errors= [];
        if (!empty($_POST['action'])) {
            if ($_POST['action'] == 'login') {
                //test errors
                $errors=[];
                $tryingUser = User::where('username', $_POST['username'])->first();
                if (!empty($tryingUser)) {
                    // if ($tryingUser->password == $_POST['password']) {
                        if (password_verify($_POST['password'],$tryingUser->password)) {
                        $_SESSION["loggedin"] = true;
                        $_SESSION["username"] = $tryingUser->username;
                        $_SESSION["userId"] = $tryingUser->id;
                        header('Location: index.php?page=profile');
                        exit();
                    } else {
                        //echo ('<p>password incorrect, try again</p>');
                         $errors['incorrectPassword']= 'Password incorrect, try again.';
                    }
                } else {
                     $errors['noUser']= "User doesn't exist.";
                }
                $this->set('errors', $errors);
            }
        }
        if (!empty($tryingUser)) {
            $this->set('user', $tryingUser);
        }
        $this->set('title', 'login');
  }

  public function signup()
    {
        // session_start();
        //make user if handle ok
        if (!empty($_POST["action"])) {
            //start making basic username, password user
            if ($_POST["action"] === "addUser") {
                //check if username already exists, if not continue
                if (!User::where('username', $_POST['username'])->get()->count() != 0) {
                    //validate form
                    $user = new User;
                    $user->username = $_POST['username'];
                    $user->password = $_POST['password'];
                    $user->repeatPassword = $_POST['repeatPassword'];
                    $errors = User::validatesignup($user);
                    if (empty($errors)) {
                        $user = new User;
                        $user->username = $_POST['username'];
                        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $user->save();
                        $_SESSION['userId'] = $user->id;
                        $_SESSION['username'] = $_POST['username'];
                        // $_SESSION['password'] = $_POST['password'];
                        $_SESSION['password'] = $user-> password;
                        header('Location: index.php?page=profile');
                        //exit();
                    } else {
                        $this->set('errors', $errors);
                    }
                } else {
                    $errors['user exists'] = 'user already exists';
                    $this->set('errors', $errors);
                }
            }
        }
        $this->set('title', 'signup');
    }

    public function bucketlistApi(){
      $lists = User::where('id', $_SESSION['userId'])->first()->bucketlist;
      echo $lists->toJson();
      exit();
    }
    public function searchApi(){
      $bucketlists = $this->_getFormSearchResults();
      echo $bucketlists->toJson();

      exit();

    }

    private function _getFormSearchResults() {
        $bucketlistQuery = Bucketlist::query();
      if(!empty($_GET['searchtext'])){
        $bucketlistQuery =$bucketlistQuery->where("name", "like", "%".$_GET["searchtext"]."%");
      }
      $bucketlists = $bucketlistQuery->where("isPrivate", "0")->limit(100)->get();

      return $bucketlists;
    }


}

?>
