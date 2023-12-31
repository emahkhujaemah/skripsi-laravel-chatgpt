<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            // 'level' => true
            // 'role' => 'admin'
        ]);

        Category::create([
            'name_category' => 'Negatif',
        ]);
        
        Category::create([
            'name_category' => 'Netral',
        ]);

        Category::create([
            'name_category' => 'Positif',
        ]);

    }
}
