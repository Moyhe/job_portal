<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Database\Factories\ListingFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    const JOB_POSTER = 'employer';
    const JOB_SEEKER = 'seeker';
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $adminUser = User::factory()->create([
            'email' => 'geni@gmail.com',
            'name' => 'Mohye',
            'user_type' => self::JOB_POSTER,
            'password' => Hash::make('kenkanekiTouka123')
        ]);


        $adminRole = Role::create(['name' => 'admin']);
        $adminUser->assignRole($adminRole);

        User::factory()->create([
            'email' => 'keth@gmail.com',
            'name' => 'Mohye',
            'user_type' => self::JOB_SEEKER,
            'password' => Hash::make('kenkanekiTouka123')
        ]);


        ListingFactory::new()->count(10)->create([
            'user_id' => $adminUser->id
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
