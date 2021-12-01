<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        $this->call(InstitutionSeeder::class); // The Institution model is the parent of the Student model. The institutions 
                                               // database table must be seeded before the students database table
        $this->call(StudentSeeder::class);
    }
}
