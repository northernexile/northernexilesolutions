<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    public const Sectors = [
        ['name'=>'Travel','icon'=>'faPlane'],
        ['name'=>'Financial','icon'=>'faCoins'],
        ['name'=>'Telecoms/Broadband','icon'=>'faGlobe'],
        ['name'=>'Digital Agency','icon'=>'faPalette'],
        ['name'=>'Price Comparison','icon'=>'faCodeCompare'],
        ['name'=>'Property','icon'=>'faSignHanging'],
        ['name'=>'Campaigning','icon'=>'faCalendarWeek'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::Sectors as $sector){
            Sector::factory()->create([
                'name'  =>  $sector['name'],
                'icon'  =>  $sector['icon']
            ]);
        }
    }
}
