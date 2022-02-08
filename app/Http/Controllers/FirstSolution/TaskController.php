<?php

namespace App\Http\Controllers\FirstSolution;

use App\GithubRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use function view;


class TaskController extends Controller
{

    public function index()
    {
        $githubRepository = (new GithubRepository())->getResults('https://api.github.com/search/repositories', array_filter(request()->all()));

        $repositories = Http::get($githubRepository)['items'];
        return view('frst-solution.task', ['repositories' => $repositories]);
    }
}