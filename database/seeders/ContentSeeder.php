<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * @var array|\string[][]
     */
    private array $config = [
        'home'=>[
            'home.introduction' => '<p>We offer full stack web & app development services at competitive rates</p>'
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->config as $page=>$content){
            $page = Page::where('name','=',$page)->first();
            if(!is_null($page)){
                foreach ($content as $key => $value){
                    $contentItem = Content::factory()->create(['name'=>$key,'text'=>$value]);
                    PageContent::factory()->create([
                        'page_id'=>$page->id,
                        'content_id'=>$contentItem->id
                    ]);
                }
            }
        }
    }
}
