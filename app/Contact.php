<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable =  [
      'firstname',
      'lastname',
      'email',
      'phone',
      'birthday',
      'address',
      'city',
      'state',
      'zip',
      'created_at',
      'updated_at'];
}
