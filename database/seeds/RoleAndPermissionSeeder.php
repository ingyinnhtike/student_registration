<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();
        $roles->each(function ($role) {

            if ($role->name === 'Super Admin') {
                // super admin is defined in gate
                // no need to assign any permission
            } elseif ($role->name === 'Student') {

                $permissions = Permission::whereIn('name', [
                    'enroll.index', 'enroll.create', 'enroll.store', 'enroll.show',
                    'student.dashboard'
                ])->get();

                $role->syncPermissions($permissions);
            } elseif ($role->name === 'Student Affair') {
                $permissions = Permission::whereIn('name', [
                    'enroll.index', 'enroll.show', 'enroll.update', 'enroll.edit',
                    'admin.acceptance.index', 'admin.acceptance.approve',
                    'admin.payment_receive.index',
                    'admin.report.index', 'admin.report.excel',
                    'admin.invoices.index', 'admin.invoices.summary',
                    'admin.dashboard', 'admin.dashboard.summary', 'admin.logout',
                    'admin.enrollment.index', 'admin.enrollment.show',
                    'admin.enrollment.update', 'admin.enrollment.edit'
                ])->get();
                $role->syncPermissions($permissions);
            } elseif ($role->name === 'Finance') {
                $permissions = Permission::whereIn('name', [
                    'enroll.index', 'enroll.show',
                    'admin.payment_receive.index', 'admin.payment_receive.approve',
                    'admin.invoices.index', 'admin.invoices.summary',
                    'admin.dashboard', 'admin.dashboard.summary', 'admin.logout',
                    'admin.enrollment.index', 'admin.enrollment.show',
                ])->get();
                $role->syncPermissions($permissions);
            }
        });
    }
}
