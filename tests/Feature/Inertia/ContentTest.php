<?php

use Inertia\Testing\AssertableInertia as Assert;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Content;

class ContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_all_content()
    {
        $content = Content::factory()->create();

        $this->get('/content')
            ->assertInertia(fn (Assert $page) => $page
                ->component('Content/Show')
                ->has('content')
                ->where('content.current_page', 1)
                ->where('content.data.0.id', $content->id)
                ->where('content.data.0.title', $content->title)
                ->where('content.data.0.type', $content->type)
            );
    }

    public function test_can_view_one_content()
    {
        $content = Content::factory()->create();
        
        $this->get(route('content.show', $content))
            ->assertInertia(fn (Assert $page) => $page
                ->component('Content/Show')
                ->has('content')
                ->where('content.id', $content->id)
                ->where('content.title', $content->title)
                ->where('content.type', $content->type)
            );
    }
}