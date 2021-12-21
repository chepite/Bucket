<?php

use \Illuminate\Database\Eloquent\Model;

class Like extends Model {
  public function bucketlist(){
    return $this->belongsTo(Bucketlist::class);
  }
  public function user(){
    return $this->belongsTo(User::class);
  }

  public static function validate($data){
    $errors=[];
    if(empty($data['user_id'])){
      $errors['user_id'] = 'No user_id found, are you logged in?';
    }
    if(empty($data['bucketlist_id'])){
      $errors['bucketlist_id'] = 'No bucketlist_id found';
    }
    return $errors;
  }
}
?>
