<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Seeder;
use App\Models\AdditionalBookinfo;
use App\Models\BookCategory;
use Database\Seeders\CategorySeeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            CategorySeeder::class,
        ]);

        Publisher::factory()->count(100)->create();
        Book::factory()->has(AdditionalBookinfo::factory()->count(1))->count(100)->create();
        BookCategory::factory()->count(100)->create();
    }
}
