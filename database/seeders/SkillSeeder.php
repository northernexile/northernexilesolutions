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
        ['name'=>'Php','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language'],'icon'=>'faPhp'],
        ['name'=>'Python','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language'],'icon'=>'faPython'],
        ['name'=>'ASP (Classic)','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language'],'icon'=>null],
        ['name'=>'Javascript (Native)','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language'],'icon'=>null],
        ['name'=>'SQL','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language'],'icon'=>null],
        ['name'=>'T-SQL','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language'],'icon'=>null],
        ['name'=>'PLSQL','skill_type_id'=>SkillTypeSeeder::IDS['Programming Language'],'icon'=>null],
        ['name'=>'Laravel','skill_type_id'=>SkillTypeSeeder::IDS['Framework'],'icon'=>'faLaravel'],
        ['name'=>'Symfony','skill_type_id'=>SkillTypeSeeder::IDS['Framework'],'icon'=>'faSymfony'],
        ['name'=>'Magento','skill_type_id'=>SkillTypeSeeder::IDS['Framework'],'icon'=>'faMagento'],
        ['name'=>'Magento 2','skill_type_id'=>SkillTypeSeeder::IDS['Framework'],'icon'=>'faMagento'],
        ['name'=>'Codeigniter','skill_type_id'=>SkillTypeSeeder::IDS['Framework'],'icon'=>null],
        ['name'=>'VueJs','skill_type_id'=>SkillTypeSeeder::IDS['Framework'],'icon'=>'faVuejs'],
        ['name'=>'ReactJs','skill_type_id'=>SkillTypeSeeder::IDS['Framework'],'icon'=>'faReact'],
        ['name'=>'AngularJs','skill_type_id'=>SkillTypeSeeder::IDS['Framework'],'icon'=>'faReact'],
        ['name'=>'Wordpress','skill_type_id'=>SkillTypeSeeder::IDS['Framework'],'icon'=>'faWordpress'],
        ['name'=>'Shopify','skill_type_id'=>SkillTypeSeeder::IDS['Framework'],'icon'=>'faShopify'],
        ['name'=>'HTML','skill_type_id'=>SkillTypeSeeder::IDS['Templating'],'icon'=>null],
        ['name'=>'XHTML','skill_type_id'=>SkillTypeSeeder::IDS['Templating'],'icon'=>null],
        ['name'=>'HTML5','skill_type_id'=>SkillTypeSeeder::IDS['Templating'],'icon'=>'faHtml5'],
        ['name'=>'Blade','skill_type_id'=>SkillTypeSeeder::IDS['Templating'],'icon'=>null],
        ['name'=>'Semaphore','skill_type_id'=>SkillTypeSeeder::IDS['DevOps / Other'],'icon'=>null],
        ['name'=>'AWS','skill_type_id'=>SkillTypeSeeder::IDS['DevOps / Other'],'icon'=>'faAws'],
        ['name'=>'Heroku','skill_type_id'=>SkillTypeSeeder::IDS['DevOps / Other'],'icon'=>null],
        ['name'=>'CSS2','skill_type_id'=>SkillTypeSeeder::IDS['UI'],'icon'=>null],
        ['name'=>'CSS3','skill_type_id'=>SkillTypeSeeder::IDS['UI'],'icon'=>null],
        ['name'=>'SCSS / LESS','skill_type_id'=>SkillTypeSeeder::IDS['UI'],'icon'=>'faLess'],
        ['name'=>'Bootstrap','skill_type_id'=>SkillTypeSeeder::IDS['UI'],'icon'=>'faBootstrap'],
    ];

    public function run()
    {
        foreach (self::SKILLS as $skill){
            Skill::factory()->create([
                'name'=>$skill['name'],
                'skill_type_id'=>$skill['skill_type_id'],
                'icon'=>$skill['icon']
            ]);
        }
    }
}
