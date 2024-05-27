<?php

use Tests\TestCase;
uses(TestCase::class);

it('gives back a successful response for home page', function () {
    $this->get('content')->assertOk();
});
