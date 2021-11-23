<?php

use \Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Activity extends Model {
=======
<<<<<<< HEAD:php-template-project/src/model/User.php
class User extends Model {
=======
class Activity extends Model {
>>>>>>> main:php-template-project/src/model/Activity.php
>>>>>>> main
  // refer to a database table, an object us used here for demo purposes
  public $timestamps = false;

  public function bucketlist(){
<<<<<<< HEAD
    return $this-> belongsTo(Bucketlist::class);
=======
<<<<<<< HEAD:php-template-project/src/model/User.php
    return $this->belongsToMany(Bucketlist::class);
=======
    return $this-> belongsTo(Bucketlist::class);
>>>>>>> main:php-template-project/src/model/Activity.php
>>>>>>> main
  }
}
