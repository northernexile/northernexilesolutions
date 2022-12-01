<?php

namespace Database\Seeders;

use App\Models\SkillType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillTypeSeeder extends Seeder
{
    /**
     * @var string[]
     */
    public const TYPES = [
        1=>'Programming Language',
        2=>'Framework',
        3=>'Templating',
        4=>'UI',
        5=>'DevOps / Other',
        6=> 'APIS JSON/XML/REST etc.'
    ];

    /**
     *
     */
    public const IDS = [
        'Programming Language'=>1,
        'Framework'=>2,
        'Templating'=>3,
        'UI'=>4,
        'DevOps / Other'=>5,
        'APIS JSON/XML/REST etc'=>6
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::TYPES as $type){
            SkillType::factory()->create(['name'=>$type]);
        }
    }
}
