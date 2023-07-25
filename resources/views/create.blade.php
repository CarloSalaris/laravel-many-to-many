@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card">
            <div class="card-header">
                <h1>Form to create a project</h1>
            </div>
            <div class="card-body">

                <form action="" method="get">

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
                    <input type="text" name="type" id="type">
                    <br>

                    <label for="framework">Framework</label>
                    <br>
                    <input type="text" name="framework" id="framework">
                    <br>

                    <div class="buttons my-3">
                        <input type="submit" value="CREATE">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
