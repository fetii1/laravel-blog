<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles
        $adminRole = Role::create(['name' => 'admin']);
        $authorRole = Role::create(['name' => 'author']);
        $userRole = Role::create(['name' => 'user']);

        //Permissions
        $createPostsPermission = Permission::create(['name' => 'create posts']);
        $editPostsPermission = Permission::create(['name' => 'edit posts']);
        $deletePostsPermission = Permission::create(['name' => 'delete posts']);

        //Get All Users
        $users = User::all();

        foreach($users as $index => $user){
            if ($index < 3){
                $user->assignRole($adminRole);
            }
            elseif ($index < 6){
                $user->assignRole($authorRole);
            }
            else{
                $user->assignRole($userRole);
            }
        }
    }
}
