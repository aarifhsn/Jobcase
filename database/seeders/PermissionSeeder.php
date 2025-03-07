<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                "name" => "Create Role",
                "slug" => "create-role",
                "description" => "Create Role",
            ],
            [
                "name" => "View Role",
                "slug" => "view-role",
                "description" => "View Role",
            ],
            [
                "name" => "Update Role",
                "slug" => "update-role",
                "description" => "Update Role",
            ],
            [
                "name" => "Delete Role",
                "slug" => "delete-role",
                "description" => "Delete Role",
            ],
            [
                "name" => "Create Permission",
                "slug" => "create-permission",
                "description" => "Create Permission",
            ],
            [
                "name" => "View Permission",
                "slug" => "view-permission",
                "description" => "View Permission",
            ],
            [
                "name" => "Update Permission",
                "slug" => "update-permission",
                "description" => "Update Permission",
            ],
            [
                "name" => "Delete Permission",
                "slug" => "delete-permission",
                "description" => "Delete Permission",
            ],
            // User
            [
                "name" => "Create User",
                "slug" => "create-user",
                "description" => "Create User",
            ],
            [
                "name" => "View User",
                "slug" => "view-user",
                "description" => "View User",
            ],
            [
                "name" => "Update User",
                "slug" => "update-user",
                "description" => "Update User",
            ],
            [
                "name" => "Delete User",
                "slug" => "delete-user",
                "description" => "Delete User",
            ],
            // Company
            [
                "name" => "Create Company",
                "slug" => "create-company",
                "description" => "Create Company",
            ],
            [
                "name" => "View Company",
                "slug" => "view-company",
                "description" => "View Company",
            ],
            [
                "name" => "Update Company",
                "slug" => "update-company",
                "description" => "Update Company",
            ],
            [
                "name" => "Delete Company",
                "slug" => "delete-company",
                "description" => "Delete Company",
            ],
            // Jobs
            [
                "name" => "Create Job",
                "slug" => "create-job",
                "description" => "Create Job",
            ],
            [
                "name" => "View Job",
                "slug" => "view-job",
                "description" => "View Job",
            ],
            [
                "name" => "Update Job",
                "slug" => "update-job",
                "description" => "Update Job",
            ],
            [
                "name" => "Delete Job",
                "slug" => "delete-job",
                "description" => "Delete Job",
            ],
            // Payment
            [
                "name" => "Create Payment",
                "slug" => "create-payment",
                "description" => "Create Payment",
            ],
            [
                "name" => "View Payment",
                "slug" => "view-payment",
                "description" => "View Payment",
            ],
            [
                "name" => "Update Payment",
                "slug" => "update-payment",
                "description" => "Update Payment",
            ],
            [
                "name" => "Delete Payment",
                "slug" => "delete-payment",
                "description" => "Delete Payment",
            ],
            // Subscription
            [
                "name" => "Create Subscription",
                "slug" => "create-subscription",
                "description" => "Create Subscription",
            ],
            [
                "name" => "View Subscription",
                "slug" => "view-subscription",
                "description" => "View Subscription",
            ],
            [
                "name" => "Update Subscription",
                "slug" => "update-subscription",
                "description" => "Update Subscription",
            ],
            [
                "name" => "Delete Subscription",
                "slug" => "delete-subscription",
                "description" => "Delete Subscription",
            ],
            // Tag
            [
                "name" => "Create Tag",
                "slug" => "create-tag",
                "description" => "Create Tag",
            ],
            [
                "name" => "View Tag",
                "slug" => "view-tag",
                "description" => "View Tag",
            ],
            [
                "name" => "Update Tag",
                "slug" => "update-tag",
                "description" => "Update Tag",
            ],
            [
                "name" => "Delete Tag",
                "slug" => "delete-tag",
                "description" => "Delete Tag",
            ],
            // Category
            [
                "name" => "Create Category",
                "slug" => "create-category",
                "description" => "Create Category",
            ],
            [
                "name" => "View Category",
                "slug" => "view-category",
                "description" => "View Category",
            ],
            [
                "name" => "Update Category",
                "slug" => "update-category",
                "description" => "Update Category",
            ],
            [
                "name" => "Delete Category",
                "slug" => "delete-category",
                "description" => "Delete Category",
            ],
            [
                "name" => 'Access The Admin Panel',
                "slug" => 'access-admin-panel',
                "description" => 'Access The Admin Panel',
            ],
            [
                "name" => 'Access The Company Panel',
                "slug" => 'access-company-panel',
                "description" => 'Access The Company Panel',
            ],
            [
                "name" => 'View Widgets',
                "slug" => 'view-widgets',
                "description" => 'View Widgets',
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
