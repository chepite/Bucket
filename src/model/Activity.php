
<?php

use \Illuminate\Database\Eloquent\Model;

class Activity extends Model {
  public function Bucketlist(){
    return $this->belongsToMany(Bucketlist::class)
  }
  
}
?>
