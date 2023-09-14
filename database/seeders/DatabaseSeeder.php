<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Message;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::factory(2)->create();
        // Blog::factory(5)->create();

        // User::create([
        //     'name' => 'Naufal Syafiq Hambali',
        //     'email' => 'naufal@gmail.com',
        //     'username' => 'naufalhambali',
        //     'authenticate' => 2,
        //     'password' => bcrypt('password')
        // ]);

        // Teacher::create([
        //     'name' => 'Moch Zukhruf',
        //     'mapel' => 'Guru Agama'
        // ]);
        // Teacher::create([
        //     'name' => 'Rafi',
        //     'mapel' => 'Guru Komputer'
        // ]);
        // Teacher::create([
        //     'name' => 'Fajrin',
        //     'mapel' => 'Guru Olahraga'
        // ]);

        Message::create([
            'user_id' => 1,
            'subject' => 'asfsafd',
            'message' => 'asfsdfad'
        ]);

    }
}
