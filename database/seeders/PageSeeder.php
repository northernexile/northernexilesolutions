<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    public const PAGES = [
        'home',
        'resume',
        'contact',
        'login'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::PAGES as $page){
            Page::factory()->create([
                'name'=>$page,
                'slug'=>Str::slug($page)
            ]);
        }
    }
}
