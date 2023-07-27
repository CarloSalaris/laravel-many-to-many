@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">

        <div class="card mt-5">
            <div class="card-header">
                <h1> {{ $project->title }} </h1>
            </div>

            <div class="card-body">

                <img class="mb-3" style="max-width: 100%"
                    src="
                {{ asset('storage/' . $project->main_picture) }}" alt="">

                <h4><b>Description:</b></h4>
                <p>{{ $project->description }}</p>
                <h5>
                    <b>Type: </b> {{ $project->type->name }}
                </h5>
                <h5>
                    <b>Technologies: </b>
                    @if (count($project->technologies) > 0)
                        @foreach ($project->technologies as $technology)
                            @if ($loop->last)
                                {{ $technology->name }}
                            @else
                                {{ $technology->name }},
                            @endif
                        @endforeach
                    @else
                        NO TECHNOLOGY
                    @endif

                </h5>
            </div>

            <div class="card-footer ">
                <div class="row">
                    <div class="col">
                        <b>Framework: </b>
                        {{ $project->framework }}
                    </div>
                    <div class="col">
                        <b>Created on: </b>
                        {{ date('d-m-Y', strtotime($project->created_at)) }}
                    </div>
                </div>
            </div>

        </div>

        <a role="button" class="btn btn-primary my-3 px-5" href="{{ route('edit', $project->id) }}">
            Edit
        </a>

    </div>
@endsection
