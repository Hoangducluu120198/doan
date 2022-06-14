<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Roles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        DB::table('admin_roles')->truncate();

        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();


        $admin = Admin::create([
            'admin_name' => 'luudmin',
            'admin_email' => 'luuadmin@123',
            'admin_phone' => '123456789',
            'admin_password' => md5('123')
        ]);

        $author = Admin::create([
            'admin_name' => 'luuauthor',
            'admin_email' => 'luuauthor@123',
            'admin_phone' => '123456789',
            'admin_password' => md5('123')
        ]);

        $user = Admin::create([
            'admin_name' => 'luuuser',
            'admin_email' => 'luuuser@123',
            'admin_phone' => '123456789',
            'admin_password' => md5('123')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

        factory(App\Admin::class, 20)->create();

    }
}
