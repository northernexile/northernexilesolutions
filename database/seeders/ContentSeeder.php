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
            'home.introduction' => 'We are Software Developers based in The Forest of Dean & provide web development solutions primarily on a contract basis.'
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
