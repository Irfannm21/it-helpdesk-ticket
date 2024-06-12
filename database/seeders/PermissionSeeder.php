<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $role = [
        [
           "name" => "Administrator"
        ],
        [
           "name" => "Client"
        ],
        [
           "name" => "Technician"
        ],
    ];

    foreach ($role as $value) {
        $record = Role::firstOrNew([
            "name" => $value['name'],
        ]);
        $record->save();
    }


        $arr = [
            [
                "name" => "Show Ticket",
            ],
            [
                "name" => "Create Ticket",
            ],
            [
                "name" => "Edit Ticket",
            ],
            [
                "name" => "Delete Ticket",
            ],
            [
                "name" => "Show Review",
            ],
            [
                "name" => "Create Review",
            ],
            [
                "name" => "Edit Review",
            ],
        ];

        foreach($arr as $val) {
            $record = Permission::firstOrNew([
                'name' => $val['name']
            ]);
            $record->save();
            $role = Role::where('name','Client')->first();
            $record->givePermissionTo($role);
        }

        $arr = [
            [
                "name" => "Show Workplan",
            ],
            [
                "name" => "Create Workplan",
            ],
            [
                "name" => "Edit Workplan",
            ],
            [
                "name" => "Show Realization",
            ],
            [
                "name" => "Create Realization",
            ],
            [
                "name" => "Edit Realization",
            ],
        ];

        foreach($arr as $val) {
            $record = Permission::firstOrNew([
                'name' => $val['name']
            ]);
            $record->save();
            $role = Role::where('name','Technician')->first();
            $record->givePermissionTo($role);
        }
    }
}
