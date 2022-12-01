<?php

namespace Database\Seeders;

use App\Models\UserSkill;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSkillSeeder extends Seeder
{
    private $config = [
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!empty($this->config)){
            foreach ($this->config as $userSkill){
                UserSkill::factory()->create([
                    'user_id'=>$userSkill->userId,
                    'skill_id'=>$userSkill->skill_id,
                    'from'=>Carbon::createFromFormat('Y-m-d',$userSkill->from),
                    'to'=>Carbon::createFromFormat('Y-m-d',$userSkill->to)
                ]);
            }
        }
    }
}
