<?php

namespace App\Http\Controllers;

use App\Services\ApiProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SimpleTaskController extends Controller
{

    public function __construct(public ApiProvider $apiProvider)
    {

    }

    public function index(Request $request)
    {
        $url = $this->apiProvider->providedUrl($request->all());
        $repositories = Http::get($url)['items'];
        return view('task-simple', ['repositories' => $repositories]);
    }


    //    private function getUrl($date, $language, $pageNumber): string
//    {
//        $dateFilter = $date != null ? 'created:>' . $date : '';
//        $languageFilter = $language != null ? 'language:' . $language : '';
//        $perPageFilter = $pageNumber != null ? '&per_page=' . $pageNumber : '';
//        if ($date != null && $language != null) {
//            $languageFilter = '+' . $languageFilter;
//        }
//        return 'https://api.github.com/search/repositories?q=' . $dateFilter . $languageFilter . '&sort=stars&order=desc' . $perPageFilter;
//    }

}