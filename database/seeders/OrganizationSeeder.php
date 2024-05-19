<?php

namespace Database\Seeders;

use App\Models\Models\Organization\StrukturOrganization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $so = [
            [
                "code" => "BASE",
                "name"  => "PT.Jabar Code Camp",
                "type"  => "perusahaan",
                "address" => "Jl. Cisitu Indah VI No.6, Dago, Kecamatan Coblong, Kota Bandung, Jawa Barat 40135",
                "phone" => "0222504168",
                "email" => "hello@alkademi",
            ],
            // Director
            [
                "code" => "DIR01",
                "name"  => "Direktur Utama",
                "type"  => "director",
                "parent_id" => 1,
            ],
            [
                "code" => "DIR02",
                "name"  => "Direktur Operasional",
                "type"  => "director",
                "parent_id" => 2,
            ],
            [
                "code" => "DIR03",
                "name"  => "Direktur Finance",
                "type"  => "director",
                "parent_id" => 2,
            ],

            // Department
            [
                "code" => "DO01",
                "name"  => "Departmen Production",
                "type"  => "department",
                "parent_id" => 3,
            ],
            [
                "code" => "DO02",
                "name"  => "Departmen Engineering",
                "type"  => "department",
                "parent_id" => 3,
            ],
            [
                "code" => "DO03",
                "name"  => "Departmen Human Capital",
                "type"  => "department",
                "parent_id" => 3,
            ],
            [
                "code" => "DF04",
                "name"  => "Departmen Finance",
                "type"  => "department",
                "parent_id" => 4,
            ],
            [
                "code" => "DF05",
                "name"  => "Departmen Marketing",
                "type"  => "department",
                "parent_id" => 4,
            ],

            // Division
            [
                "code" => "DPO01",
                "name"  => "Division Production",
                "type"  => "division",
                "parent_id" => 5,
            ],
            [
                "code" => "DPO02",
                "name"  => "Division Logistic",
                "type"  => "division",
                "parent_id" => 5,
            ],
            [
                "code" => "DPE03",
                "name"  => "Division Maintance",
                "type"  => "division",
                "parent_id" => 6,
            ],
            [
                "code" => "DPE04",
                "name"  => "Division Support",
                "type"  => "division",
                "parent_id" => 6,
            ],
            [
                "code" => "DPF05",
                "name"  => "Division Accounting",
                "type"  => "division",
                "parent_id" => 7,
            ],
            [
                "code" => "DPF06",
                "name"  => "Division Tax",
                "type"  => "division",
                "parent_id" => 7,
            ],
            [
                "code" => "DPF07",
                "name"  => "Division Sales",
                "type"  => "division",
                "parent_id" => 8,
            ],
            [
                "code" => "DPF08",
                "name"  => "Division Collection",
                "type"  => "division",
                "parent_id" => 8,
            ],
        ];

        foreach($so as $val) {
            $record = StrukturOrganization::firstOrNew(
                [
                    "code" => $val["code"]
                ]
                );
            $record->name = $val['name'];
            $record->type = $val['type'];
            $record->address = $val['address'] ?? NULL;
            $record->phone = $val['phone'] ?? NULL;
            $record->email = $val['email'] ?? NULL;
            $record->parent_id = $val['parent_id'] ?? NULL;
            $record->save();
        }
    }
}
