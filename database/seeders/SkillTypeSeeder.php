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
    public $types = [
        'Programming Language',
        'Framework',
        'Templating',
        'UI',
        'DevOps / Other'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->types as $type){
            SkillType::factory()->create(['name'=>$type]);
        }
    }
}
