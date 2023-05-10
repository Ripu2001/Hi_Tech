<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    Protected $fillable = [
        'title','description','image_path','video_id','status','link'
    ];

    public function categories(){
        return $this->belongsToMany(PortfolioCategory::class,'portfolio_category');
    }
}
