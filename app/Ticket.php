<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $fillable = ['title', 'body'];

  public function users(){
    return $this -> belongsToMany(User::class);
  }

  public function notes(){
    return $this -> hasMany(Note::class);
  }

  public function topic(){
    return $this -> belongsTo(Topic::class);
  }
}
