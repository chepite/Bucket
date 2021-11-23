<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/User.php';


class UserController extends Controller {

  public function index(){}
 public function login()
    {
        // $errors= [];
        if (!empty($_POST['action'])) {
            if ($_POST['action'] == 'login') {
                //test errors
                $errors=[];
                $tryingUser = User::where('username', $_POST['username'])->first();
                if (!empty($tryingUser)) {
                    if ($tryingUser->password == $_POST['password']) {
                        //check for update streak
                        //$this->_updateStreak($tryingUser);
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
                    //echo ('<p>no such user</p>');
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
                        $user->password = $_POST['password'];
                        $user->save();
                        $_SESSION['userId'] = $user->id;
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['password'] = $_POST['password'];
                        header('Location: index.php?page=profile');
                        // exit();
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
    public function profile(){}

}
