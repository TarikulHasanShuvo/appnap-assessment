<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::factory(10)->create();
        $this->call(UserSeeder::class);
        Category::factory(10)->create();
        Product::factory(10)->create();

        Artisan::call('passport:install');
        Artisan::call('storage:link');
    }
}
