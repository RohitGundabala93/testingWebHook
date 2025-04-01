<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StrTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/api/admin/test?filter_type=email&filter_data=developermounesh@gmail.com&perpage=123123');

        //$response->assertAccepted();
        $response->assertStatus(200)
                 ->assertSee("123123","developermounesh@gmail.com",'email');
    }
   /*  public function it_strval(){
        $response=$this->get('/s',[
            'id'=>1
        ]);
        $response->assertStatus(200)->assertSee('rohit');

    } */
}
