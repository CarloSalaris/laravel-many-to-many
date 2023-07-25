@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">

        <div class="card my-5">
            <div class="card-header">
                <h1> {{ $project->title }} </h1>
            </div>

            <div class="card-body">
                <h4>Description:</h4>
                <p>{{ $project->description }}</p>
                <h5>
                    <b>Type: </b> {{ $project->type->name }}
                </h5>
            </div>

            <div class="card-footer ">
                <div class="row">
                    <div class="col">
                        <b>Framework: </b>
                        {{ $project->framework }}
                    </div>
                    <div class="col">
                        <b>Created: </b>
                        {{ $project->created_at }}
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
