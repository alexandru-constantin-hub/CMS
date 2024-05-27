<?php

use Tests\TestCase;
use App\Models\Content;

uses(TestCase::class);

it('gives back a successful response for entire cntent', function () {
    $this->get(route('content.index'))->assertOk();
});