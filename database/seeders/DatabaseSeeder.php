<?php

namespace Database\Seeders;

use App\Models\Models\Organization\StrukturOrganization;
use App\Models\Ticket;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super',
            'username' => 'Administrator',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        Ticket::create([
            'code' => "001/TV/24",
            'client_id' => 1,
            'datetime' => "2024-05-21 13:45:41",
            'description' => 'bluescreen',
            "status"    => 'Waiting'
        ]);
        $this->call(OrganizationSeeder::class); 
        $this->call(PositionSeeder::class);        
        $this->call(ProductSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
