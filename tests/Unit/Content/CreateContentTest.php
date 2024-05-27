<?php

use Tests\TestCase;
use App\Models\Content;

uses(TestCase::class);

it('can create a content', function () {
    $this->get(route('content.store'))->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('Content/Create')
        );
});