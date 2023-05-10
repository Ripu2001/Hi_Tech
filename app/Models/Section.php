<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;


    // Section Title
    static public function section($slug)
    {
    	$section = Section::where('slug', $slug)
    					->where('status', 1)
    					->first();

    	return $section;
    }
}
