<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Role_user;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        DB::table('role_user')->truncate();
        //$admin_role = Role::where('name', 'admin')->first();
        $roles = Role::get();
        
        foreach($roles as $role){
            $email = $role->name.'@'.config('app.domain');
            $user = User::create([
                'name' => $role->name,
                'username' => $role->name,
                'email' => $email,
                'password' => Hash::make('password'),
                'status' => 'active'
            ]);
            // $insert_user_role = Role_user::create([
            //     'role_id' => $role->id,
            //     'user_id' => $user->id
            // ]);
            $user->roles()->attach($role);
        }
        // $admin = User::create([
        //     'name' => 'admin',
        //     'username' => 'admin',
        //     'email' => 'admin@tms.ph',
        //     'password' => Hash::make('password'),
        //     'status' => 'active'
        // ]);
        // $insert_role_admin = Role_user::create([
        //     'role_id' => $admin_role->id,
        //     'user_id' => $admin->id
        // ]);
        //$admin->roles()->attach($admin_role);
    }
}
