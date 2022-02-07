<?php

namespace App\Filters\RepositoryFilters;

use App\Filters\FilterContract;
use App\Filters\QueryFilter;

class Created extends QueryFilter implements FilterContract
{

    public function handle($value, $defaultParameters): string
    {
        return '?q=created:>' . $value . '&' . $defaultParameters;
    }
}