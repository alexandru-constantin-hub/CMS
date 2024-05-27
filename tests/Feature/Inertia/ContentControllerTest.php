<?php

use Inertia\Testing\AssertableInertia as Assert;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Content;

class ContentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_content()
    {
        $content = Content::factory()->create();

        $this->get('/content')
            ->assertInertia(fn (Assert $page) => $page
                ->component('Content')
                ->has('content')
                ->where('content.current_page', 1)
                ->where('content.data.0.id', $content->id)
                ->where('content.data.0.title', $content->title)
                ->where('content.data.0.type', $content->type)
            );
    }
}