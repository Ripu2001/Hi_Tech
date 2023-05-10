<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    Protected $fillable = [
        'title','department','status',
    ];

    public function members(){
      return  $this->hasMany(Member::class);
    }
   
}
