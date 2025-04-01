<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MathControllerTest extends TestCase
{
    /** @test */
   
    
    public function it_adds_two_numbers_correctly()
    {
        $response = $this->withoutMiddleware()->get('/add?val1=5&val2=10');

        $response->assertSuccessful()
                ->assertSee(15);
    }
  
}
