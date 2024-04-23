<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['title' => 'home']);
        Page::create(['title' => 'project']);
        Page::create(['title' => 'immersive']);
        Page::create(['title' => 'contact']);
        Page::create(['title' => 'about_cammbridge']);
        Page::create(['title' => 'teacher_cammbridge']);
        Page::create(['title' => 'student']);
        Page::create(['title' => 'activity']);
        Page::create(['title' => 'course']);
    }
}
