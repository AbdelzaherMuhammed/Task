<?php

namespace App\Filters;

use Illuminate\Support\Str;

class FilterBuilder
{
    public string $defaultParameters  = 'sort=stars&order=desc';

    public function __construct(protected $url, protected $filters, protected $namespace)
    {

    }

    public function apply()
    {

        $query = '?q=' . $this->defaultParameters;

        foreach ($this->filters as $name => $value) {

            $normalizedName = ucfirst(Str::camel($name));
            $class = $this->namespace . "\\{$normalizedName}";

            if (! class_exists($class)) {
                continue;
            }

            $query = (new $class($this->url))->handle($value, $this->defaultParameters);
        }

        return $this->url . $query;
    }
}