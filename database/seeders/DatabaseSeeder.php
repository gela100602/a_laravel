<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Gender::factory()->create(['gender' => 'Male']);
        // \App\Models\Gender::factory()->create(['gender' => 'Female']);
        // \App\Models\Gender::factory()->create(['gender' => 'Others']);

        // \App\Models\User::factory(100)->create();
        \App\Models\User::factory()->create([
            'first_name' => 'Angela',
            'middle_name'=> 'Bartolo',
            'last_name' => 'Arguelles',
            'suffix_name' => '',
            'birth_date' => fake()->date(),
            'gender_id'=> fake()->numberBetween(1,2),
            'address' => fake()->streetAddress(),
            'contact_number' => fake()->phoneNumber(),
            'email' => 'angelaarguelles04@gmail.com',
            'username' => 'admin',  
            'password' => bcrypt('123')
        ]);
    }
}
