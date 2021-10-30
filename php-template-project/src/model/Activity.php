<?php

use \Illuminate\Database\Eloquent\Model;

class Activity extends Model {
  // refer to a database table, an object us used here for demo purposes
  public $timestamps = false;

  public function bucketlist(){
    return $this-> belongsTo(Bucketlist::class);
  }
}
