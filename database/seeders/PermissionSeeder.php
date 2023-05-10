<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->delete();

        $permissions=[

            // blog module
            ['name' => 'blog-show', 'group'=>'blog' ,'title'=>'show'],
            ['name' => 'blog-create', 'group'=>'blog' ,'title'=>'create'],
            ['name' => 'blog-edit', 'group'=>'blog','title'=>'edit'],
            ['name' => 'blog-delete', 'group'=>'blog','title'=>'delete'],

            // blog-category module
            ['name' => 'blog-category-show', 'group'=>'blog-category','title'=>'show'],
            ['name' => 'blog-category-create', 'group'=>'blog-category' ,'title'=>'create'],
            ['name' => 'blog-category-edit', 'group'=>'blog-category','title'=>'edit'],
            ['name' => 'blog-category-delete', 'group'=>'blog-category','title'=>'delete'],

            // Slider module
            ['name' => 'slider-show', 'group'=>'slider','title'=> 'show'],
            ['name' => 'slider-create', 'group'=>'slider','title'=>'create'],
            ['name' => 'slider-edit', 'group'=>'slider','title'=>'edit'],
            ['name' => 'slider-delete', 'group'=>'slider','title'=>'delete'],

            // pricing module
            ['name' => 'pricing-show', 'group'=>'pricing','title'=> 'show'],
            ['name' => 'pricing-create', 'group'=>'pricing','title'=>'create'],
            ['name' => 'pricing-edit', 'group'=>'pricing','title'=>'edit'],
            ['name' => 'pricing-delete', 'group'=>'pricing','title'=>'delete'],

            // team module
            ['name' => 'team-show', 'group'=>'team','title'=> 'show'],
            ['name' => 'team-create', 'group'=>'team','title'=>'create'],
            ['name' => 'team-edit', 'group'=>'team','title'=>'edit'],
            ['name' => 'team-delete', 'group'=>'team','title'=>'delete'],

            // team-designation module
            ['name' => 'team-designation-show', 'group'=>'team-designation' ,'title'=>'show'],
            ['name' => 'team-designation-create','title'=>'create', 'group'=>'team-designation','title'=>'title'],
            ['name' => 'team-designation-edit', 'group'=>'team-designation','title'=>'edit'],
            ['name' => 'team-designation-delete', 'group'=>'team-designation','title'=>'delete'],

            // service module
            ['name' => 'service-show', 'group'=>'service','title'=>'create'],
            ['name' => 'service-create', 'group'=>'service','title'=>'create'],
            ['name' => 'service-edit', 'group'=>'service','title'=>'edit'],
            ['name' => 'service-delete', 'group'=>'service','title'=>'delete'],

            // section module
            ['name' => 'section-show', 'group'=>'section','title'=> 'show'],
            ['name' => 'section-create', 'group'=>'section','title'=>'create'],
            ['name' => 'section-edit', 'group'=>'section','title'=>'edit'],

            // partner module
            ['name' => 'partner-show', 'group'=>'partner','title'=> 'show'],
            ['name' => 'partner-create', 'group'=>'partner','title'=>'create'],
            ['name' => 'partner-edit', 'group'=>'partner','title'=>'edit'],
            ['name' => 'partner-delete', 'group'=>'partner','title'=>'delete'],

            // portfolio module
            ['name' => 'portfolio-show', 'group'=>'portfolio','title'=>'show'],
            ['name' => 'portfolio-create', 'group'=>'portfolio','title'=>'create'],
            ['name' => 'portfolio-edit', 'group'=>'portfolio','title'=>'edit'],
            ['name' => 'portfolio-delete', 'group'=>'portfolio','title'=>'delete'],

            // portfolio module
            ['name' => 'portfolio-category-show', 'group'=>'portfolio-category','title'=> 'show'],
            ['name' => 'portfolio-category-create', 'group'=>'portfolio-category','title'=>'create'],
            ['name' => 'portfolio-category-edit', 'group'=>'portfolio-category','title'=>'edit'],
            ['name' => 'portfolio-category-delete', 'group'=>'portfolio-category','title'=>'delete'],

            // counter module
            ['name' => 'coutnter-show', 'group'=>'coutnter','title'=> 'show'],
            ['name' => 'coutnter-create', 'group'=>'coutnter','title'=>'create'],
            ['name' => 'coutnter-edit', 'group'=>'coutnter','title'=>'edit'],
            ['name' => 'coutnter-delete', 'group'=>'coutnter','title'=>'delete'],

            // faq module
            ['name' => 'faq-show', 'group'=>'faq','title'=> 'show'],
            ['name' => 'faq-create', 'group'=>'faq','title'=>'create'],
            ['name' => 'faq-edit', 'group'=>'faq','title'=>'edit'],
            ['name' => 'faq-delete', 'group'=>'faq','title'=>'delete'],

            // faq module
            ['name' => 'faq-category-show', 'group'=>'faq-category','title'=> 'show'],
            ['name' => 'faq-category-create', 'group'=>'faq-category','title'=>'create'],
            ['name' => 'faq-category-edit', 'group'=>'faq-category','title'=>'edit'],
            ['name' => 'faq-category-delete', 'group'=>'faq-category','title'=>'delete'],


            // social module
            ['name' => 'social-show', 'group'=>'social','title'=> 'show'],

            // setting
            ['name' => 'setting-show', 'group'=>'social','title'=> 'show'],

            

            // whyChooseUs module
            ['name' => 'whyChooseUs-show', 'group'=>'whyChooseUs','title'=> 'show'],
            ['name' => 'whyChooseUs-create', 'group'=>'whyChooseUs','title'=>'create'],
            ['name' => 'whyChooseUs-edit', 'group'=>'whyChooseUs','title'=>'edit'],
            ['name' => 'whyChooseUs-delete', 'group'=>'whyChooseUs','title'=>'delete'],

            // Testimonial module
            ['name' => 'testimonial-show', 'group'=>'testimonial','title'=> 'show'],
            ['name' => 'testimonial-create', 'group'=>'testimonial','title'=>'create'],
            ['name' => 'testimonial-edit', 'group'=>'testimonial','title'=>'edit'],
            ['name' => 'testimonial-delete', 'group'=>'testimonial','title'=>'delete'],

            // workProcess module
            ['name' => 'workProcess-show', 'group'=>'workProcess' ,'title'=>'show'],
            ['name' => 'workProcess-create', 'group'=>'workProcess','title'=>'create'],
            ['name' => 'workProcess-edit', 'group'=>'workProcess','title'=>'edit'],
            ['name' => 'workProcess-delete', 'group'=>'workProcess','title'=>'delete'],

            // role module
            ['name' => 'role-show', 'group'=>'role' ,'title'=>'show'],
            ['name' => 'role-create', 'group'=>'role','title'=>'create'],
            ['name' => 'role-edit', 'group'=>'role','title'=>'edit'],
            ['name' => 'role-delete', 'group'=>'role','title'=>'delete'],


            // user module
            ['name' => 'user-show', 'group'=>'user' ,'title'=>'show'],
            ['name' => 'user-create', 'group'=>'user','title'=>'create'],
            ['name' => 'user-edit', 'group'=>'user','title'=>'edit'],
            ['name' => 'user-delete', 'group'=>'user','title'=>'delete'],


        ];

        DB::table('permissions')->insert($permissions);
    }
}
