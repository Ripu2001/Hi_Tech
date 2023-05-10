<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use HasFactory;

    Protected $fillable = [
        'title','description','status',
    ];

    public function portfolios(){
        return $this->belongsToMany(Portfolio::class,'portfolio_category');
    }
}
