<?php

namespace App\Filters\RepositoryFilters;

use App\Filters\FilterContract;
use App\Filters\QueryFilter;

class Language extends QueryFilter implements FilterContract
{

    public function handle($value, $defaultParameters): string
    {
        return '?q=language:' . $value . '&' . $defaultParameters;
    }
}