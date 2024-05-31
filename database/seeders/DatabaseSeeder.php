<?php

namespace Database\Seeders;

use App\Models\Models\Organization\StrukturOrganization;
use App\Models\Ticket;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(OrganizationSeeder::class); 
        $this->call(PositionSeeder::class);        
        $this->call(ProductSeeder::class);
        $this->call(UsersSeeder::class);


        
    }
}
