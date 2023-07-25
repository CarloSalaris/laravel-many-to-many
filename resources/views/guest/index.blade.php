@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">

        <h1>Projects list</h1>

        <div class="row justify-content-center">
            <div class="col col-md-6 ">
                <ul class="list-unstyled">
                    @foreach ($projects as $project)
                        <li>
                            <a class="d-block text-decoration-none border rounded p-3 my-3"
                                href=" {{ route('logged.show', $project->id) }} ">
                                {{ $project->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
