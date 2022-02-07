<?php

namespace App\Services;

class ApiProvider
{

    public function providedUrl($request)
    {
        $url = 'https://api.github.com/search/repositories?q=sort=stars&order=desc';

        if ($request) {
            $dateFilter = $request['created'] != null ? 'created:>' . $request['created'] : '';
            $languageFilter = $request['language'] != null ? 'language:' . $request['language'] : '';
            $perPageFilter = $request['per_page'] != null ? '&per_page=' . $request['per_page'] : '';

            if ($request['created'] != null && $request['language'] != null) {
                $languageFilter = '+' . $languageFilter;
            }

            return 'https://api.github.com/search/repositories?q=' . $dateFilter . $languageFilter . '&sort=stars&order=desc' . $perPageFilter;
        }
        return $url;
    }

}