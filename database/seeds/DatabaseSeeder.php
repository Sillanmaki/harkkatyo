<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // Make home role
        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        // Make default home user
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admin@my.my',
            'password' => bcrypt('adminadmin'),
        ]);

        $adminUser->attachRole($adminRole);

        Role::create([
            'name' => 'Member',
            'slug' => 'member',
        ]);
    }
}
