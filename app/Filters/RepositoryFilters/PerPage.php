<?php

namespace App\Filters\RepositoryFilters;

use App\Filters\FilterContract;
use App\Filters\QueryFilter;

class PerPage extends QueryFilter implements FilterContract
{

    public function handle($value, $defaultParameters) :string
    {
         return '?q=' . $defaultParameters .  'per_page=' . $value;
    }
}