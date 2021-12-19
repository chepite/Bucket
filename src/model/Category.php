<?php

use \Illuminate\Database\Eloquent\Model;

class Category extends Model {
  public function Bucketlist(){
    return $this->belongsToMany(Bucketlist::class);
  }
}
?>
