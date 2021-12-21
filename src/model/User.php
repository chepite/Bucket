<?php

use \Illuminate\Database\Eloquent\Model;

class User extends Model {
  // refer to a database table, an object us used here for demo purposes
  public $timestamps = false;

  public function bucketlist(){
    return $this->hasMany(Bucketlist::class);
  }
  public function likes(){
    return $this->hasMany(Like::class);
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
  }
}
