<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions untuk User Management
        $permissions = [
            'user-create',
            'user-read',
            'user-update',
            'user-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create Permissions untuk Role Management (hanya admin)
        $rolePermissions = [
            'role-create',
            'role-read',
            'role-update',
            'role-delete',
        ];

        foreach ($rolePermissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create Permissions untuk Permission Management (hanya admin)
        $permissionPermissions = [
            'permission-create',
            'permission-read',
            'permission-update',
            'permission-delete',
        ];

        foreach ($permissionPermissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create Roles dan assign permissions

        // Role: Admin - Full Access (CRUD semua)
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Role: Staff - Read dan Update User
        $staffRole = Role::create(['name' => 'staff']);
        $staffRole->givePermissionTo(['user-read', 'user-update']);

        // Role: User - Read Only User
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(['user-read']);

        // Create super admin user (optional)
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        // Create staff user (optional)
        $staff = User::create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'username' => 'staff',
            'password' => bcrypt('password'),
        ]);
        $staff->assignRole('staff');

        // Create regular user (optional)
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'username' => 'user',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('user');

        $this->command->info('Roles and Permissions seeded successfully!');
    }
}
