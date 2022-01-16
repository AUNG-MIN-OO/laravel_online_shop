<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\ProductSave;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('aungminoo'),
            'image'=>'image/user.png',
        ]);

        User::create([
            'name'=>'Aung Min Oo',
            'email'=>'aungminoo1314@gmail.com',
            'password'=>Hash::make('aungminoo'),
            'image'=>'image/user.png',
        ]);

        Category::factory(5)->create();
        Product::factory(50)->create();
        ProductCart::factory(10)->create();
        ProductOrder::factory(5)->create();
        ProductSave::factory(12)->create();
    }
}
