<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * Test add route.
     *
     * @group routes
     * @return void
     */
    public function testAddRoute()
    {
        $response = $this->get('/add/5/6');
        $response->assertStatus(200);
        $response->assertJson(['result' => 11]);
    }

    /**
      * Test subtract route.
      * 
      * @group routes
      * @return void
      */ 
    public function testSubtractRoute()
    {
        $response = $this->get('/subtract/5/6');
        $response->assertStatus(200);
        $response->assertJson(['result' => -1]);
    }

    /**
      * Test multiply route.
      *
      * @group routes
      * @return void
      */
    public function testMultiplyRoute()
    {
        $response = $this->get('/multiply/5/6');
        $response->assertStatus(200);
        $response->assertJson(['result' => 30]);
    }

    /**
      * Test divide route.
      *
      * @group routes
      * @return void
      */
    public function testDivideRoute()
    {
        $response = $this->get('/divide/5/6');
        $response->assertStatus(200);
        $response->assertJson(['result' => 0.8333333333333334]);
    }

    /**
      * Test power route.
      *
      * @group routes
      * @return void
      */
    public function testPowerRoute()
    {
        $response = $this->get('/power/5/6');
        $response->assertStatus(200);
        $response->assertJson(['result' => 15625]);
    }

    /**
      * Test percentage route.
      *
      * @group routes
      * @return void
      */
    public function testPercentageRoute()
    {
        $response = $this->get('/percentage/20/100');
        $response->assertStatus(200);
        $response->assertJson(['result' => 20]);
    }

    /**
      * Test average route.
      *
      * @group routes
      * @return void
      */
    public function testAverageRoute()
    {
        $response = $this->get('/average/5/6');
        $response->assertStatus(200);
        $response->assertJson(['result' => 5.5]);
    }

    
}
