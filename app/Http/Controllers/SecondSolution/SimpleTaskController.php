<?php

namespace App\Http\Controllers\SecondSolution;

use App\Http\Controllers\Controller;
use App\Services\ApiProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function view;

class SimpleTaskController extends Controller
{

    public function __construct(public ApiProvider $apiProvider)
    {

    }

    public function index(Request $request)
    {
        $url = $this->apiProvider->providedUrl($request->all());
        $repositories = Http::get($url)['items'];
        return view('second-solution.task', ['repositories' => $repositories]);
    }


}