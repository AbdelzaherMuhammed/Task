<?php

namespace Tests\Feature;

use Tests\TestCase;

class SecondSolutionTest extends TestCase
{

    public function testHomePageIsWorking()
    {

        $response = $this->get('/simple-task');

        $response->assertStatus(200);

    }

    public function testDateFilter()
    {
        $response = $this->get('/simple-task?created:2019-01-01');

        $response->assertStatus(200);

    }

    public function testLanguageFilter()
    {
        $response = $this->get('/simple-task?language:PHP');

        $response->assertStatus(200);
    }

    public function testPerPageFilter()
    {
        $response = $this->get('/simple-task?per_page=100');

        $response->assertStatus(200);
    }

    public function testMultipleFilters()
    {
        $response = $this->get('/simple-task?created:2020-01-01&language:javascript&per_page=100');

        $response->assertStatus(200);
    }

}