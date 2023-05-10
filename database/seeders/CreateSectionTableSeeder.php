<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class CreateSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('sections')->delete();

        
        $sections = [
            ['title' => 'Latest Blog', 'slug' => 'blog', 'description' => ''],
            ['title' => 'Our Portfolios', 'slug' => 'portfolio', 'description' => ''],
            ['title' => 'Our Services', 'slug' => 'services', 'description' => ''],
            ['title' => 'Our Pricing', 'slug' => 'pricing', 'description' => ''],
            ['title' => 'Meet Our Teams', 'slug' => 'team', 'description' => ''],
            ['title' => 'Answer & Questions', 'slug' => 'faqs', 'description' => ''],
            ['title' => 'Our Partners', 'slug' => 'clients', 'description' => ''],
            ['title' => 'Our Clients Reviews', 'slug' => 'testimonials', 'description' => ''],
            ['title' => 'How We Make Work Successful', 'slug' => 'process', 'description' => ''],
            ['title' => 'Why Choose Us', 'slug' => 'why-us', 'description' => ''],
            ['title' =>'About Us', 'slug' => 'about-us','description'=> ''],
        ];

        DB::table('sections')->insert($sections);
    }
}
