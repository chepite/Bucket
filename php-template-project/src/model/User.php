<?php

use \Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
<<<<<<< HEAD:php-template-project/src/model/User.php
class User extends Model {
=======
class Activity extends Model {
>>>>>>> main:php-template-project/src/model/Activity.php
=======
class User extends Model {
>>>>>>> main
  // refer to a database table, an object us used here for demo purposes
  public $timestamps = false;

  public function bucketlist(){
<<<<<<< HEAD
<<<<<<< HEAD:php-template-project/src/model/User.php
    return $this->belongsToMany(Bucketlist::class);
=======
    return $this-> belongsTo(Bucketlist::class);
>>>>>>> main:php-template-project/src/model/Activity.php
=======
    return $this->belongsToMany(Bucketlist::class);
  }

  public static function validatesignup($data){
    $errors = [];

    if(empty($data['username'])){
      $errors['username'] = 'Please fill in a username';
    }
    if(strlen($data['username'])>=32){
      $errors['tooLong'] = 'Username too long, max 32 characters';
    }
    if(empty($data['password'])){
      $errors['password'] = 'Please fill in an password';
    }
    if(strlen($data['password']) < 8){
      $errors['passwordLength']= 'Password should more than 8 characters long';
    }
    if(empty($data['repeatPassword'])){
      $errors['repeatPassword'] = 'please repeat the password';
    }
    if($data['password'] != $data['repeatPassword']){
      $errors['password mismatch'] = 'please repeat the password correctly to resume';
    }
    return $errors;
>>>>>>> main
  }
}
