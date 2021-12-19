<?php

use \Illuminate\Database\Eloquent\Model;

class Bucketlist extends Model {
  // refer to a database table, an object us used here for demo purposes
  public $timestamps = false;

  public function user(){
    return $this-> belongsTo(User::class);
  }
  public function activities(){
    return $this->belongsToMany(Activity::class);
  }
  public function categories(){
    return $this->belongsToMany(Category::class);
  }

  public static function validatinitialCreate($data){
    $errors= [];
    if(empty($data['name'])){
      $errors['name'] = 'name fault';
    }
    if(empty($data['description'])){
      $errors['description'] = 'description fault';
    }
    if(empty($data['user_id'])){
      $errors['user_id'] = 'creatorId fault';
    }
    if(empty($data['isPrivate'])){
      $errors['isPrivate'] = 'isPrivate fault';
    }

    return $errors;
  }

  public static function validateBucketlist($data){
    $errors= [];
    if(empty($data['name'])){
      $errors['name'] = 'name fault';
    }
    if(empty($data['description'])){
      $errors['description'] = 'description is empty';
    }
    return $errors;
  }
}
