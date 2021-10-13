<?php

use Illuminate\Database\Seeder;

class PermissionDisplayNameSeeder extends Seeder
{
    use CommandOutput;
    protected $permissions = [
        //name => display_name
        'admin.dashboard' => 'View admin dashboard',
        'admin.dashboard.summary' => 'Calculate Custom Dashboard Summary',
        'admin.logout' => 'Admin logout',
        'admin.acceptance.index' => 'View unchecked forms',
        'admin.acceptance.approve' => 'Approve Form',
        'admin.payment_receive.index' => 'View unpaid forms',
        'admin.payment_receive.approve' => 'Accept payment',
        'admin.invoices.index' => 'View invoices',
        'admin.invoices.summary' => 'View invoices summary',

        'admin.enrollment.index' => 'Show all registration forms to admin',
        'admin.enrollment.store' => 'Save registration form by admin',
        'admin.enrollment.create' => 'View registration form by admin',
        'admin.enrollment.show' => 'View registration form detail by admin',
        'admin.enrollment.update' => 'Update registration form by admin',
        'admin.enrollment.destroy' => 'Delete registration form by admin',
        'admin.enrollment.edit' => 'Edit registration form by admin',

        'enroll.index' => 'Show all registration forms to user',
        'enroll.store' => 'Save registration form by user',
        'enroll.create' => 'View registration form by user',
        'enroll.show' => 'View registration form detail by user',
        'enroll.update' => 'Update registration form by user',
        'enroll.destroy' => 'Delete registration form by user',
        'enroll.edit' => 'Edit registration form by user',

        'admin.role.change.show' => 'View Roles and Permissions',
        'admin.role.change.update' => 'Update permissions of roles',

        'student.dashboard' => 'View student dashboard',

        'admin.report.index' => 'Show Custom Report page to admin',
        'admin.report.excel' => 'Export Custom Excel by admin',


    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->progressStart(count($this->permissions));
        foreach ($this->permissions as $name => $display_name) {
            \Illuminate\Support\Facades\DB::table('permissions')
                ->where('name', $name)
                ->update(['display_name' => $display_name]);
            $this->progressAdvance();
        }
        $this->progressFinish();
    }
}
