@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card mt-5">
            <div class="card-header">
                <h1>Create a project</h1>
            </div>
            <div class="card-body">

                <form action=" {{ route('store') }} " method="post">

                    @csrf
                    @method('POST')

                    <label for="title">Title</label>
                    <br>
                    <input type="text" name="title" id="title">
                    <br>

                    <label for="description">Description</label>
                    <br>
                    <textarea name="description" id="description" rows="5"></textarea>
                    <br>

                    <label for="type">Type</label>
                    <br>
                    <select name="type" id="type">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach

                    </select>
                    {{-- <input type="text" name="type" id="type"> --}}
                    <br>

                    <label for="framework">Framework</label>
                    <br>
                    <input type="text" name="framework" id="framework">
                    <br>

                    <label for="user">User</label>
                    <br>
                    <select name="user" id="user">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach

                    </select>

                    <div class="buttons my-3">
                        <input type="submit" value="CREATE">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
