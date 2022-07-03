<?php

namespace Tests\Unit;

use App\Officer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfficerTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     * @group officers
     */
    public function an_officer_can_be_created()
    {
        
        factory(Officer::class)->create();

        $this->assertCount(1, Officer::all());
    }

}
