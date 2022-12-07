<?php

namespace Tests\Feature\Page;

use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * @return void
     */
    public function test_can_list_pages()
    {
        $response = $this->getJson(route('pages.index'));
        $response->assertJsonFragment(['success'=>true]);
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_can_view_page()
    {
        $response = $this->getJson(route('pages.show',['id'=>1]));
        $response->assertJsonFragment(['success'=>true]);
    }
}
