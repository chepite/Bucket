
<?php

use \Illuminate\Database\Eloquent\Model;

class Activity extends Model {
  public function Bucketlist(){
    return $this->belongsToMany(Bucketlist::class);
  }

  public static function validate(){
    if(empty($data['name'])){
      $errors['name'] = 'Please fill in a name for the activity';
    }
  }

}
?>
