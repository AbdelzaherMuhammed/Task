@extends('task.master')


@section('content')

    <div class="container">

        <div class="row my-50">

            <div class="main-content">

                <h2 class="heading mb-3">Filter Box</h2>

                <form action="{{ route('task') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="filter_type">Filter type</label>
                                <select class="form-control" id="filter_type">
                                    <option value="date">date</option>
                                    <option value="repositories">Number of repositories</option>
                                    <option value="language">Programming language</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" style="display: none" id="repository-filter">
                            <div class="form-group">
                                <label for="repositories_number">Number of repositories</label>
                                <select name="per_page" class="form-control" id="repositories_number">
                                    <option value="">Choose number of repositories</option>
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" style="display: none" id="date-filter">
                            <div class="form-group">
                                <label for="created_at">Repositories date</label>
                                <input type="date" name="created" id="created_at" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4" style="display: none" id="language-filter">
                            <div class="form-group">
                                <label for="language">Programming languages</label>
                                <select name="language" class="form-control" id="language">
                                    <option value="">Choose a programming language</option>
                                    <option value="c#">C#</option>
                                    <option value="php">PHP</option>
                                    <option value="c++">C++</option>
                                    <option value="java">Java</option>
                                    <option value="dart">Dart</option>
                                    <option value="javascript">Javascript</option>
                                    <option value="python">Python</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
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

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
            crossorigin="anonymous"></script>
    <script>
        changeFilter()
        $('#filter_type').on('change', function () {
            changeFilter();
        });

        function changeFilter() {
            if ($('#filter_type').val() === 'date') {
                $('#date-filter').css('display', 'block');
                $('#repository-filter').css('display', 'none');
                $('#language-filter').css('display', 'none');
            } else if ($('#filter_type').val() === 'language') {
                $('#language-filter').css('display', 'block');
                $('#repository-filter').css('display', 'none');
                $('#date-filter').css('display', 'none');
            } else {
                $('#repository-filter').css('display', 'block');
                $('#language-filter').css('display', 'none');
                $('#date-filter').css('display', 'none');
            }
        }
    </script>
@endpush