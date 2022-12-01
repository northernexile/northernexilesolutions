<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     *
     */
    public const SKILLS = [
        ['name'=>'Php','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language']],
        ['name'=>'Python','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language']],
        ['name'=>'ASP (Classic)','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language']],
        ['name'=>'Javascript (Native)','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language']],
        ['name'=>'SQL','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language']],
        ['name'=>'T-SQL','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language']],
        ['name'=>'PLSQL','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language']],
        ['name'=>'Laravel','skill_type_id'=>SkillTypeSeeder::IDS['Framework']],
        ['name'=>'Symfony','skill_type_id'=>SkillTypeSeeder::IDS['Framework']],
        ['name'=>'Magento','skill_type_id'=>SkillTypeSeeder::IDS['Framework']],
        ['name'=>'Magento 2','skill_type_id'=>SkillTypeSeeder::IDS['Framework']],
        ['name'=>'Codeigniter','skill_type_id'=>SkillTypeSeeder::IDS['Framework']],
        ['name'=>'VueJs','skill_type_id'=>SkillTypeSeeder::IDS['Framework']],
        ['name'=>'ReactJs','skill_type_id'=>SkillTypeSeeder::IDS['Framework']],
        ['name'=>'AngularJs','skill_type_id'=>SkillTypeSeeder::IDS['Framework']],
        ['name'=>'WordPress','skill_type_id'=>SkillTypeSeeder::IDS['Framework']],
        ['name'=>'Shopify','skill_type_id'=>SkillTypeSeeder::IDS['Framework']],
        ['name'=>'HTML','skill_type_id'=>SkillTypeSeeder::IDS['Templating']],
        ['name'=>'XHTML','skill_type_id'=>SkillTypeSeeder::IDS['Templating']],
        ['name'=>'HTML5','skill_type_id'=>SkillTypeSeeder::IDS['Templating']],
        ['name'=>'Blade','skill_type_id'=>SkillTypeSeeder::IDS['Templating']],
        ['name'=>'Semaphore','skill_type_id'=>SkillTypeSeeder::IDS['DevOps / Other']],
        ['name'=>'AWS','skill_type_id'=>SkillTypeSeeder::IDS['DevOps / Other']],
        ['name'=>'Heroku','skill_type_id'=>SkillTypeSeeder::IDS['DevOps / Other']],
        ['name'=>'CSS2','skill_type_id'=>SkillTypeSeeder::IDS['UI']],
        ['name'=>'CSS3','skill_type_id'=>SkillTypeSeeder::IDS['UI']],
        ['name'=>'SCSS / LESS','skill_type_id'=>SkillTypeSeeder::IDS['UI']],
        ['name'=>'Bootstrap','skill_type_id'=>SkillTypeSeeder::IDS['UI']],
    ];

    public function run()
    {
        foreach (self::SKILLS as $skill){
            Skill::factory()->create([
                'name'=>$skill['name'],
                'skill_type_id'=>$skill['skill_type_id']
            ]);
        }
    }
}
