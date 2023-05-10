<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingStatus extends Model
{
    use HasFactory;

    public function schedules(){
        return $this->hasMany(MettingSchedule::class);
    }
}
