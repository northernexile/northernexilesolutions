<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public const CONFIG = [
        ['name'=>'Software & App Development','icon'=>null],
        ['name'=>'Website builds','icon'=>null],
        ['name'=>'Coaching','icon'=>null],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       foreach (self::CONFIG as $config){
           Service::factory()->create($config);
       }
    }
}
