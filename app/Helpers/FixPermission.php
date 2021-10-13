<?php


namespace App\Helpers;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class FixPermission
{
    public function assignCustomExcelReportToSF()
    {
        Permission::create(['name' => 'admin.report.index']);
        Permission::create(['name' => 'admin.report.excel']);
        $role = Role::where('name', 'Student Affair')->first();
        $role->givePermissionTo('admin.report.index', 'admin.report.excel');

    }

    public function assignChartReportToSF()
    {
        Permission::create(['name' => 'admin.chart']);
        $role = Role::where('name', 'Student Affair')->first();
        $role->givePermissionTo('admin.chart');

    }

    public function assignSummaryReportToAdmin()
    {
        Permission::create(['name' => 'admin.dashboard.summary']);
        $roles = Role::where('name', 'Student Affair')
            ->orWhere('name', 'Finance')->get();
        foreach ($roles as $role) {
            $role->givePermissionTo('admin.dashboard.summary');
        }

    }

    public function assignInvoiceReportToFinance()
    {
        $role = Role::where('name', 'Finance')->first();
        $permission = Permission::firstOrCreate(['name' => 'admin.invoices.index']);
        $role->givePermissionTo($permission);

        $permission = Permission::firstOrcreate(['name' => 'admin.invoices.summary']);
        $role->givePermissionTo($permission);
    }

    public function logoutAllStudentAffairs()
    {
        $users = User::role('Student Affair')->get();
        foreach ($users as $user) {
            $password = Str::random(8);
            $user->password = Hash::make($password);
            $user->save();
            Auth::loginUsingId($user->id);
            Auth::logoutOtherDevices($password);
            Auth::logout();
            echo "\nName: $user->name";
            echo "\nEmail: $user->email";
            echo "\nPassword: $password";
        }

    }
}
