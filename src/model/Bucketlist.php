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

  public static function validatinitialCreate($data){
    $errors= [];
    if(empty($data['name'])){
      $errors['name'] = 'name fault';
    }
    if(empty($data['description'])){
      $errors['description'] = 'description fault';
    }
    if(empty($data['creatorId'])){
      $errors['creatorId'] = 'creatorId fault';
    }
    if(empty($data['isPrivate'])){
      $errors['isPrivate'] = 'isPrivate fault';
    }
    return $errors;
  }
}
