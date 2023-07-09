<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'name'=>'Super Admin',
            'designation'=>'Super Admin',
            'office_name'=>'Office of the Chairman',
            'number'=>'0100',
            'email'=>'sadmin@sadmin.com',
            'password'=>bcrypt('1234'),
            'profile' => 'user.avif'
        ]);

        $admin = User::create([
            'name'=>'Admin',
            'designation'=>'Admin',
            'office_name'=>'Office of the Chairman',
            'number'=>'0100',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('1234')
        ]);

        $doctor = User::create([
            'name'=>'Doctor',
            'designation'=>'Doctor',
            'office_name'=>'Office of the Chairman',
            'number'=>'0100',
            'email'=>'doctor@doctor.com',
            'password'=>bcrypt('1234')
        ]);

        $controller_officer = User::create([
            'name'=>'Controller Officer',
            'designation'=>'CMO',
            'office_name'=>'Office of the Chairman',
            'number'=>'0100',
            'email'=>'controller@controller.com',
            'password'=>bcrypt('1234')
        ]);

        $committee = User::create([
            'name'=>'Committee',
            'designation'=>'Committee',
            'office_name'=>'Office of the Chairman',
            'number'=>'0100',
            'email'=>'committee@committee.com',
            'password'=>bcrypt('1234')
        ]);

        $management_committee = User::create([
            'name'=>'Management Committee',
            'designation'=>'Management',
            'office_name'=>'Office of the Chairman',
            'number'=>'0100',
            'email'=>'management@management.com',
            'password'=>bcrypt('1234')
        ]);

        $board = User::create([
            'name'=>'Board',
            'designation'=>'Board',
            'office_name'=>'Office of the Chairman',
            'number'=>'0100',
            'email'=>'board@board.com',
            'password'=>bcrypt('1234')
        ]);


        $admin_role = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $doctor = Role::create(['name' => 'Doctor']);
        $controller_officer = Role::create(['name' => 'Controller Officer']);
        $committee = Role::create(['name' => 'Committee']);
        $management_committee = Role::create(['name' => 'Management Committee']);
        $board = Role::create(['name' => 'Board']);

        $permission = Permission::create(['name' => 'Archive access']);
        $permission = Permission::create(['name' => 'Archive edit']);
        $permission = Permission::create(['name' => 'Archive create']);
        $permission = Permission::create(['name' => 'Archive delete']);

        $permission = Permission::create(['name' => 'Boards application access']);
        $permission = Permission::create(['name' => 'Boards application edit']);

        $permission = Permission::create(['name' => 'Managements application access']);
        $permission = Permission::create(['name' => 'Managements application edit']);

        $permission = Permission::create(['name' => 'Committees application access']);
        $permission = Permission::create(['name' => 'Committees application edit']);

        $permission = Permission::create(['name' => 'Controllers application access']);
        $permission = Permission::create(['name' => 'Controllers application edit']);

        $permission = Permission::create(['name' => 'Doctors application access']);
        $permission = Permission::create(['name' => 'Doctors application edit']);

        $permission = Permission::create(['name' => 'Application access']);
        $permission = Permission::create(['name' => 'Application edit']);
        $permission = Permission::create(['name' => 'Application create']);
        $permission = Permission::create(['name' => 'Application delete']);

        $permission = Permission::create(['name' => 'Budget access']);
        $permission = Permission::create(['name' => 'Budget edit']);
        $permission = Permission::create(['name' => 'Budget create']);
        $permission = Permission::create(['name' => 'Budget delete']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);


        $super_admin->assignRole($admin_role);

        $admin_role->givePermissionTo(Permission::all());
    }
}
