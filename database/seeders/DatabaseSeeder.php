<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;//aumentamos
use Illuminate\Support\Facades\Hash;//aumentamos
use Illuminate\Support\Str;//aumentamos
use App\Models\User;//aumentamos
use App\Models\Post;//aumentamos


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Italo Morales F',
            'email' => 'i@admin.com',
            'password' => bcrypt('123456')
        ]);

        \App\Models\Post::factory(24)->create();
    }
}
