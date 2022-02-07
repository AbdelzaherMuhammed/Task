<?php

namespace App\Http\Controllers;

use App\GithubRepository;
use Illuminate\Support\Facades\Http;


class TaskController extends Controller
{

    public function index()
    {
        $githubRepository = (new GithubRepository())->getResults('https://api.github.com/search/repositories', array_filter(request()->all()));
        $repositories = Http::get($githubRepository)['items'];
        return view('task', ['repositories' => $repositories]);
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