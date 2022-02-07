@extends('task.master')


@section('content')

    <div class="container">

        <div class="row my-50">

            <div class="main-content">

                <h2 class="heading mb-3">Filter Box</h2>

                <form action="{{ route('task-simple') }}" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repositories_number">Number of repositories</label>
                                <select name="per_page" class="form-control" id="repositories_number">
                                    <option value="">Choose number of repositories</option>
                                    <option value="10" {{ request()->query('per_page') == 10  ? 'selected' : ''}}>10</option>
                                    <option value="50" {{ request()->query('per_page') == 50  ? 'selected' : ''}}>50</option>
                                    <option value="100" {{ request()->query('per_page') == 100  ? 'selected' : ''}}>100</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="created_at">Repositories date</label>
                                <input type="date" name="created" id="created_at" value="{{ \Carbon\Carbon::parse(request()->query('created'))->format('Y-m-d') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="language">Programming languages</label>
                                <select name="language" class="form-control" id="language">
                                    <option value="">Choose a programming language</option>
                                    <option value="c#" {{ request()->query('language') == 'c#'  ? 'selected' : ''}}>C#</option>
                                    <option value="php" {{ request()->query('language') == 'php'  ? 'selected' : ''}}>PHP</option>
                                    <option value="c++" {{ request()->query('language') == 'c++'  ? 'selected' : ''}}>C++</option>
                                    <option value="java" {{ request()->query('language') == 'java'  ? 'selected' : ''}}>Java</option>
                                    <option value="dart" {{ request()->query('language') == 'dart'  ? 'selected' : ''}}>Dart</option>
                                    <option value="javascript" {{ request()->query('language') == 'javascript'  ? 'selected' : ''}}>Javascript</option>
                                    <option value="python" {{ request()->query('language') == 'python'  ? 'selected' : ''}}>Python</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block mt-4">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>


        </div>


        <div class="row">
            @forelse($repositories as $repository)
                <div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $repository['owner']['avatar_url'] }}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $repository['full_name'] }}</h5>
                            <p class="card-text">{!! \Illuminate\Support\Str::limit($repository['description'], 100)  !!}</p>
                            <p class="card-text"><b>{{ $repository['stargazers_count'] }} Stars</b></p>
                            <p class="card-text"><b>Language: {{ $repository['language'] }}</b></p>
                            <p class="card-text">Created at: {{ \Carbon\Carbon::parse($repository['created_at'])->format('Y-m-d') }} </p>
                        </div>
                        <div class="card-body">
                            <a href="{{ $repository['html_url'] }}" target="_blank" class="card-link btn btn-primary">View repository</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row my-50">

                    <div class="main-content">
                        <div class="text-center">
                            No items found
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

@endsection