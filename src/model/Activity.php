<?php

use \Illuminate\Database\Eloquent\Model;

class Activity extends Model {
  public function Bucketlist(){
    return $this->belongsToMany(Bucketlist::class);
  }

  public static function validate($data){
    $errors = [];
    if(empty($data['name'])){
      $errors['name'] = 'Please fill in a name for the activity';
    }
    if(empty($data['date'])){
      $errors['date'] = 'Please fill in a category for the date';
    }
    if(empty($data['place'])){
      $errors['place'] = 'Please fill in a category for the place';
    }
    if(empty($data['price'])){
      $errors['price'] = 'Please fill in a category for the price';
    }
    if(empty($data['company'])){
      $errors['company'] = 'Please fill in a category for the company';
    }
    if(empty($data['category_id'])){
      $errors['category_id'] = 'Please fill in a category for the category_id';
    }
    return $errors;
  }
}
?>
