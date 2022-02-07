<?php

namespace App\Filters;

abstract class QueryFilter
{

    public function __construct(protected $url)
    {

    }
}