<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                "code" => "001/PC/I/24",
                "name" => "PC Intel i5 Gennerasi 4",
                "date" => "2024-01-10",
                "types" => "PC",
                "price" => 4300000,
                "description" => "Include Windows 10"
            ],
            [
                "code" => "002/PC/II/24",
                "name" => "PC Intel i5 Gennerasi 10",
                "date" => "2024-02-13",
                "types" => "PC",
                "price" => 4300000,
                "description" => NULL
            ],
            [
                "code" => "003/PC/III/24",
                "name" => "PC Intel i5 Gennerasi 10",
                "date" => "2024-03-09",
                "types" => "PC",
                "price" => 4300000,
                "description" => NULL
            ],
            [
                "code" => "004/PC/IV/24",
                "name" => "PC Intel i7 Gennerasi 10",
                "date" => "2024-04-06",
                "types" => "PC",
                "price" => 4300000,
                "description" => "Include Windows 10"
            ],
            [
                "code" => "005/PC/V/24",
                "name" => "PC Intel i3 Gennerasi 10",
                "date" => "2024-05-22",
                "types" => "PC",
                "price" => 4300000,
                "description" => "Include Windows 10"
            ],
            [
                "code" => "006/PC/VI/24",
                "name" => "PC AMD Ryzen 5 5500",
                "date" => "2024-06-10",
                "types" => "PC",
                "price" => 5300000,
                "description" => "Include Windows 10"
            ],
            [
                "code" => "007/PC/VII/24",
                "name" => "PC AMD Ryzen 5 5500",
                "date" => "2024-07-07",
                "types" => "PC",
                "price" => 5300000,
                "description" => "Include Windows 10"
            ],
            [
                "code" => "008/PC/VIII/24",
                "name" => "PC Intel i7 Gennerasi 10",
                "date" => "2024-08-10",
                "types" => "PC",
                "price" => 6300000,
                "description" => "Include Windows 11"
            ],
            [
                "code" => "009/PC/IX/24",
                "name" => "PC AMD Ryzen 5 5500",
                "date" => "2024-09-03",
                "types" => "PC",
                "price" => 5300000,
                "description" => "Include Windows 10"
            ],
            [
                "code" => "010/PC/X/24",
                "name" => "PC Intel i3 Gennerasi 10",
                "date" => "2024-10-04",
                "types" => "PC",
                "price" => 4300000,
                "description" => "Include Windows 10"
            ],

            // Printer

            [
                "code" => "001/PTR/I/24",
                "name" => "Epson Printer L1110",
                "date" => "2024-01-10",
                "types" => "Printer",
                "price" => 2200000,
                "description" => NULL
            ],
            [
                "code" => "002/PTR/II/24",
                "name" => "PC Intel i5 Gennerasi 5",
                "date" => "2024-02-10",
                "types" => "Printer",
                "price" => 1300000,
                "description" => NULL
            ],
            [
                "code" => "003/PTR/III/24",
                "name" => "Epson Printer L1110",
                "date" => "2024-03-18",
                "types" => "Printer",
                "price" => 2200000,
                "description" => NULL
            ],
            [
                "code" => "004/PTR/IV/24",
                "name" => "Epson Printer L3110",
                "date" => "2024-04-18",
                "types" => "Printer",
                "price" => 1300000,
                "description" => NULL
            ],
            [
                "code" => "005/PTR/V/24",
                "name" => "Canon Fax Printer & Scanner",
                "date" => "2024-01-10",
                "types" => "Printer",
                "price" => 4300000,
                "description" => NULL
            ],
            [
                "code" => "006/PTR/VI/24",
                "name" => "Canon Fax Printer & Scanner",
                "date" => "2024-03-10",
                "types" => "Printer",
                "price" => 4300000,
                "description" => NULL
            ],

            // Network Tools

            [
                "code" => "001/NWK/I/24",
                "name" => "Huawei Router",
                "date" => "2024-01-10",
                "types" => "Network",
                "price" => 500000,
                "description" => NULL
            ],
            [
                "code" => "002/NWK/II/24",
                "name" => "Huawei Router",
                "date" => "2024-02-10",
                "types" => "Network",
                "price" => 500000,
                "description" => NULL
            ],
            [
                "code" => "003/NWK/III/24",
                "name" => "Switch 12 Hub",
                "date" => "2024-03-18",
                "types" => "Network",
                "price" => 500000,
                "description" => NULL
            ],
            [
                "code" => "004/NWK/IV/24",
                "name" => "Switch 4 Hub",
                "date" => "2024-04-18",
                "types" => "Network",
                "price" => 500000,
                "description" => NULL
            ],
            [
                "code" => "005/NWK/V/24",
                "name" => "Switch 4 Hub",
                "date" => "2024-01-10",
                "types" => "Network",
                "price" => 500000,
                "description" => Null
            ],
        ];

        foreach ($arr as $value) {
            $result = Product::firstOrNew(
                ['code' => $value['code']]
            );
            $result->name = $value['name'];
            $result->date = $value['date'];
            $result->types = $value['types'];
            $result->price = $value['price'];
            $result->description = $value['description'];
            $result->save();
        }
        
        
    }
}
