<?php

namespace Tests\Feature;

use Tests\TestCase;

class FirstSolutionTest extends TestCase
{
    /**
     * @throws \Throwable
     */


    public function testHomePageIsWorking()
    {

        $response = $this->get('/');

        $response->assertStatus(200);

    }

    public function testDateFilter()
    {
        $response = $this->get('/?created=2019-01-01');

        $response->assertStatus(200);

    }

    public function testLanguageFilter()
    {
        $response = $this->get('/?language=PHP');

        $response->assertStatus(200);
    }

    public function testPerPageFilter()
    {
        $response = $this->get('/?per_page=100');

        $response->assertStatus(200);
    }

}