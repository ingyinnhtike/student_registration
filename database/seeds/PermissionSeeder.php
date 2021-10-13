<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    private $routes = [
        'admin' => [
            'dashboard',
            'dashboard.summary',
            'logout',
            'acceptance.index',
            'acceptance.approve',
            'payment_receive.index',
            'payment_receive.approve',
            'role.change.show',
            'role.change.update',
            'report.index',
            'report.excel',
            'invoices.index',
            'invoices.summary',
            'resources' => [
                'enrollment',

            ],
        ],
        'student.dashboard',
        'resources' => [
            'enroll'
        ]
    ];

    private $resource_routes = [
        'index', 'store', 'create', 'show', 'update', 'destroy', 'edit'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->routes as $key => $route) {
            $permission = '';
            if ($key === 'admin') {
                foreach ($route as $key2 => $admin_route) {
                    if ($key2 === 'resources') {
                        foreach ($admin_route as $key3 => $resource_name) {
                            foreach ($this->resource_routes as $resource_route) {
                                $this->createPermission("admin.$resource_name.$resource_route");
                            }
                        }
                    } else {
                        $this->createPermission("admin.$admin_route");
                    }
                }
            } else {
                if ($key === 'resources') {
                    foreach ($route as $key2 => $resource_name) {
                        foreach ($this->resource_routes as $resource_route) {
                            $this->createPermission("$resource_name.$resource_route");
                        }
                    }
                } else {
                    $this->createPermission($route);
                }
            }

        }

    }

    private function createPermission($name)
    {
        Permission::create(['name' => $name]);
    }
}
