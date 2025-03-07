<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrator',
                'is_default' => false,
            ],
            [
                'name' => 'Recruiter',
                'slug' => 'recruiter',
                'description' => 'Recruiter from Company',
                'is_default' => false,
            ],
            [
                'name' => 'Candidate',
                'slug' => 'candidate',
                'description' => 'Candidate',
                'is_default' => true,
            ],
            [
                'name' => 'Custom Role',
                'slug' => 'custom-role',
                'description' => 'Custom Role',
                'is_default' => false,
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
