<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        $user = User::create([
            'name'=>'Ripu',
            'email'=>'admin@mail.com',
            'password'=> Hash::make('admin1234'),
            'remember_token'=>'NlPo4Mr4KXcEw2Ltc2ujMwNh15VO405hLCeplSO1kDh7Gzr8r1J7ZnS3jixL'

        ]);

        // Delete Old Roles
        DB::table('roles')->delete();

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
