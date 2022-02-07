<?php

namespace App\Filters;

interface FilterContract
{
    public function handle($value, $defaultParameters): string;
}