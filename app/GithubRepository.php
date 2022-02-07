<?php

namespace App;

use App\Filters\FilterBuilder;

class GithubRepository
{

    public function getResults($url, $filters)
    {
        $namespace = 'App\Filters\RepositoryFilters';
        $filter =  (new FilterBuilder($url, $filters, $namespace));
        return $filter->apply();
    }
}