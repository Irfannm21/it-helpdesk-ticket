<?php

namespace Database\Seeders;

use App\Models\Models\Organization\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $position = [
            [
                "name" => "President Director",
                "org_id" => 2,
            ],   
            // Position Dir
            [
                'name' => "Operations Director",
                'org_id' => 3,
            ],
            [
                'name' => "Operations Finance",
                'org_id' => 4,
            ],
            // Position Department  
            [
                'name' =>"Production Manager",
                "org_id" => 5,
            ],
            [
                'name' =>"Production Supervisor",
                "org_id" => 5,
            ],
            [
                'name' =>"Production Technician",
                "org_id" => 5,
            ],
            // Postion Department Engineering
            [
                "name" => "IT Enginner",
                "org_id" => 6,
            ],
            [
                "name" => "Mechanical Engineer",
                "org_id" => 6,
            ],
            [
                "name" => "Electrical Engineer",
                "org_id" => 6,
            ],
            [
                "name" => "Civil Engineer",
                "org_id" => 6,
            ],
            // Position Department of Human Capital
            [
                "name" => "Human Resources Manager",
                "org_id" => 7,
            ],
            [
                "name" => "Talent Acquisition Specialist",
                "org_id" => 7,
            ],
            [
                "name" => "Training and Development Coordinator",
                "org_id" => 7,
            ],
            // Deparment Finance
            [
                "name" => "Financial Analyst",
                "org_id" => 8,
            ],
            [
                "name" => "Finance Manager",
                "org_id" => 8,
            ],
            [
                "name" => "Chief Financial Officer",
                "org_id" => 8,
            ],

            // Department Marketing

            [
                'name' => "Marketing Coordinator",
                "org_id" => 9,
            ],
            [
                'name' => "Brand Manager",
                "org_id" => 9,
            ],
            [
                'name' => "Digital Marketing Specialist",
                "org_id" => 9,
            ],

            //  Division Production
            [
                "name" =>"Production Supervisor",
                "org_id" => 10,
            ],
            [
                "name" =>"Quality Assurance Technician",
                "org_id" => 10,
            ],
            [
                "name" =>"Manufacturing Engineer",
                "org_id" => 10,
            ],
                // Division Logistic
            [
                "name" => "Logistics Coordinator",
                "org_id" => 11,
            ],
            [
                "name" => "Warehouse Manager",
                "org_id" => 11,
            ],
            [
                "name" => "Supply Chain Analyst",
                "org_id" => 11,
            ],
            // Diviion Maintance
            [
                "name" => "Maintenance Technician",
                "org_id" => 12,
            ],
            [
                "name" => "Maintenance Manager",
                "org_id" => 12,
            ],
            [
                "name" => "Equipment Specialist",
                "org_id" => 12,
            ],
            // Division Accounting
            [ 
                "name" => "Accountant",
                "org_id" => 13,
            ],
            [ 
                "name" => "Accounts Payable Clerk",
                "org_id" => 13,
            ],
            [ 
                "name" => "Financial Controller",
                "org_id" => 13,
            ],

            // Division Tax
            [
                "name" =>"Tax Analyst",
                "org_id" => 14,
            ],
            [
                "name" =>"Tax Manager",
                "org_id" => 14,
            ],
            [
                "name" =>"Tax Consultant",
                "org_id" => 14,
            ],
            // Division Sales
            [
                "name" => "Sales Representative",
                "org_id" => 15,
            ],
            [
                "name" => "Sales Manager",
                "org_id" => 15,
            ],       
        ];

        foreach($position as $val) {
            $record = Position::firstOrNew(
                ['name' => $val['name']]
            );
            $record->org_id = $val['org_id'];
            $record->save();
        }
    }
}
