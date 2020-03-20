<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
  protected $fillable = ['name'];

  public function users(){
    return $this -> belongsToMany(User::class);
  }

  public function tickets(){
    return $this -> hasMany(Ticket::class);
  }
}
