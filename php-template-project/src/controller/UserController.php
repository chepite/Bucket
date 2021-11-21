<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../model/User.php';


class UserController extends Controller {

  public function index(){}
  public function login(){}
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
