<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    Protected $fillable = [
        'name','facebook','twitter','instagram','linkedin','email','website','phone','status',
    ];

    public function designation(){
        return $this->belongsTo(Designation::class);
    }
}
