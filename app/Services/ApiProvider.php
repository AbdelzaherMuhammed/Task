<?php

namespace App\Services;

class ApiProvider
{

    protected $defaultParmeters = 'sort=stars&order=desc';

    public function providedUrl($request) :string
    {

        $url = 'https://api.github.com/search/repositories?q=' . $this->defaultParmeters;

        if ($request) {
            $dateFilter = isset($request['created']) != null ? 'created:>' . $request['created'] : '';
            $languageFilter = isset($request['language']) != null ? 'language:' . $request['language'] : '';
            $perPageFilter = isset($request['per_page']) != null ? '&per_page=' . $request['per_page'] : '';

            if (isset($request['created']) && isset($request['language'])) {
                $languageFilter = '+' . $languageFilter;
            }
            if (isset($request['created']) || isset($request['language'])) {
                $this->defaultParmeters = '&' . $this->defaultParmeters;
            }


            $url = 'https://api.github.com/search/repositories?q=' . $dateFilter . $languageFilter . $this->defaultParmeters . $perPageFilter;
        }

        return $url;
    }

}