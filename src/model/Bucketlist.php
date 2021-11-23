<?php

use \Illuminate\Database\Eloquent\Model;

class Bucketlist extends Model {
  // refer to a database table, an object us used here for demo purposes
  public $timestamps = false;

  public function user(){
    return $this-> belongsTo(User::class);
  }
  public function activities(){
    return $this->hasMany(Activity::class);
  }
}
