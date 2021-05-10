<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class StatusTest extends TestCase
{
    /** @test */
    public function it_returns_ok()
    {
        $this->json('GET', '/status')
            ->seeJson([
                'message' => 'Request successfully completed.',
            ]);
    }
}
