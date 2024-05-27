<?php

use Tests\TestCase;
use App\Models\Content;

uses(TestCase::class);

it('gives back a successful response for entire cntent', function () {
    $this->get(route('content.index'))->assertOk();
});

it('gives back a successful response for a single content', function () {
    $content = Content::factory()->create();
    $this->get(route('content.show', $content))->assertOk();
});