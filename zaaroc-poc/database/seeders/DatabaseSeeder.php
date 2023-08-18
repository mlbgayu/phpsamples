<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database
     */
    public function run(): void
    {
        //User::factory(1000)->create();

         User::factory()->create([
             'name' => 'Gayathri Vengadavarathan',
             'email' => 'mlbgayu@gmail.com',
            //   'age' =>28,
            //  'title'=>'mrs',
              'password'=>'password123',
            //  'salary'=>20000,
              'phone'=>'+91 9789780997'

         ]);
    }
}
